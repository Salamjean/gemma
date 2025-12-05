<?php

namespace App\Repositories\Cashier;

use App\Http\Requests\ConsultationRequest;
use App\Models\Consultation;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;

class ConsultationRepository
{
    public function model()
    {
        return Consultation::class;
    }

    /**
     * @return array
     * doctor
     * consultation status 0 of today
     */
    public function today()
    {
        return Consultation::orderByDESC('created_at')->where('doctor_id', Auth::user()->doctor->id)->where('date_consultation', date('Y-m-d'))->where('status', '0')->get();
    }

    public function history()
    {
        return Consultation::orderByDESC('created_at')->where('doctor_id', Auth::user()->doctor->id)->where('date_consultation', '<' ,date('Y-m-d'))->get();
    }

    public function store($admission)
    {

        $patient = Patient::find($admission['patient_id']);

        if(!$patient)
            return ['status' => 'error'];

        $nb = $patient->consultations->count();

        $consultation = new Consultation();
        $consultation->date_consultation = $admission['updated_at']->format('Y-m-d');
        $consultation->code_consultation = 'CONSULT' . substr($patient->code_patient, 2) . $nb+1;
        $consultation->admission_id = $admission['id'];
        $consultation->hospital_id = $admission['hospital_id'];
        $consultation->patient_id = $admission['patient_id'];

        if ($admission['doctor_id']){
            $consultation->doctor_id = $admission['doctor_id'];
            $consultation->status_inf =  0;
        }

        $consultation->infirmier_id = $admission['infirmier_id'];

        $consultation->prestation_hospital_id = $admission['prestation_hopital_id'];
        $consultation->montant = $admission['montant'];
        $consultation->save();

        return ['status' => 'success'];

    }

}
