<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\TypeDoctorRequest;
use App\Models\Doctor;
use App\Models\TypeDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeDoctorController extends Controller
{
    public function index()
    {
        $type = TypeDoctor::where('hospital_id', Auth::user()->hospital->id)->where('delete', 0)->get();;
        $title = "Liste type de medécins";
        return view('users.hospital.type_doctor.index', ["title" => $title, 'type' => $type]);
    }

    public function show($id)
    {
        $type = TypeDoctor::findOrFail($id);
        $title = "Détails | $type->label";

        return view('users.hospital.type_doctor.show', compact('type', 'title'));
    }

    public function add()
    {
        $title = "Ajout d'un type de docteur";
        return view('users.hospital.type_doctor.add', ["title" => $title]);
    }

    public function store(TypeDoctorRequest $request)
    {
        $request->validated();

        $existing = TypeDoctor::where('label', $request->label)->where('hospital_id', Auth::user()->hospital->id)->exists();

        if ($existing)
        {
            return back()->with('success','Ce Type de medecin existe déjà !');
        }

        $type = new TypeDoctor();

        $type -> hospital_id = Auth::user()->hospital->id;
        $type -> label = $request -> label;
        $type -> save();

        return redirect()->route('hospital.type.doctor.index')->with('success','Ce Type de medecin a été enregistré.');

    }

    public function update($id, TypeDoctorRequest $request)
    {
        $request->validated();

        $type = TypeDoctor::findOrFail($id);

        $type -> label = $request->label;

        $type->save();

        return redirect()->route('hospital.type_doctor.index')->with('success','Ce type de medecin a été mis à jour.');


    }

    public function status($id)
    {
        $type = TypeDoctor::findOrFail($id);

        $type -> status = $type -> status == 0 ? 1 : 0;

        $type->save();

        return back()->with('success',"Statut modifié avec succès.");

    }

    public function delete($id)
    {

        $type = TypeDoctor::findOrFail($id);

        $type->delete = 1;
        $type->save();

        return back()->with('success', "Type de docteur supprimé avec succès.");
    }
}
