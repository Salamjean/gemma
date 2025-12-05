<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\Hospital\DoctorRequest;
use App\Http\Requests\Hospital\InfirmierRequest;
use App\Http\Requests\SageFRequest;
use App\Http\Requests\Hospital\UpdateDoctorRequest;
use App\Models\Departement;
use App\Models\DepartementHospital;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\ServiceHospital;
use App\Models\TypeAgent;
use App\Models\TypeDoctor;
use App\Models\User;
use App\Repositories\Hospital\AgentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;


class DoctorController extends Controller
{

    public function repository()
    {
        return new AgentRepository();
    }

    public function index()
    {
        $doctors = Doctor::where('type_agent_id', 1)->where('hospital_id', Auth::user()->hospital->id)->where('delete', 0)->with('user.availability')->get();

        $title = "Liste des agents de santé";
        $empty = "Liste vide...";
        return view('users.hospital.doctor.index', ["title" => $title, 'doctors' => $doctors, 'empty' => $empty, "agent" => "medecin"]);
    }

    public function indexS()
    {
        $doctors = Doctor::where('type_agent_id', 2)->where('hospital_id', Auth::user()->hospital->id)->where('delete', 0)->with('user.availability')->get();

        $title = "Liste des agents de santé";
        $empty = "Liste vide...";
        return view('users.hospital.doctor.index', ["title" => $title, 'doctors' => $doctors, 'empty' => $empty, "agent" => "sage"]);
    }

    public function show($id)
    {
        $agent = Doctor::findOrFail($id);
        $type = TypeDoctor::where('hospital_id', Auth::user()->hospital->id)->get();;
        $serviceh = ServiceHospital::where('hospital_id', Auth::user()->hospital->id)->get();;
        $title = "Edition | " .  $agent->user->name;
        return view('users.hospital.doctor.show', compact('agent', 'type', 'serviceh', 'title'));
    }

    public function add($agent)
    {
        $title = "Ajout d'agent de santé";
        $type = TypeDoctor::where('hospital_id', Auth::user()->hospital->id)->get();
        $service = ServiceHospital::where('hospital_id', Auth::user()->hospital->id)->get();
        $typeAgent = TypeAgent::all();

        return view('users.hospital.doctor.add', compact('type', 'title', 'service', 'typeAgent', 'agent'));
    }

    public function storeDoctor(DoctorRequest $request)
    {

        $request->validated();

        if (!count($request->day) && count($request->day) == 0)
            return back()->withErrors('Veuillez selectionner un jour svp .');

        $res = $this->repository()->storeDoctor($request);

        if ($res['status'] == 'success')
            return redirect()->route('hospital.doctor.index.medecin')->with('success', $res['message']);
    }

    public function storeSageF(SageFRequest $request)
    {

        $request->validated();

        if (!count($request->day) && count($request->day) == 0)
            return back()->withErrors('Veuillez selectionner un jour svp .');

        $res = $this->repository()->storeSageF($request);

        if ($res['status'] == 'success')
            return redirect()->route('hospital.doctor.index.sage')->with('success', $res['message']);
    }

    public function badge($id)
    {

        $agent = Doctor::findOrFail($id);

        if ($agent->img_url == null)
            return redirect()->back()->withErrors("Veuillez ajouter une photo de l\'agent de santé");

        if ($agent->hospital->img_url == null)
            return redirect()->back()->withErrors("Veuillez ajouter un logo de l\'Hopital");

        $pdf =  Pdf::loadView('users.hospital.doctor.badge', ['agent' => $agent]);
        $pdf->setPaper('A6', 'portrait');
        $pdf->render();

        $response = new Response();
        $response->setContent($pdf->output());
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="certificat_medical_deces.pdf"');

        return $response;
    }

    public function update($id, $type, UpdateDoctorRequest $request)
    {
        $request->validated();

        // dd($request->all());

        $res = $this->repository()->update($request, $id, $type);

        if ($res['status'] == 'success')
            return redirect()->route($res['agent'] === 1 ? 'hospital.doctor.index.medecin' : 'hospital.doctor.index.sage')->with('success', $res['message']);
    }

    public function status($id)
    {
        $doctor = Doctor::findOrFail($id);

        $doctor->status = $doctor->status == 0 ? 1 : 0;

        $doctor->save();

        return back()->with('success', "Status modifié avec succès.");
    }

    public function delete($id)
    {

        $personal = Doctor::findOrFail($id);

        $personal->delete = 1;
        $personal->save();

        return back()->with('success', "Docteur supprimé(e) avec succès.");
    }

    public function chief($id)
    {
        $doctor = Doctor::findOrFail($id);

        $doctor->chief = $doctor->chief == 0 ? 1 : 0;

        $doctor->save();

        $msg = $doctor->chief == 0 ? "Status modifié avec succès." : "Status modifié avec succès.";

        return back()->with('success', $msg);
    }
}
