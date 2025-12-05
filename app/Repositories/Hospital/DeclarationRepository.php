<?php

namespace App\Repositories\Hospital;

use App\Models\Declaration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DeclarationRepository
{
    public function __construct()
    {
        //
    }



    public function indexDeces()
    {
        return Declaration::with('patient.user')->where('type', 'death')->where('hospital_id', Auth::user()->hospital->id)->with('deces')->get();
    }

    public function showDeces($id)
    {
        return Declaration::findOrFail($id);
    }


    //naissance
    public function indexNaissance()
    {
        return Declaration::with('patient.user')->with('naissance')->where('type', 'birth')->where('hospital_id', Auth::user()->hospital->id)->get();
    }

    public function showNaissance($id)
    {
        return Declaration::findOrFail($id);
    }


}
