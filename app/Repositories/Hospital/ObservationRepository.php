<?php

namespace App\Repositories\Hospital;

use App\Models\Observation;

class ObservationRepository
{
    public function __construct()
    {
        //
    }

    public function model()
    {
        return Observation::class;
    }

    public function list()
    {
        $hospital = auth()->user()->hospital;
        $observations = $this->model()::orderByDESC('created_at')->whereHas('consultation', function ($query) use ($hospital) {
            $query->where('hospital_id', $hospital->id);
        })->get();

        return $observations;
    }

    public function detail($id)
    {
        $observation = $this->model()::findOrFail($id);

        // if ($observation->consultation->hospital_id ?? 0 != auth()->user()->hospital->id)
        //     return redirect()->back()->withErrors('Mise en observation introuvable.');

        return $observation;
    }
}
