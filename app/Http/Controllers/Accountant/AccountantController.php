<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use App\Models\Accountant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountantController extends Controller
{
    public function profile()
    {
        $title = 'Profile | Comptable';
        $accountant = Accountant::where("user_id", Auth::user()->id)->first();


        return view('users.accountant.profile', compact('title', 'accountant'));
    }


    public function update(Request $request)
    {

        $user = User::findOrFail(auth()->user()->id);
        if ($request->password)
            $user->password = bcrypt($request->password);
            
        $user->save();

        $accountant = Accountant::where("user_id", $user->id)->first();

        if ($request->hasFile('image'))
            $accountant->img_url = uploadImage($request->image, 'accountant');

        $accountant->save();

        return redirect()->route('dashboard')->with('success', "Vos données ont été modifiée avec succès.");
    }
}
