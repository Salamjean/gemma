<?php

namespace App\Repositories\Accountant;

use App\Models\Assurance;

class AssuranceRepository
{
    public function __construct()
    {
        //
    }
    public function today()
    {
        $assurances = Assurance::where('hospital_id', auth()->user()->accountant->hospital_id)->where('date', date('Y-m-d'))->get();
        return $assurances;
    }
}
