<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\UpdateHospitalRequest;
use App\Models\Hospital;
use App\Models\ServiceHospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCPDF;


class HospitalController extends Controller
{
    public function index()
    {
        $title = 'Détails sur l\'hopital';
        $hospital = Hospital::findOrFail(Auth::user()->hospital->id);

        return view('users.hospital.profile', compact('title', 'hospital'));
    }


    public function update(UpdateHospitalRequest $request)
    {

        $request->validated();

        $hospital = Hospital::findOrFail(Auth::user()->hospital->id);

        //user
        $user = Auth::user();

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        //update hospital
        $hospital->contact = $request->contact;
        
        if ($request->hasFile('image')) {
            $hospital->img_url = $this->uploadImage($request->image, 'hospital');
        }
        $hospital->save();

        return back()->with('success', "Informations modifiées avec succès.");
    }

    public function grille(){
        $service = ServiceHospital::where('hospital_id', Auth::user()->hospital->id)->get();

        return 'ok';
    }
}
