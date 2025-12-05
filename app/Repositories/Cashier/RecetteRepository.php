<?php

namespace App\Repositories\Cashier;

use App\Models\Admission;
use App\Models\Caissiere;
use App\Models\Consultation;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecetteRepository
{
    public function __construct()
    {
        //
    }

    public function list()
    {

        $payments = Payment::where('caissiere_id', auth()->user()->cashier->id)->where('status', 'success')
            ->select(DB::raw('DATE(created_at) as jour'), DB::raw('COUNT(*) as nb'), DB::raw('SUM(prix) as somme'), DB::raw('MAX(created_at) as latest_created_at'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderByDesc('latest_created_at')
            ->get();

        return $payments;
    }

    public function day($day)
    {

        $payments = Payment::where('caissiere_id', auth()->user()->cashier->id)->where('status', 'success')->whereDate('created_at', $day)
            
            ->get();

        return $payments;
    }

    public function detail($day)
    {
        return Admission::where('caissiere_id', Auth::user()->cashier->id)->whereDate('date_admission',date('Y-m-d'))->where('statut_paiement',1)->get();

    }
}
