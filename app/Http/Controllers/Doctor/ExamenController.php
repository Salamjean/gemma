<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Repositories\Doctor\ExamenRepository;
use Illuminate\Http\Request;

class ExamenController extends Controller
{

    public function instance()
    {
        return new ExamenRepository();
    }

    public function today()
    {

        return view('users.doctor.examen.today', ['examens' => $this->instance()->today()]);
    }

    public function history()
    {
        return view('users.doctor.examen.history', ['examens' => $this->instance()->history()]);
    }

    public function cours()
    {
        return view('users.doctor.examen.cours', ['examens' => $this->instance()->cours()]);
    }

}
