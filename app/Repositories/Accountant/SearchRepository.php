<?php

namespace App\Repositories\Accountant;

use App\Models\Caissiere;
use App\Models\TypeAssurance;
use App\Models\Admission;
use App\Models\Assurance;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SearchRepository
{
    public function __construct()
    {
        //
    }

    public function assuranceType()
    {
        $assurance = TypeAssurance::where('hospital_id', auth()->user()->accountant->hospital_id)->get();
        return $assurance;
    }

    public function cashiers()
    {
        $cashiers = Caissiere::where('hospital_id', auth()->user()->accountant->hospital_id)->with('user')->get();
        return $cashiers;
    }

    public function admissions(Request $request)
    {
        $query = Admission::query();
        
        $query->where('hospital_id', auth()->user()->accountant->hospital_id);

        if ($request->date_beging) {
            $query->where('date_paiement', '>=', $request->date_beging);
        }

        if ($request->date_end) {
            $query->where('date_paiement', '<=', $request->date_end);
        }

        if ($request->assurance_id) {
            $query->where('type_assurance_id', $request->assurance_id);
        }

        if ($request->caissiere_id) {
            $query->where('caissiere_id', $request->caissiere_id);
        }

        $results = $query->with('typeConsultation', 'assurance')->orderByDESC('created_at')->get();

        return $results;

    }

    public function assurances (Request $request)
    {
        //dd($request->all());
        $query = Payment::query();
        
        $query->where('hospital_id', auth()->user()->accountant->hospital_id);

        if ($request->date_beging) {
            $query->where('date', '>=', $request->date_beging);
        }

        if ($request->date_end) {
            $query->where('date', '<=', $request->date_end);
        }

        if ($request->assurance_id) {
            $query->where('type_assurance_id', $request->assurance_id);
        }
        if ($request->type) {
            $query->where('type', $request->type);
        }

        $results = $query->with('typeAssurance', 'admission.consultation', 'admission.patient.user')->orderByDESC('created_at')->get();
        
        return $results;
    }

    public function pdf($begin, $end, $assurance, $type)
    {
        $query = Payment::query();
        
        $query->where('hospital_id', auth()->user()->accountant->hospital_id);


        if ($begin != 'empty') {
            $query->where('date', '>=', $begin);
        }

        if ($end != 'empty') {
            $query->where('date', '<=', $end);
        }

        if ($assurance != 'empty') {
            $query->where('type_assurance_id', $assurance);
        }
        if ($type != 'empty') {
            $query->where('type', $type);
        }

        $results = $query->with('typeAssurance', 'admission.consultation', 'admission.patient.user')->get();

        return $results;
    }

}
