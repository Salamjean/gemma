<?php

namespace App\Http\Controllers\Secretariat;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Region;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Hospital;
use App\Models\Infirmier;
use App\Models\Department;
use App\Models\TypeExamen;
use App\Models\Availability;
use Illuminate\Http\Request;
use App\Models\SubPrefecture;
use App\Models\ServiceHospital;
use App\Models\PrestationDoctor;
use App\Models\PrestationService;
use App\Models\PrestationHospital;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Eloquent\Builder;

class SecretariatController extends Controller
{
    public function getDoctors($prestations)
    {
        // dd($prestations);
        $hospital = Hospital::find(Auth::user()->secretariat->hospital_id);
        $doctors = PrestationDoctor::with('doctor.user', 'prestationHospital.prestationService')->where('prestation_hospital_id', $prestations)->get();
        return response()->json($doctors);
    }
    public function getPrestations($service)
    {
        // dd($service);
        $hospital = Hospital::find(Auth::user()->secretariat->hospital_id);

        $prestations = PrestationHospital::where('status', 0)->with('prestationService')->whereHas('serviceHospital', function (Builder $query) use ($hospital, $service) {
            $query->where('hospital_id', $hospital->id)->whereHas('service', function (Builder $query) use ($service) {
                $query->where('libelle', $service);
            });
        })->get();
        return response()->json($prestations);
    }
    public function getInfirmiers($service)
    {
        $infirmiers = Infirmier::where('hospital_id', Auth::user()->secretariat->hospital->id)->whereHas('serviceHospital', function (Builder $query) use ($service) {
            $query->whereHas('service', function (Builder $query) use ($service) {
                $query->where('libelle', $service);
            });
        })->with('user')->get();

        return response()->json($infirmiers);
    }
    public function getPrestationServices()
    {
        $prestation_services = PrestationService::where('status', 0)->get();
        return response()->json(['prestation_services' => $prestation_services]);
    }
    public function getPrixPrestation(Request $request)
    {
        $prestationServiceId = $request->input('prestationServiceId');
        $prestationService = PrestationHospital::find($prestationServiceId);

        if ($prestationService) {
            return response()->json(['prix' => $prestationService->prix]);
        } else {
            return response()->json(['prix' => 'Type de consultation introuvable.']);
        }
    }
    public function listePatients()
    {
        $patients = Patient::where('status', 1)->with('user')->get();
        return response()->json(['patients' => $patients]);
    }


    /*****Function pour examen  ********/
    public function getTypeExamens()
    {
        $type_examens = TypeExamen::where('hospital_id', Auth::user()->secretariat->hospital->id)->where('status', 0)->where('hospital_id', Auth::user()->secretariat->hospital_id)->get();
        return response()->json(['type_examens' => $type_examens]);
    }

    public function getPrixExamen(Request $request)
    {
        $typeExamenId = $request->input('typeExamenId');
        $typeExamen = TypeExamen::find($typeExamenId);

        if ($typeExamen) {
            return response()->json(['prix' => $typeExamen->prix]);
        } else {
            return response()->json(['prix' => 'Prix introuvable.']);
        }
    }

    public function searchPatient(Request $request)
    {
        $name = explode(" ", $request->search, 2);
        if ($request->ajax()) {
            $nom = $name[0];
            $pnom = $name[1];

            $data = Patient::whereHas('user', function ($query) use ($nom, $pnom) {
                $query->where('name', 'like', '%' . $nom . '%')
                    ->where('prenom', 'like', '%' . $pnom . '%');
            })->limit(5)->get();

            //return response()->json(['data' => $data]);

            $output = '<div class="box"><div class="dropdown"><ul class="dropdown-menu" style="display:block; position:relative;width:100%;cursor:pointer;">';

            if (count($data) > 0) {
                foreach ($data as $row) {

                    $patientFullName = $row->user->name . ' ' . $row->user->prenom;
                    $output .= "<li><option class='dropdown-item' value='{$row->id}'>{$patientFullName}</option></li>";
                }
            } else {
                $output .= '<li>Patients introuvable !</li>';
            }
            $output .= '</ul></div></div>';

            return $output;
        }
    }

    public function getCommunes(Request $request)
    {
        $regionId = $request->input('region_id');
        $communes = Department::where('region_id', $regionId)->get();
        return response()->json($communes);
    }
    public function getSubPrefectures(Request $request)
    {
        $servceId = $request->input('servce_id');
        $subPrefectures = SubPrefecture::where('servce_id', $servceId)->get();
        return response()->json($subPrefectures);
    }
    public function getRegions()
    {
        $regions = Region::get();
        return response()->json($regions);
    }

    // Liste des services de l'hopital
    public function getHopitalServices()
    {
        $services = ServiceHospital::where('hospital_id', Auth::user()->secretariat->hospital->id)->with('service')->where('status', 0)->get();
        return response()->json($services);
    }

    public function getLieuNaissance()
    {
        $lieu_naissance = SubPrefecture::get();
        return response()->json($lieu_naissance);
    }
    public function getResidenceActuelle()
    {
        $residence_actuelle = SubPrefecture::get();
        return response()->json($residence_actuelle);
    }
    public function getAvailabilities()
    {
        $availabilities = Availability::with('user')->get();
        $events = $availabilities->map(function ($availability) {
        $days = json_decode($availability->days);
        $start_times = json_decode($availability->hour_start);
        $end_times = json_decode($availability->hour_end);
        $events = [];
            foreach ($days as $index => $day) {
                $date = Carbon::now()->startOfWeek()->addDays($day);
                $events[] = [
                    'id'    => $availability->id,
                    'name'  => $availability->user->name . ' ' . $availability->user->prenom,
                    'description' => $availability->user->role_as,
                    'date'  => $date->format('Y-m-d'),
                    'start' => $date->format('Y-m-d') . ' ' . $start_times[$index],
                    'badge'=>  $start_times[$index],
                    'type'=> 'event', 
                    'color'=> '#f5365c' ?? '#63d867', 
                    'everyYear'=> true,
                    //'end'   => $date->format('Y-m-d') . ' ' . $end_times[$index]
                ];
            }
            return $events;
        })->collapse()->toArray();
        
        return view('users.secretariat.agenda', ['title' => 'Disponibilité du personnel', 'events' => $events]);
    }
    
    public function getPatientHospitalisation(Request $request) {
        $name = explode(" ", $request->search, 2);
        if ($request->ajax()) {
            $nom = $name[0];
            $pnom = $name[1];

            $data = Patient::whereHas('user', function ($query) use ($nom, $pnom) {
                $query->where('name', 'like', '%' . $nom . '%')
                    ->where('prenom', 'like', '%' . $pnom . '%');
            })->limit(5)->get();

            //return response()->json(['data' => $data]);

            $output = '<div class="box"><div class="dropdown"><ul class="dropdown-menu" style="display:block; position:relative;width:100%;cursor:pointer;">';

            if (count($data) > 0) {
                foreach ($data as $row) {

                    $patientFullName = $row->user->name . ' ' . $row->user->prenom;
                    $output .= "<li><option class='dropdown-item' value='{$row->id}'>{$patientFullName}</option></li>";
                }
            } else {
                $output .= '<li>Patients introuvable !</li>';
            }
            $output .= '</ul></div></div>';

            return $output;
        }
    }
    public function searchHospitalisation()
    {
        return view('users.secretariat.search_hospitalisation', ['title' => 'Vérification du status du patient']);
    }
         
}
