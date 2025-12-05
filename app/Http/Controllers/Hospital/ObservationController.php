<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Repositories\Hospital\ObservationRepository;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    public function list()
    {
        $observations = (new ObservationRepository())->list();
        return view('users.hospital.observation.list', ['observations' => $observations]);
    }

    public function detail($id)
    {
        $observation = (new ObservationRepository())->detail($id);
        return view('users.hospital.observation.detail', ['observation' => $observation]);
    }
}
