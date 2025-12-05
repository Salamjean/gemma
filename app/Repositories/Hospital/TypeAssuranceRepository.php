<?php

namespace App\Repositories\Hospital;

use App\Http\Requests\Hospital\TypeAssuranceRequest;
use App\Models\TypeAssurance;
use Illuminate\Support\Facades\Auth;

class TypeAssuranceRepository
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return TypeAssurance::where('hospital_id', Auth::user()->hospital->id)->where('delete', 0)->get();
    }

    public function show($id)
    {
        return TypeAssurance::findOrFail($id);
    }

    public function store(TypeAssuranceRequest $request)
    {

        $request->validated();

        $type = new TypeAssurance();

        $type -> libelle = $request -> libelle;
        $type->reference = 'TA-' . rand(00000, 99999);
        $type -> reduction = $request -> reduction / 100;
        $type -> description = $request -> description ?? null;
        $type -> hospital_id = Auth::user()->hospital->id;
        $type -> save();

        return ['status' => 'success', 'message' => 'Type assurance ajouté avec succès.'];

    }

    public function update(TypeAssuranceRequest $request, $id)
    {
        $request -> validated();

        $type = TypeAssurance::findOrFail($id);

        $type  -> libelle = $request -> libelle;
        $type  -> description = $request -> description ?? null;
        $type -> reduction = $request->reduction / 100;
        $type -> save();

        return ['status' => 'success', 'message' => 'Type assurance modifié avec succès.'];


    }


    public function status($id)
    {

        $type = TypeAssurance::findOrFail($id);

        $type -> status = $type -> status == 0 ? 1 : 0;
        $type ->save();

        $status = $type -> status  == 0 ? ' desactivé.' : ' activé.';

        return ['status' => 'success', 'message' => 'Type assurance' . $status];

    }



}
