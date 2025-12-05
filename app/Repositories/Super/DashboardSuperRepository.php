<?php

namespace App\Repositories\Super;

use App\Models\Admin;
use App\Models\Consultation;
use App\Models\Declaration;
use App\Models\Hospital;
use Illuminate\Support\Facades\DB;

class DashboardSuperRepository

{

    public function model()
    {
        return Admin::class;
    }

    public function birth()
    {
        $mois = [];

        for ($i = 9; $i >= 0; $i--) {
            $mois[] = now()->subMonths($i)->format('Y-m');
        }

        $nombre = Declaration::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS month'), DB::raw('COUNT(*) as count'))
            ->where('type', 'birth')
            ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), $mois)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $nombre = array_replace(array_fill_keys($mois, 0), $nombre->toArray());

        return $nombre;
    }

    public function death()
    {
        $mois = [];

        for ($i = 9; $i >= 0; $i--) {
            $mois[] = now()->subMonths($i)->format('Y-m');
        }

        $nombre = Declaration::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS month'), DB::raw('COUNT(*) as count'))
            ->where('type', 'death')
            ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), $mois)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $nombre = array_replace(array_fill_keys($mois, 0), $nombre->toArray());

        return $nombre;
    }

    public function consultation()
    {
        $consultation = [];

        for ($i = 9; $i >= 0; $i--) {
            $consultation[] = now()->subMonths($i)->format('Y-m');
        }

        $nombre = Consultation::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS month'), DB::raw('COUNT(*) as count'))
            ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), $consultation)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $nombre = array_replace(array_fill_keys($consultation, 0), $nombre->toArray());

        return $nombre;
    }
}
