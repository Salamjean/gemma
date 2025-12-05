<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\TypeAssuranceRequest;
use App\Models\TypeAssurance;
use App\Repositories\Hospital\TypeAssuranceRepository;
use Illuminate\Http\Request;

class TypeAssuranceController extends Controller
{

    public function repository()
    {
        return new TypeAssuranceRepository();
    }
    public function index()
    {
        return view('users.hospital.type_assurance.index', ['types' => $this->repository()->index(), 'title' =>'Liste des assurances', 'empty' => 'Vide...' ]);
    }

    public function show($id)
    {
        return view('users.hospital.type_assurance.show', ['type' => $this->repository()->show($id), 'title' => 'Détails assurance']);
    }

    public function create()
    {
        return view('users.hospital.type_assurance.create', ['title' => 'Ajout d\'assurance']);
    }

    public function store(TypeAssuranceRequest $request)
    {

        $res = $this->repository()->store($request);

        return redirect()->route('hospital.type.assurance.index')->with($res['status'], $res['message']);

    }

    public function update(TypeAssuranceRequest $request,$id)
    {

        $res = $this->repository()->update($request, $id);

        return redirect()->route('hospital.type.assurance.index')->with($res['status'], $res['message']);
    }

    public function status($id)
    {

        $res = $this->repository()->status($id);

        return redirect()->route('hospital.type.assurance.index')->with($res['status'], $res['message']);

    }

    public function delete($id)
    {

        $type = TypeAssurance::findOrFail($id);

        $type->delete = 1;
        $type->save();

        return back()->with('success', "Type d'assurance supprimé avec succès.");
    }

}
