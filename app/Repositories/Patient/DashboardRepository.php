<?php

namespace App\Repositories\Patient;

use App\Models\Consultation;
use App\Models\Declaration;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class DashboardRepository
{
    protected $userId;
    protected $patientId;

    public function __construct($patient)
    {
        $this->userId = $patient;
        $patientData = Patient::where('user_id', $this->userId)->first();
        $this->patientId = $patientData->id;
    }

    public function dashboard()
    {
        
        //CONSULTATION
        $moisC = [];

        for ($i = 9; $i >= 0; $i--) {
            $moisC[] = now()->subMonths($i)->format('Y-m');
        }

        $consultation = Consultation::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS month'), DB::raw('COUNT(*) as count'))
        ->where('patient_id', $this->patientId)
            ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), $moisC)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $consultation = array_replace(array_fill_keys($moisC, 0), $consultation->toArray());

        return [
            'consultation' => $consultation,
        ];
    }

    public function declaration()
    {
        $declaration = Declaration::where('patient_id', $this->patientId)->with('deces', 'naissance')->orderByDESC('created_at')->take(5)->get();

        return $declaration;
    }

    public function consultation()
    {
        $consultation = Consultation::where('patient_id', $this->patientId)->with('registre', 'hospitalisation', 'arret', 'examen', 'ordonnance', 'admission', 'observation')->orderByDESC('created_at')->take(5)->get();

        return $consultation;

    }
}
