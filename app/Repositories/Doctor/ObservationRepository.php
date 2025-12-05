<?php

namespace App\Repositories\Doctor;

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
        $doctor = auth()->user()->doctor;
        $observations = $this->model()::orderByDESC('created_at')->whereHas('consultation', function ($query) use ($doctor) {
            $query->where('doctor_id', $doctor->id);
        })->get();

        return $observations;
    }

    public function detail($id)
    {
        $observation = $this->model()::findOrFail($id);

        return $observation;
    }
}
