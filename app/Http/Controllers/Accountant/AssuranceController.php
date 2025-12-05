<?php

namespace App\Http\Controllers\Accountant;

use App\Models\Accountant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\Accountant\SearchRepository;
use App\Repositories\Accountant\AssuranceRepository;

class AssuranceController extends Controller
{
    public function index()
    {
        return view('users.accountant.assurance.search', ['data' => [], 'assurances' => (new SearchRepository())->assuranceType()]);
    }

    public function search(Request $request)
    {
        if (empty($request->date_beging) && empty($request->date_end) && empty($request->assurance_id) && empty($request->type) && empty($request->caissiere_id)) {
            Session::flash('error', "Pas de selection.");
            return redirect()->back();
        }

        Session::flash('date_debut', $request->input('date_beging'));
        Session::flash('date_fin', $request->input('date_end'));
        Session::flash('assurance_id', $request->input('assurance_id'));
        Session::flash('type', $request->input('type'));

        $results = (new SearchRepository())->assurances($request);

        return view('users.accountant.assurance.search', ['data' => $results, 'assurances' => (new SearchRepository())->assuranceType()]);
    }

    public function pdf($begin, $end, $assurance, $type)
    {
        $results = (new SearchRepository())->pdf($begin, $end, $assurance, $type);
        $comptable = Accountant::find(Auth::user()->accountant->id);

        $pdf =  Pdf::loadView('users.accountant.assurance.pdf', ['data' => $results, 'comptable' => $comptable]);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        $response = new Response();
        $response->setContent($pdf->output());
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="assurance.pdf"');

        return $response;
    }
    public function today() 
    {
        $assurances = (new AssuranceRepository())->today();
        return view('users.accountant.assurance.today', ['assurances' => $assurances]);
    }
}
