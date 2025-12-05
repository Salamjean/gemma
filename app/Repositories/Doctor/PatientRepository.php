<?php

namespace App\Repositories\Doctor;

use App\Models\Patient;

class PatientRepository
{
    public function __construct()
    {
        //
    }

    public function list()
    {
        $patients = Patient::where('status', 1)->with('user')->get();
        return $patients;
    }

    public function show($id)
    {
        $patients = Patient::findOrFail($id);
        return $patients;
    }
}
