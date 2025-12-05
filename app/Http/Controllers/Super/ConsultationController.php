<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\Consultation;




class ConsultationController extends Controller
{
    public function index()
    {
        $secretaryUsers = User::where('role_as', 'secretariat')->get();
        $patients = Patient::with('user')->get();
        $doctors = Doctor::with('user')->get();
        $consultations = Consultation::all();
        $admissions = Admission::all();

        return view('users.super.consultation.index', compact('patients', 'doctors',  'secretaryUsers','consultations','admissions'));

    }
}
