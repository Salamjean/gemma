<?php

namespace App\Http\Controllers\Secretariat;

use App\Models\Secretaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $title = 'Profile | Secretaire';
        $secretaire = Secretaire::where("user_id", Auth::user()->id)->first();

        
        return view('users.secretariat.profile', compact('title','secretaire'));
    }


    public function update(Request $request)
        {

            $user = User::findOrFail(auth()->user()->id);
            $user->name = $request->name;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();


            $secretaire = Secretaire::where("user_id", $user->id)->first();
            
            //update secretaire
            $secretaire->contact = $request->contact;
    
            if ($request->hasFile('image'))
                $secretaire->img_url = uploadImage($request->image, 'secretariat');
                $secretaire->save();

            return redirect()->route('dashboard')->with('success',"Informations modifiées avec succès.");

        }
}