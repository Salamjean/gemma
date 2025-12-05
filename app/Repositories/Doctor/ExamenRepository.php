<?php

namespace App\Repositories\Doctor;

use App\Models\Examen;

class ExamenRepository
{
    public function __construct()
    {
        //
    }

    public function model()
    {
        return  Examen::class;
    }

    public function today()
    {
        return Examen::where('doctor_id', auth()->user()->doctor->id)->where('date_examen', date('Y-m-d'))->where('status', 0)->get();
    }

    public function history()
    {
        return Examen::where('doctor_id', auth()->user()->doctor->id)->where('date_examen', '<', date('Y-m-d'))->get();
    }

    public function cours()
    {
        return Examen::where('doctor_id', auth()->user()->doctor->id)->where('date_examen', date('Y-m-d'))->where('status', 'enCours')->get();
    }

    public function show()
    {
    }
}
