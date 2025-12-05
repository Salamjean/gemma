<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\Declaration;
use App\Models\DeclarationNaissance;

class NaissanceController extends Controller
{
    public function indexNaissance()
    {
        // Récupérer les déclarations de naissance associées à l'utilisateur connecté
        $declarations = Declaration::with(['patient.user', 'naissance'])
            ->where('type', 'birth')
            ->where('hospital_id', optional(auth()->user()->doctor)->hospital_id)
            ->get();

        return $declarations;
    }

    public function listNaissance()
    {
            // Appeler la méthode indexNaissance() pour récupérer les déclarations de naissance
        //$declarations = $this->indexNaissance();
        $declabirths = DeclarationNaissance::all();
        $declarations = Declaration::all();


        // Passer les déclarations de naissance à la vue
        //return view('users.super.declaration.birth', ['declarations' => $declarations]);
        return view('users.super.declaration.birth', compact('declabirths','declarations'));

    }
}