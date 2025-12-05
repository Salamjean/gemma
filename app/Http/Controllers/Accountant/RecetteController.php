<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use App\Repositories\Accountant\RecetteRepository;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    public function list()
    {
        $consultations = (new RecetteRepository())->list();
        return view('users.accountant.recette.list', ['consultations' => $consultations]);
    }
    public function aujourdHui()
    {
        $consultations = (new RecetteRepository())->today();
        return view('users.accountant.recette.today', ['consultations' => $consultations]);
    }

    public function day($day)
    {
        $admissions = (new RecetteRepository())->day($day);
        return view('users.accountant.recette.day', ['admissions' => $admissions, 'day' => $day]);
    }

    public function detail($day, $id)
    {
        $consultation = (new RecetteRepository())->detail($day, $id);
        return view('users.accountant.recette.detail', ['consultation' => $consultation]);
    }
    public function historique()
    {
        $consultations = (new RecetteRepository())->list();
        return view('users.accountant.recette.historique', ['consultations' => $consultations]);
    }
    
}
