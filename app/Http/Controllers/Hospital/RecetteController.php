<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Repositories\Hospital\RecetteRepository;
use Illuminate\Http\Request;

class RecetteController extends Controller
{

    public function list()
    {
        $consultations = (new RecetteRepository())->list();
        return view('users.hospital.recette.list', ['consultations' => $consultations]);
    }

    public function day($day)
    {
        $admissions = (new RecetteRepository())->day($day);
        return view('users.hospital.recette.day', ['admissions' =>$admissions, 'day' => $day]);
    }

    public function detail($day, $id)
    {
        $consultation = (new RecetteRepository())->detail($day, $id);
        return view('users.hospital.recette.detail', ['consultation' => $consultation]);
    }
}
