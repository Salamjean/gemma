<?php

namespace App\Http\Controllers\Infirmier;

use App\Http\Controllers\Controller;
use App\Models\Infirmier;
use App\Models\User;
use App\Repositories\Infirmier\DashboardInfirmierRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfirmierController extends Controller
{
    
    public function profile()
    {
        $title = 'Profile | Infirmier(e)';
        $infirmier = Infirmier::where("user_id", Auth::user()->id)->first();

        return view('users.infirmier.profile', compact('title', 'infirmier'));
    }

    public function update(Request $request)
    {

        $user = User::findOrFail(auth()->user()->id);

        if ($request->password)
            $user->password = bcrypt($request->password);

        $user->save();

        $infirmier = Infirmier::where("user_id", $user->id)->first();
        $infirmier->contact = $request->contact;

        if ($request->hasFile('image'))
            $infirmier->img_url = uploadImage($request->image, 'infirmier');

        $infirmier->save();

        return redirect()->route('dashboard')->with('success', "Vos données ont été modifiée avec succès.");
    }
    public function getDoctors($infirmierId){
        $infirmier = Infirmier::findOrFail($infirmierId);
        $departementInfirmier = $infirmier->departement;
        $docteursDuDepartement = $departementInfirmier->doctors;

        return response()->json($docteursDuDepartement);
    }
}
