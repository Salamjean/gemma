<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\SecretariatRequest;
use App\Http\Requests\Hospital\UpdateSecretariatRequest;
use App\Models\Availability;
use App\Models\Secretaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecretariatController extends Controller
{

    public function index()
    {
        $secretariats = Secretaire::where('hospital_id', Auth::user()->hospital->id)->where('delete', 0)->with('user.availability')->get();;
        $title = "Liste des Sécretaires";
        $empty = "Aucune données Enregistrées";
        return view('users.hospital.secretariat.index', ["title" => $title, 'secretariats' => $secretariats, 'empty' => $empty]);
    }

    public function show($id)
    {
        $secretariat = Secretaire::findOrFail($id);
        $title = "Détails | " .  $secretariat->user->name ?? null;

        return view('users.hospital.secretariat.show', compact('secretariat', 'title'));

    }

    public function add()
    {
        $title = "Ajout de Sécretaire";

        return view('users.hospital.secretariat.add', compact( 'title'));
    }

    public function store(SecretariatRequest $request)
    {
        $request->validated();

        if (!count($request->day) && count($request->day) == 0)
            return back()->withErrors('Veuillez selectionner un jour svp .');

        $existing = Secretaire::where('matricule', 'SC' . $request->matricule)->where('hospital_id', Auth::user()->hospital->id)->exists();

        if ($existing)
        {
            return back()->with('success','Secretaire existant dans vos données renseigné.');
        }

        //save user
        $user = new User();
        $user->name = $request -> name;
        $user->email = $request -> email;
        $user->role_as = 'secretariat';
        $user->password = bcrypt($request -> password);
        $user->save();

        //save doctor
        $secretaire = new Secretaire();

        if($request -> hasFile('image'))
        {
            $secretaire->img_url = $this->uploadImage($request->image, 'secretariat');
        }
        $secretaire -> user_id = $user->id;
        $secretaire -> hospital_id = Auth::user()->hospital->id;
        $secretaire -> matricule = 'SC-' . $request -> matricule;
        $secretaire -> contact = $request -> contact;
        $secretaire -> address = $request -> address;
        $secretaire -> save();

        //save availability
        $planning = new Availability();
        $planning->user_id = $user->id;
        $planning->days = json_encode($request->day);

        $time = ["00:00", "00:00", "00:00", "00:00", "00:00", "00:00", "00:00"];

        foreach ($request->day as $key => $day) {

            $time[$day] = $request->time[$key];
        }

        $planning->hour_start = json_encode($time);

        $planning->save();

        return redirect()->route('hospital.secretariat.index')->with('success', 'Cette Sécretaire a été ajoutée avec succès.');

    }

    public function update($id, UpdateSecretariatRequest $request)
    {
        $request->validated();

        $secretaire = Secretaire::findOrFail($id);

        //user
        $user = User::findOrFail($secretaire->user_id);
        $user -> name = $request -> name;
        if ($request ->password)
        {
            $user -> password = bcrypt($request ->password);
        }
        $user -> save();

        //update secretaire
        $secretaire->contact = $request -> contact;
        $secretaire->address = $request -> address;
        if($request->hasFile('image'))
        {
            $secretaire->img_url = $this->deleteUploadImage($request->image, 'secretariat');
        }
        $secretaire -> save();

        //update availability
        $planning = Availability::where('user_id', $user->id)->first();
        $planning->days = json_encode($request->day);

        $planning->hour_start = json_encode($request->time);

        $planning->save();

        return redirect()->route('hospital.secretariat.index')->with('success',"Ces informations ont été mises à jour.");

    }

    public function status($id)
    {
        $secretaire = Secretaire::findOrFail($id);

        $secretaire -> status = $secretaire -> status == 0 ? 1 : 0;

        $secretaire->save();

        return back()->with('success',"Status modifié avec succès.");

    }

    public function delete($id)
    {

        $personal = Secretaire::findOrFail($id);

        $personal->delete = 1;
        $personal->save();

        return back()->with('success', "Secrétaire supprimé(e) avec succès.");
    }

}
