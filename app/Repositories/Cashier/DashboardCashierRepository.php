<?php

namespace App\Repositories\Cashier;

use App\Models\Admission;
use App\Models\Caissiere;
use App\Models\Hospital;
use Illuminate\Support\Facades\DB;

class DashboardCashierRepository
{
    protected $userId;
    protected $cashierID;

    public function __construct($hospital)
    {
        $this->userId = $hospital;
        $cashierData = Caissiere::where('user_id', $this->userId)->first();
        $this->cashierID = $cashierData->id;
    }

    public function model()
    {
        return Caissiere::class;
    }

    public function admissionCashier()
    {
        // $admission = [];

        // for ($i = 9; $i >= 0; $i--) {
        //     $admission[] = now()->subMonths($i)->format('Y-m');
        // }

        // $nombre = Admission::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS month'), DB::raw('COUNT(*) as count'))
        //     ->where('caissiere_id', $this->cashierID)
        //     ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), $admission)
        //     ->groupBy('month')
        //     ->orderBy('month')
        //     ->pluck('count', 'month');

        // $nombre = array_replace(array_fill_keys($admission, 0), $nombre->toArray());

        return 0;
    }

}
