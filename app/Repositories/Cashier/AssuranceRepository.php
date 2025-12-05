<?php

namespace App\Repositories\Cashier;

use App\Models\Admission;
use App\Models\Assurance;
use App\Models\Hospitalisation;
use App\Models\TypeAssurance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AssuranceRepository
{
    public function __construct()
    {
        //
    }

    public function all()
    {
        return TypeAssurance::where('hospital_id', Auth::user()->cashier->hospital_id)->get();
    }

    public function today()
    {
        return Assurance::where('caissiere_id', Auth::user()->cashier->id)->where('date', date('Y-m-d'))->get();
    }

    public function history()
    {
        return Assurance::where('caissiere_id', Auth::user()->cashier->id)->get();
    }

    public function store($payment)
    {

        $type = TypeAssurance::findOrFail($payment['type_assurance_id']);

        $assurance = new Assurance();
        $assurance->type = $payment['type'];
        $assurance->reference = 'AS' . rand(00000000, 111111111);
        $assurance->payment_id = $payment['id'];
        $assurance->hospital_id = Auth::user()->cashier->hospital_id;
        $assurance->date = Carbon::now()->format('Y-m-d');
        $assurance->caissiere_id = Auth::user()->cashier->id;
        $assurance->type_assurance_id = $payment['type_assurance_id'];
        $assurance->prix = $payment['prix_normal'] * $type->reduction;
        $assurance->percent = $type->reduction;

        if ($payment['type'] == 'admission') {
            $data = Admission::find($payment['admission_id']);
            $patient = $data->patient_id;
        } elseif ($payment['type'] == 'hospitalisation') {
            $data = Hospitalisation::find($payment['hospitalisation_id']);
            $patient = $data->consultation->patient_id;
        }

        $assurance->patient_id = $patient;

        $assurance->save();

        return ['status' => 'success'];
    }
}
