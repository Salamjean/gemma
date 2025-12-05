<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\AccountantRequest;
use App\Http\Requests\Hospital\UpdateAccountantRequest;
use App\Models\Accountant;
use App\Models\Availability;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountantController extends Controller
{

    public function index()
    {
        $accountants = Accountant::where('hospital_id', Auth::user()->hospital->id)->where('delete', 0)->with('user.availability')->get();;
        $title = "Liste des comptables";
        $empty = "Aucune données Enregistrées";
        return view('users.hospital.accountant.index', ["title" => $title, 'accountants' => $accountants, 'empty' => $empty]);
    }

    public function show($id)
    {
        $accountant = Accountant::findOrFail($id);
        $title = "Détails | " .  $accountant->user->name;

        return view('users.hospital.accountant.show', compact('accountant', 'title'));

    }

    public function add()
    {
        $title = "Ajout de comptable";

        return view('users.hospital.accountant.add', compact( 'title'));
    }

    public function store(AccountantRequest $request)
    {
        $request->validated();


        if(!count($request->day) && count($request->day) == 0)
            return back()->withErrors('Veuillez selectionner un jour svp .');

        $existing = Accountant::where('matricule', 'SC-' . $request->matricule)->where('hospital_id', Auth::user()->hospital->id)->exists();

        if ($existing)
            return back()->with('success','Comptable existant dans vos données renseignée.');

        //save user
        $user = new User();
        $user->name = $request -> name;
        $user->email = $request -> email;
        $user->role_as = 'accountant';
        $user->password = bcrypt($request -> password);
        $user->save();

        //save accountant
        $accountant = new Accountant();

        if($request -> hasFile('image'))
            $accountant->img_url = $this->uploadImage($request->image, 'accountant');

        $accountant -> user_id = $user->id;
        $accountant -> hospital_id = Auth::user()->hospital->id;
        $accountant -> matricule = 'COMPT' . $request -> matricule;
        $accountant -> contact = $request -> contact;
        $accountant -> address = $request -> address;
        $accountant -> save();

        //save availability
        $planning = new Availability();
        $planning -> user_id = $user->id;
        $planning -> days = json_encode($request->day);

        $planning->hour_start = json_encode($request->time);


        $planning -> save();

        return redirect()->route('hospital.accountant.index')->with('success', 'Cette comptable a été ajoutée avec succès.');

    }

    public function update($id, UpdateAccountantRequest $request)
    {
        $request->validated();

        $accountant = Accountant::findOrFail($id);

        //user
        $user = User::findOrFail($accountant->user_id);
        $user -> name = $request -> name;
        if ($request ->password)
        {
            $user -> password = bcrypt($request ->password);
        }
        $user -> save();

        //update Accountant
        $accountant->contact = $request -> contact;
        $accountant->address = $request -> address;
        if($request->hasFile('image'))
        {
            $accountant->img_url = $this->deleteUploadImage($request->image, 'accountant');
        }
        $accountant -> save();

        //update availability
        $planning = Availability::where('user_id', $user->id)->first();
        $planning->days = json_encode($request->day);

        $planning->hour_start = json_encode($request->time);


        $planning->save();

        return redirect()->route('hospital.accountant.index')->with('success',"Ces informations ont été mises à jour.");

    }

    public function status($id)
    {
        $accountant = Accountant::findOrFail($id);

        $accountant -> status = $accountant -> status == 0 ? 1 : 0;

        $accountant->save();

        return back()->with('success',"Status modifié avec succès.");

    }

    public function delete($id)
    {

        $personal = Accountant::findOrFail($id);

        $personal->delete = 1;
        $personal->save();

        return back()->with('success', "Comptable supprimé(e) avec succès.");
    }

}
