<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Repositories\Hospital\HospitalisationRepository;
use Illuminate\Http\Request;

class HospitalisationController extends Controller
{
    public function list()
    {
        $hospitalisations = (new HospitalisationRepository())->list();
        return view('users.hospital.hospitalisation.list', ['hospitalisations' => $hospitalisations]);
    }

    public function detail($id)
    {
        $hospitalisation = (new HospitalisationRepository())->detail($id);
        return view('users.hospital.hospitalisation.detail', ['hospitalisation' => $hospitalisation]);
    }
}
