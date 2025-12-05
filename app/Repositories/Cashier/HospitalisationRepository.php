<?php

namespace App\Repositories\Cashier;

use App\Models\Hospitalisation;

class HospitalisationRepository
{
    public function __construct()
    {
        //
    }

    public function model()
    {
        return Hospitalisation::class;
    }

    public function list()
    {
        $user = auth()->user();

        if ($user && $user->hospital) {
            $hospital = $user->hospital;
            $hospitalisations = Hospitalisation::whereHas('consultation', function ($query) use ($hospital) {
                $query->where('hospital_id', $hospital->id);
            })->get();

            return $hospitalisations;
        }

        return [];
    }

    public function detail($id)
    {
        $hospitalisation = $this->model()::findOrFail($id);
        if ($hospitalisation->consultation->hospital_id != auth()->user()->hospital->id)
            return back()->withErrors('Mise en hospitalisation introuvable.');

        return $hospitalisation;
    }
}
