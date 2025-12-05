<?php

namespace App\Repositories\Hospital;

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
        $hospital = auth()->user()->hospital;
        $hospitalisations = $this->model()::whereHas('consultation', function ($query) use ($hospital) {
            $query->where('hospital_id', $hospital->id);
        })->get();

        return $hospitalisations;
    }

    public function detail($id)
    {
        $hospitalisation = $this->model()::findOrFail($id);
        if ($hospitalisation->consultation->hospital_id != auth()->user()->hospital->id)
            return back()->withErrors('Mise en hospitalisation introuvable.');

        return $hospitalisation;
    }
}
