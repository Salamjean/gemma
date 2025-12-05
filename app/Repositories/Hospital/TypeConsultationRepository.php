<?php

namespace App\Repositories\Hospital;

use App\Http\Requests\Hospital\TypeConsultationRequest;
use App\Models\TypeConsultation;
use Illuminate\Support\Facades\Auth;

class TypeConsultationRepository
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return TypeConsultation::where('hospital_id', Auth::user()->hospital->id)->where('delete', 0)->get();
    }

    public function show($id)
    {
        return TypeConsultation::findOrFail($id);
    }

    public function store(TypeConsultationRequest $request)
    {

        $request->validated();

        $type = new TypeConsultation();

        $type->libelle = $request->libelle;
        $type->reference = 'TC' . rand(00000,99999);
        $type->prix = $request->prix;
        $type->description = $request->description ?? null;
        $type->hospital_id = Auth::user()->hospital->id;
        $type->save();

        return ['status' => 'success', 'message' => 'Type de consultation ajouté avec succès.'];
    }

    public function update(TypeConsultationRequest $request, $id)
    {
        $request->validated();

        $type = TypeConsultation::findOrFail($id);

        $consultation = ['Consultation', 'Consultation pré natale', 'Consultation post natale', 'Accouchement'];

        // if(array_search($type->libelle, $consultation))
        //     return ['status' => 'error', 'message' => 'Impossible de modifier la consultation.'];

        $type->libelle = $request->libelle;
        $type->description = $request->description ?? null;
        $type->prix = $request->prix;
        $type->save();

        return ['status' => 'success', 'message' => 'Type de consultation modifié avec succès.'];
    }


    public function status($id)
    {

        $type = TypeConsultation::findOrFail($id);

        $type->status = $type->status == 0 ? 1 : 0;
        $type->save();

        $status = $type->status  == 0 ? ' desactivé.' : ' activé.';

        return ['status' => 'success', 'message' => 'Type de consultation' . $status];
    }
}
