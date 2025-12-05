<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperController extends Controller
{
    public function index()
    {   
        $user = Auth::user();
        $title = 'Détails ';
        $admin = Admin::where("user_id", $user ->id)->first();

        return view('users.super.profile', compact('title','admin'));
    }

    public function update(Request $request)
    {

        //user
        
        $user = Auth::user();
        $user -> name = $request -> name;
        
        
        if ($request ->password)
        {
            $user -> password = bcrypt($request ->password);
        }
        $user -> save();

        $admin = Admin::where("user_id", $user ->id)->first();

        if($request -> hasFile('image'))
        {
            $admin->img_url = $this->deleteUploadImage($request->image, 'super');
            $admin -> save();
        }

        //return back()->with('success',"Données modfiée avec succès.");
        return redirect()->route('dashboard')->with('success','Ces informations ont été mises à jour.');

    }


}