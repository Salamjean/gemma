<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\TypeExamenRequest;
use App\Repositories\Hospital\TypeExamenRepository;
use Illuminate\Http\Request;

class TypeExamenController extends Controller
{
    public function repository()
    {
        return new TypeExamenRepository();
    }
    public function index()
    {
        return view('users.hospital.type_examen.index', ['types' => $this->repository()->index(), 'title' =>'Liste des examens', 'empty' => 'Vide...']);
    }

    public function show($id)
    {
        return view('users.hospital.type_examen.show', ['type' => $this->repository()->show($id), 'title' => 'Détails examen']);
    }

    public function create()
    {
        return view('users.hospital.type_examen.create', [ 'title' => 'Ajout de type d\'examen']);
    }

    public function store(TypeExamenRequest $request)
    {

        $res = $this->repository()->store($request);

        return redirect()->route('hospital.type.examen.index')->with($res['status'], $res['message']);
    }

    public function update(TypeExamenRequest $request, $id)
    {

        $res = $this->repository()->update($request, $id);

        return redirect()->route('hospital.type.examen.index')->with($res['status'], $res['message']);
    }

    public function status($id)
    {

        $res = $this->repository()->status($id);

        return redirect()->route('hospital.type.examen.index')->with($res['status'], $res['message']);
    }
}
