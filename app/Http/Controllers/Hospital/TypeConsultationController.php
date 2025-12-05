<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\TypeConsultationRequest;
use App\Models\TypeConsultation;
use App\Repositories\Hospital\TypeConsultationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeConsultationController extends Controller
{
    public function repository()
    {
        return new TypeConsultationRepository();
    }
    public function index()
    {
        return view('users.hospital.type_consultation.index', ['types' => $this->repository()->index(), 'title' => 'Liste des consultations', 'empty' => 'Vide...']);
    }

    public function show($id)
    {
        return view('users.hospital.type_consultation.show', ['type' => $this->repository()->show($id), 'title' => 'Détails consultation']);
    }

    public function create()
    {
        return view('users.hospital.type_consultation.create', ['title' => 'Ajout consultation']);
    }

    public function store(TypeConsultationRequest $request)
    {
        $res = $this->repository()->store($request);

        return redirect()->route('hospital.type.consultation.index')->with($res['status'], $res['message']);
    }

    public function update(TypeConsultationRequest $request, $id)
    {

        $res = $this->repository()->update($request, $id);

        return redirect()->route('hospital.type.consultation.index')->with($res['status'], $res['message']);
    }

    public function status($id)
    {

        $res = $this->repository()->status($id);

        return redirect()->route('hospital.type.consultation.index')->with($res['status'], $res['message']);
    }

    public function delete($id)
    {

        $type = TypeConsultation::findOrFail($id);

        $type->delete = 1;
        $type->save();

        return back()->with('success', "Type de consultation supprimé avec succès.");
    }
}
