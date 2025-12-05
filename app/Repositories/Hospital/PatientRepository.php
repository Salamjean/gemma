<?php

namespace App\Repositories\Hospital;

use App\Models\Patient;

class PatientRepository
{
    public function __construct()
    {
        //
    }

   public function list()
    {
        $hospitalId = auth()->user()->hospital->id;
        $patients = Patient::whereHas('passage', function ($query) use ($hospitalId) {
            $query->where('hospital_id', $hospitalId);
        })
            ->where('status', 1)
            ->with('user')
            ->get();
        return $patients;
    }

    public function show($id)
    {
        $patients = Patient::findOrFail($id);
        return $patients;
    }
}
