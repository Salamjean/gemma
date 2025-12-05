<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Caissiere;
use App\Models\Consultation;
use App\Repositories\Cashier\RecetteRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecetteController extends Controller
{
    public function list()
    {
        $consultations = (new RecetteRepository())->list();
        return view('users.cashier.recette.list', ['consultations' => $consultations]);
    }

    public function day($day)
    {
        $admissions = (new RecetteRepository())->day($day);
        return view('users.cashier.recette.day', ['admissions' => $admissions, 'day' => $day]);
    }
    

}
