<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RendezVous;
use App\Models\Availability;

class PlanningController extends Controller
{
    public function index()
    {
        $rdv = [];

        if (auth()->user() && $doctor = auth()->user()->doctor) {
            $rdv = RendezVous::whereHas('consultation', function ($query) use ($doctor) {
                $query->with('patient.user')->where('doctor_id', $doctor->id);
            })->get();

            if (count($rdv) > 0) {
                foreach ($rdv as $item) {
                    $item->date = Carbon::parse($item->date)->format('Y-m-d');
                }
            }
        }

        return view('users.planning', ['title' => 'Votre planning', 'rendezVous' => $rdv]);
    }
}
