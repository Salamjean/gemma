<?php

namespace App\Http\Controllers\Secretariat;


use Carbon\Carbon;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Admission;
use Illuminate\Http\Request;
use App\Models\TypeConsultation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{
    public function list()
    {
        $admissions = Admission::orderByDESC("created_at")->where('secretaire_id', Auth::user()->secretariat->id)->where('hospital_id', Auth::user()->secretariat->hospital->id)->with('patient.user', 'doctor.user', 'typeExamen')->get();
        return view('users.secretariat.admission.list', compact('admissions'));
    }
    public function today()
    {
        $today = Carbon::today();
        $admissions = Admission::orderByDESC("created_at")->where('secretaire_id', Auth::user()->secretariat->id)->where('hospital_id', Auth::user()->secretariat->hospital->id)->with('patient.user', 'doctor.user', 'cashier.user')->whereDate('created_at', $today)->get();
        return view('users.secretariat.admission.today', compact('admissions'));
    }
    public function history()
    {
        $admissions = Admission::orderByDESC("created_at")->where('secretaire_id', Auth::user()->secretariat->id)->where('hospital_id', Auth::user()->secretariat->hospital->id)->with('patient.user', 'doctor.user', 'cashier.user')->get();
        return view('users.secretariat.admission.history', compact('admissions'));
    }
    public function detail($id)
    {
        $admission = Admission::find($id);
        return view('users.secretariat.admission.detail', compact('admission'));
    }
    public function Impression($id)
    {
        $pdf =  Pdf::loadView('users.secretariat.admission.pdf.admission', ['admission' => Admission::findOrFail($id)]);
        $pdf->setPaper('A4', 'portrait')->render();

        $response = new Response();
        $response->setContent($pdf->output())->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', "inline; filename=$id-" . date('dmY') . ".pdf");

        return $response;
    }
}
