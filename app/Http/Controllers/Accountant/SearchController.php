<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use App\Repositories\Accountant\SearchRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{

    public function instance()
    {
        return new SearchRepository();
    }

    public function index()
    {
        return view('users.accountant.search', ['data' => [], 'assurances' => $this->instance()->assurances(), 'cashiers' => $this->instance()->cashiers()]);
    }

    public function treatment(Request $request)
    {
        //dd($request->all());
        if (empty($request->date_beging) && empty($request->date_end) && empty($request->assurance_id) && empty($request->caissiere_id)) {
            Session::flash('error', "Pas de selection.");
            return redirect()->back();
        }

        Session::flash('date_debut', $request->input('date_beging'));
        Session::flash('date_fin', $request->input('date_end'));
        Session::flash('assurance_id', $request->input('assurance_id'));
        Session::flash('caissiere_id', $request->input('caissiere_id'));

        $assurancesData = $this->instance()->assurances($request);

        return view('users.accountant.search', [
            'data' => $assurancesData,
            'assurances' => $assurancesData,
            'cashiers' => $this->instance()->cashiers()
        ]);
    }
}
