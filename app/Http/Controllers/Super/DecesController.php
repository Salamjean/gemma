<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\Declaration;
use App\Models\DeclarationDeces;
use App\Models\Patient;
use Illuminate\Http\Request;

class DecesController extends Controller
{
    public function indexDeces()
    {
        
        $declarations = Declaration::with(['patient.user', 'deces'])
            ->where('type', 'death')
            ->where('hospital_id', optional(auth()->user()->doctor)->hospital_id)
            ->get();

        return $declarations;
    }

    public function listDeces()
    {
        
        $decladeaths = DeclarationDeces::all();
        $declarations = Declaration::all();


        return view('users.super.declaration.death', compact('decladeaths','declarations'));

    }
}
