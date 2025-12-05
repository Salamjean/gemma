<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Doctor;
use App\Models\TypeDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('hospital')->get();

        $title = "Liste des médecins";
        $empty = "Liste vide...";
        return view('users.super.doctor.index', ["title" => $title, 'doctors' => $doctors, 'empty' => $empty]);
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);

        $title = "Detail sur le docteur " .  $doctor->user->name;

        return view('users.super.doctor.show', compact('doctor', 'title'));

    }
}
