<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::where('status', 1)->with('user')->get();
        return view("users.super.patient.index", compact('patients'));
    }
}
