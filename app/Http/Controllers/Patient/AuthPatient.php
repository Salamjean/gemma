<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthPatient extends Controller
{
    public function login(){
        return view('patient.auth.login');
    }
}
