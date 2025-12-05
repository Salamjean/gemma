<?php

namespace App\Repositories\Accountant;

use App\Models\Accountant;
use App\Models\Admission;
use App\Models\Assurance;
use Illuminate\Support\Facades\DB;

class DashboardRepository
{
    protected $userId;
    protected $accountantID;
    protected $hospitalID;

    public function __construct($id)
    {
        $this->userId = $id;
        $cashierData = Accountant::where('user_id', $this->userId)->first();
        $this->accountantID = $cashierData->id;
        $this->hospitalID = $cashierData->hospital_id;
    }

    public function model()
    {
        return Accountant::class;
    }

    public function montant()
    {
        $admission = [];

        for ($i = 14; $i >= 0; $i--) {
            $admission[] = now()->subDays($i)->format('Y-m-d');
        }

        $sommeMontants = Admission::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") AS day'),
            DB::raw('SUM(montant) as sum')
        )
        ->where('hospital_id', $this->hospitalID)
        ->where('statut_paiement', '1')
        ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), $admission)
        ->groupBy('day')
        ->orderBy('day')
        ->pluck('sum', 'day');

        $sommeMontants = array_replace(array_fill_keys($admission, 0), $sommeMontants->toArray());

        return $sommeMontants;
    }

    public function montantN()
    {
        $admission = [];

        for ($i = 14; $i >= 0; $i--) {
            $admission[] = now()->subDays($i)->format('Y-m-d');
        }

        $sommeMontants = Admission::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") AS day'),
            DB::raw('SUM(montant_normal) as sum')
        )
            ->where('hospital_id', $this->hospitalID)
            ->where('statut_paiement', '1')
            ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), $admission)
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('sum', 'day');

        $sommeMontants = array_replace(array_fill_keys($admission, 0), $sommeMontants->toArray());

        return $sommeMontants;
    }

    public function montantA()
    {
        $admission = [];

        for ($i = 14; $i >= 0; $i--) {
            $admission[] = now()->subDays($i)->format('Y-m-d');
        }

        $sommeMontants = Assurance::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") AS day'),
            DB::raw('SUM(prix) as sum')
        )
            ->where('hospital_id', $this->hospitalID)
            ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), $admission)
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('sum', 'day');

        $sommeMontants = array_replace(array_fill_keys($admission, 0), $sommeMontants->toArray());

        return $sommeMontants;
    }
}
