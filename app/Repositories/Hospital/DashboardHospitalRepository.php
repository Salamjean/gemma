<?php

namespace App\Repositories\Hospital;

use App\Models\Consultation;
use App\Models\Declaration;
use App\Models\DeclarationDeces;
use App\Models\DeclarationNaissance;
use App\Models\Hospital;
use Illuminate\Support\Facades\DB;

class DashboardHospitalRepository
{
    protected $userId;
    protected $hospitalId;

    public function __construct($hospital)
    {
        $this->userId = $hospital;
        $hospitalData = Hospital::where('user_id', $this->userId)->first();
        $this->hospitalId = $hospitalData->id;
    }

    public function model()
    {
        return Hospital::class;
    }

    public function dabhboard()
    {
        //BIRTH HOSPITAL
        $moisB = [];

        for ($i = 9; $i >= 0; $i--) {
            $moisB[] = now()->subMonths($i)->format('Y-m');
        }

        $birth = Declaration::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS month'), DB::raw('COUNT(*) as count'))
            ->where('hospital_id', $this->hospitalId)
            ->where('type', 'birth')
            ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), $moisB)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $birth = array_replace(array_fill_keys($moisB, 0), $birth->toArray());

        //DETATH HOSPITAL
        $moisD = [];

        for ($i = 9; $i >= 0; $i--) {
            $moisD[] = now()->subMonths($i)->format('Y-m');
        }

        $death = Declaration::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS month'), DB::raw('COUNT(*) as count'))
            ->where('hospital_id', $this->hospitalId)
            ->where('type', 'death')
            ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), $moisD)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $death = array_replace(array_fill_keys($moisD, 0), $death->toArray());

        //CONSULTATION
        $moisC = [];

        for ($i = 9; $i >= 0; $i--) {
            $moisC[] = now()->subMonths($i)->format('Y-m');
        }


        $consultation = Consultation::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS month'), DB::raw('COUNT(*) as count'))
        ->where('hospital_id', $this->hospitalId)
            ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), $moisC)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $consultation = array_replace(array_fill_keys($moisC, 0), $consultation->toArray());

        return [
            'consultation' => $consultation,
            'birth' => $birth,
            'death' => $death
        ];
    }


}
