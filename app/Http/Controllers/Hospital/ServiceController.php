<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\ServiceRequest;
use App\Models\Doctor;
use App\Models\Infirmier;
use App\Models\PrestationDoctor;
use App\Models\PrestationHospital;
use App\Models\PrestationService;
use App\Models\Service;
use App\Models\ServiceDoctor;
use App\Models\ServiceHospital;
use App\Models\TypeConsultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $services = ServiceHospital::where('hospital_id', Auth::user()->hospital->id)->with('prestationHospitals')->get();
        $title = "Liste des services";
        return view('users.hospital.service.index', ["title" => $title, 'services' => $services]);
    }

    public function show($id)
    {
        $service = ServiceHospital::findOrFail($id);
        $servicei = Service::findOrFail($service->service_id);
        $title = "Détails | $service->libelle";
        return view('users.hospital.service.show', compact('service', 'servicei', 'title'));
    }

    public function add()
    {
        $title = "Ajout d'un service";

        $serviceHospital = ServiceHospital::where('hospital_id', Auth::user()->hospital->id)->get();

        $id = [];
        foreach ($serviceHospital as $key => $service) {
            $id[$key] = $service->service_id;
        }

        $filters = [];

        $services = Service::orderBy("libelle")->get();

        foreach ($services as $key => $service) {
            if (!in_array($service->id, $id))
                $filters[$key] = $service;
        }

        return view('users.hospital.service.add', ["title" => $title, "services" => $filters]);
    }

    public function store(ServiceRequest $request)
    {
        $request->validated();

        $existing = ServiceHospital::where('hospital_id', Auth::user()->hospital->id)->where('service_id', $request->department)->exists();

        if ($existing)
            return back()->with('error', 'Ce service existe déjà !');

        try {

            $service = new ServiceHospital();
            $service->hospital_id = Auth::user()->hospital->id;
            $service->service_id = $request->department;
            $service->save();

            foreach ($request->prix as $key => $prix) {
                if ($prix !== null) {
                    $pService = new PrestationHospital();
                    $pService->service_hospital_id = $service->id;
                    $pService->prix = $prix;
                    $pService->prestation_service_id = $request->service[$key];
                    $pService->description = $request->description[$key];
                    $pService->save();
                }
            }

            return redirect()->route('hospital.service.index')->with('success', 'Le Département a été enregistré.');

        } catch (\Throwable $err) {
            dd($err);
            return redirect()->back()->withErrors('Quelques s\'est mal passée.');
        }
    }

    public function update($id, Request $request)
    {
        $serviceh = ServiceHospital::findOrFail($id);

        foreach ($serviceh->prestationHospitals as $key => $item) {
            $service = PrestationHospital::findOrFail($item->id);
            $service->prix = $request->prixupdate[$key];
            $service->description = $request->descriptionupdate[$key];
            $service->save();
        }

        if ($request->prix) {
            foreach ($request->prix as $key => $prix) {
                if ($prix !== null) {
                    $pservice = new PrestationHospital();
                    $pservice->service_hospital_id = $serviceh->id;
                    $pservice->prix = $prix;
                    $pservice->prestation_service_id = $request->service[$key];
                    $pservice->description = $request->description[$key];
                    $pservice->save();
                }
            }
        }

        return redirect()->route('hospital.service.index')->with('success', 'Ce Département a été mis à jour.');
    }

    public function status($id)
    {

        $service = ServiceHospital::findOrFail($id);

        $service->status = $service->status == 0 ? 1 : 0;

        $service->save();

        return back()->with('success', "Statut modifié avec succès.");
    }

    public function delete($id)
    {

        $type = ServiceHospital::findOrFail($id);
        if (Doctor::where('service_hospital_id', $type->id)->exists() || Infirmier::where('service_hospital_id', $type->id)->exists())
            return redirect()->back()->withErrors('Impossible de supprimé un service où des agents de santé sont affectés.');
        $type->PrestationHospitals()->delete();
        $type->delete();

        return back()->with('success', "Service supprimé avec succès.");
    }

    public function searchService($service)
    {
        $services = PrestationService::where('service_id', $service)->where('status', 0)->get();
        return response()->json($services);
    }

    public function searchServiceServiceHospital($service)
    {
        $services = PrestationHospital::with('prestationService')->where('service_hospital_id', $service)->where('status', 0)->get();
        return response()->json($services);
    }

    public function deleteService($id)
    {
        $pService = PrestationHospital::findOrFail($id);

        $service = ServiceHospital::findOrFail($pService->service_hospital_id);
        if (count($service->PrestationHospitals) <= 1)
            return back()->withErrors("Impossible de supprimer tout les services du service.");

        if (PrestationDoctor::where('prestation_hospital_id', $pService->id)->exists())
            return redirect()->back()->withErrors('Impossible de supprimé un prestation de service où des agents de santé sont affectés.');

        $pService->delete();

        return back()->with('success', "Prestation de Service supprimé avec succès.");
    }
}
