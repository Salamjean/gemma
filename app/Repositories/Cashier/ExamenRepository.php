<?php

namespace App\Repositories\Cashier;

use App\Http\Requests\ConsultationRequest;
use App\Models\Consultation;
use App\Models\Examen;
use Illuminate\Support\Facades\Auth;

class ExamenRepository
{
    public function model()
    {
        return Examen::class;
    }

    public function store($admission)
    {

        $examen = new Examen();
        $examen->date_examen = $admission['updated_at']->format('Y-m-d');
        $examen->code_examen = 'EXAM-' . rand(00000000, 111111111);
        $examen->admission_id = $admission['id'];
        $examen->hospital_id = $admission['hospital_id'];
        $examen->patient_id = $admission['patient_id'];
        $examen->doctor_id = $admission['doctor_id'];
        $examen->type_examen_id = $admission['type_examen_id'];
        $examen->montant = $admission['montant'];
        $examen->save();

        return ['status' => 'success'];

    }

}
