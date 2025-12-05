<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Repositories\Hospital\PatientRepository;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function instance()
    {
        return new PatientRepository();
    }

    public function index()
    {
        $title = "Liste des patients";
        return view('users.hospital.patient.index', ["title" => $title, 'patients' => $this->instance()->list()]);
    }

    public function show($id)
    {
        return view('users.hospital.patient.show', ['patient' => $this->instance()->show($id)]);
    }
}
