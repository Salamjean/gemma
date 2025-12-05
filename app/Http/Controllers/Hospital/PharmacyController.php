<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\PharmacyRequest;
use App\Http\Requests\Hospital\UpdatePharmacyRequest;
use App\Models\Availability;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PharmacyController extends Controller
{

    public function index()
    {
        $pharmacies = Pharmacy::where('hospital_id', Auth::user()->hospital->id)->where('delete', 0)->with('user.availability')->get();;
        $title = "Liste des pharmacies";
        $empty = "Liste vide...";
        return view('users.hospital.pharmacy.index', ["title" => $title, 'pharmacies' => $pharmacies, 'empty' => $empty]);
    }

    public function show($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        $title = "Détails | " .  $pharmacy->user->name;

        return view('users.hospital.pharmacy.show', compact('pharmacy', 'title'));
    }

    public function add()
    {
        $title = "Ajout de phamarcie";

        return view('users.hospital.pharmacy.add', compact('title'));
    }

    public function store(PharmacyRequest $request)
    {
        $request->validated();

        if (!count($request->day) && count($request->day) == 0)
            return back()->withErrors('Veuillez selectionner un jour svp .');

        $existing = Pharmacy::where('matricule', 'PH' . $request->matricule)->where('delete', 0)->where('hospital_id', Auth::user()->hospital->id)->exists();

        if ($existing) {
            return back()->with('success', 'Cette phamarcie existe déjà.');
        }

        //save user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_as = 'pharmacy';
        $user->password = bcrypt($request->password);
        $user->save();

        //save doctor
        $pharmacy = new Pharmacy();

        if ($request->hasFile('image')) {
            $pharmacy->img_url = $this->uploadImage($request->image, 'pharmacy');
        }
        $pharmacy->user_id = $user->id;
        $pharmacy->hospital_id = Auth::user()->hospital->id;
        $pharmacy->matricule = 'PH' . $request->matricule;
        $pharmacy->contact = $request->contact;
        $pharmacy->address = $request->address;
        $pharmacy->save();

        //save availability
        $planning = new Availability();
        $planning->user_id = $user->id;
        $planning->days = json_encode($request->day);
        $planning->save();

        return redirect()->route('hospital.pharmacy.index')->with('success', "Cette phamarcie a été ajouté avec succès.");
    }

    public function update($id, UpdatePharmacyRequest $request)
    {
        $request->validated();

        $pharmacy = Pharmacy::findOrFail($id);

        //user
        $user = User::findOrFail($pharmacy->user_id);
        $user->name = $request->name;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        //update
        $pharmacy->contact = $request->contact;
        $pharmacy->address = $request->address;
        if ($request->hasFile('image')) {
            $pharmacy->img_url = $this->deleteUploadImage($request->image, 'pharmacy');
        }
        $pharmacy->save();

        //update availability
        $planning = Availability::where('user_id', $user->id)->first();
        //save availability
        $planning = new Availability();
        $planning->user_id = $user->id;
        $planning->days = json_encode($request->day);

        $planning->hour_start = json_encode($request->time);

        $planning->save();


        return redirect()->route('hospital.pharmacy.index')->with('success', 'Ces informations ont été mises à jour.');
    }

    public function status($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);

        $pharmacy->status = $pharmacy->status == 0 ? 1 : 0;

        $pharmacy->save();

        return back()->with('success', "Statut a été modifié avec succès.");
    }

    public function delete($id)
    {

        $personal = Pharmacy::findOrFail($id);

        $personal->delete = 1;
        $personal->save();

        return back()->with('success', "Phamarcie supprimée avec succès.");
    }
}
