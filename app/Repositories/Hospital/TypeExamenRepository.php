<?php

namespace App\Repositories\Hospital;

use App\Http\Requests\Hospital\TypeExamenRequest;
use App\Models\TypeExamen;
use Illuminate\Support\Facades\Auth;

class TypeExamenRepository
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return TypeExamen::where('hospital_id', Auth::user()->hospital->id)->get();
    }

    public function show($id)
    {
        return TypeExamen::findOrFail($id);
    }

    public function store(TypeExamenRequest $request)
    {

        $request->validated();

        $type = new TypeExamen();

        $type->libelle = $request->libelle;
        $type->reference = 'TE-' . rand(00000, 99999);
        $type->prix = $request->prix;
        $type->description = $request->description ?? null;
        $type->hospital_id = Auth::user()->hospital->id;
        $type->save();

        return ['status' => 'success', 'message' => 'Type examen ajouté avec succès.'];
    }

    public function update(TypeExamenRequest $request, $id)
    {
        $request->validated();

        $type = TypeExamen::findOrFail($id);

        $type->libelle = $request->libelle;
        $type->description = $request->description ?? null;
        $type->prix = $request->prix;
        $type->save();

        return ['status' => 'success', 'message' => 'Type examen modifié avec succès.'];
    }


    public function status($id)
    {

        $type = TypeExamen::findOrFail($id);

        $type->status = $type->status == 0 ? 1 : 0;
        $type->save();

        $status = $type->status  == 0 ? ' desactivé.' : ' activé.';

        return ['status' => 'success', 'message' => 'Type examen' . $status];
    }
}
