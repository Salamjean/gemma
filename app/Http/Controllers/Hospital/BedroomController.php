<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\Bedroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BedroomController extends Controller
{

    //bedroom action
    public function index()
    {
        $title = "Liste des chambres";

        $bedrooms = Bedroom::where('hospital_id', Auth::user()->hospital->id)->where('delete', 0)->withCount('beds')->get();

        return view('users.hospital.chambre.index', ["title" => $title, 'bedrooms' => $bedrooms]);
    }

    public function show($id)
    {

        $bedroom = Bedroom::findOrFail($id);

        $title = "Détails sur la chambre n° $bedroom->number ";

        return view('users.hospital.chambre.show',  ['title' => $title, 'bedroom' => $bedroom]);
    }

    public function add(Request $request)
    {


        $type = array_keys($request->all());
        $type = $type[0];
        //or
        // $type =  $request->all()['type'];
        //or
        // $type =  $request->get('type');

        $title = "Ajout de chambre";

        return view('users.hospital.chambre.add', compact('title', 'type'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'type' => 'required|integer',
            'number' => 'required',
            'description' => 'nullable|min:3',
            'price' => 'required|integer',
            'nbBed' => 'required|min:1|max:20',
        ]);

        if (Bedroom::where('number', '=', $request->number)->where('hospital_id', Auth::user()->hospital->id)->exists())
            return redirect()->route('hospital.bedroom.index')->withErrors('Chambre déja existant dans la base de données.');

        //save bedroom
        $bedroom = new Bedroom();
        $bedroom->hospital_id = Auth::user()->hospital->id;
        $bedroom->type = $request->type == 1 ? 'collective' : 'individual';
        $bedroom->price = $request->price;
        $bedroom->number = $request->number;
        $bedroom->description = $request->description ?? null;
        $bedroom->save();

        //save bed
        if ($request->type == 1) {
            for ($i = 0; $i < $request->nbBed; $i++) {

                $bedData = $request->validate([
                    "bedNumber$i" => 'required',
                ]);

                $bed = new Bed();
                $bed->bedroom_id = $bedroom->id;
                $bed->number = $bedData['bedNumber' . $i];
                $bed->price = $request->price;
                $bed->save();
            }
        }else{
            $bedData = $request->validate([
                "bedNumber" => 'required',
            ]);

            $bed = new Bed();
            $bed->bedroom_id = $bedroom->id;
            $bed->number = $bedData['bedNumber'];
            $bed->price = $request->price;
            $bed->save();
        }

        return redirect()->route('hospital.bedroom.index')->with('success', 'Cette comptable a été ajoutée avec succès.');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'number' => 'required',
            'description' => 'nullable|min:3',
            'price' => 'required|integer',
        ]);

        $bedroom = Bedroom::findOrFail($id);
        $bedroom->number = $request->number;
        $bedroom->description = $request->description ?? null;
        $bedroom->price = $request->price;
        $bedroom->save();

        //save bed
        foreach ($bedroom->beds as $key => $value) {

            $bedData = $request->validate([
                "bedNumberU$key" => 'required',
            ]);

            $bed = Bed::findOrFail($value->id);
            $bed->number = $bedData['bedNumberU' . $key];
            $bed->price = $request->price;
            $bed->save();
        }

        return redirect()->route('hospital.bedroom.index')->with('success', "Ces informations ont été mises à jour.");
    }

    public function status($id)
    {

        $bedroom = Bedroom::findOrFail($id);

        $bedroom->status = $bedroom->status == 0 ? 1 : 0;

        $bedroom->save();

        return back()->with('success', "Status modifié avec succès.");
    }

    public function delete($id)
    {

        $bedroom = Bedroom::findOrFail($id);



        //save bed
        foreach ($bedroom->beds as $key => $value) {
            if ($value->occupiedBedActive)
                return back()->withErrors("Des lits de la chambre n°$bedroom->number sont occupés.");
        }

        foreach ($bedroom->beds as $key => $value) {

            $bed = Bed::findOrFail($value->id);
            $bed->delete = 1;
            $bed->save();
        }

        $bedroom->delete = 1;
        $bedroom->save();

        return back()->with('success', "Chambre supprimée avec succès.");
    }

    // bed action
    public function bedStore($idBedRoom, Request $request)
    {

        $bedroom = Bedroom::findOrFail($idBedRoom);

        //save bed
        for ($i = 0; $i < $request->nbBed; $i++) {

            $bedData = $request->validate([
                "bedNumber$i" => 'required',
            ]);

            $bed = new Bed();
            $bed->bedroom_id = $bedroom->id;
            $bed->number = $bedData['bedNumber' . $i];
            $bed->price = $bedroom->price;
            $bed->save();
        }

        return back()->with('success', "Ces informations ont été mises à jour.");
    }

    public function bedDelete($id)
    {

        $bed = Bed::findOrFail($id);

        if ($bed->occupiedBedActive)
            return back()->withErrors("Le lit $bed->number est occupé.");

        $bed->delete = 1;

        $bed->save();

        return back()->with('success', "Lit supprimé avec succès.");
    }

    public function bedStatus($id)
    {

        $bed = Bed::findOrFail($id);

        $bed->status = $bed->status == 0 ? 1 : 0;

        $bed->save();

        return back()->with('success', "Status modifié avec succès.");
    }
}
