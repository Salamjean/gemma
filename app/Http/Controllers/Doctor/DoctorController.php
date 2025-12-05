<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Hospital;

use App\Models\Infirmier;
use App\Models\TypeDoctor;
use Illuminate\Http\Request;
use App\Models\ServiceHospital;
use App\Models\PrestationService;
use App\Models\PrestationHospital;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateDoctorRequest;
use App\Repositories\Hospital\AgentRepository;
use Illuminate\Contracts\Database\Eloquent\Builder;

class DoctorController extends Controller
{

    public function Profile()
    {
        $title = 'Détails sur le Medecin';
        $doctors = Doctor::findOrFail(Auth::user()->doctor->id);

        return view('users.doctor.profil', compact('title', 'doctors'));
    }

    public function update(UpdateDoctorRequest $request)
    {

        $user = User::findOrFail(auth()->user()->id);

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $doctor = Doctor::find(auth()->user()->doctor->id);

        //update doctor
        $doctor->contact = $request->contact;
        $doctor->address = $request->address;

        if ($request->hasFile('image'))
            $doctor->img_url = uploadImage($request->image, 'doctor');
        $doctor->save();

        //return ['status' => 'success', 'message' => 'Données modifiées avec succès.'];
        return redirect()->route('dashboard')->with('success', "Informations modifié avec succès.");
    }

        //services, prestations ...

    public function getPrestations($service)
    {
        $hospital = Hospital::find(Auth::user()->doctor->hospital_id);

        $prestations = PrestationHospital::where('status', 0)->with('prestationService')->whereHas('serviceHospital', function (Builder $query) use ($hospital, $service) {
            $query->where('hospital_id', $hospital->id)->whereHas('service', function (Builder $query) use ($service) {
                $query->where('libelle', $service);
            });
        })->get();
        return response()->json($prestations);
    }
    public function getInfirmiers($service)
    {
        $infirmiers = Infirmier::where('hospital_id', Auth::user()->doctor->hospital->id)->whereHas('serviceHospital', function (Builder $query) use ($service) {
            $query->whereHas('service', function (Builder $query) use ($service) {
                $query->where('libelle', $service);
            });
        })->with('user')->get();

        return response()->json($infirmiers);
    }
    public function getPrestationServices()
    {
        $prestation_services = PrestationService::where('status', 0)->get();
        return  response()->json(['prestation_services' => $prestation_services]);
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
    public function getHopitalServices()
    {
        $services = ServiceHospital::where('hospital_id', Auth::user()->doctor->hospital->id)
        ->whereHas('service', function (Builder $query) {
            $query->where('libelle', 'Soins infirmier');
        })
        ->with('service')
        ->where('status', 0)
        ->get();
    
    return response()->json($services);
    }
}
