<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Http\Requests\StoreDrugRequest;
use App\Http\Requests\UpdateDrugRequest;
use App\Models\DrugHospital;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\Auth;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugs = DrugHospital::where('pharmacy_id', Auth::user()->pharmacy->id)->where('status', 0)->get();
        return view("users.pharmacist.drug.drug_list",["drugs" => $drugs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drugs = Drug::orderBy('name', 'asc')->get();
        $drugHospital = DrugHospital::where('hospital_id', Auth::user()->pharmacy->hospital_id)->get();
        return view('users.pharmacist.drug.create_drug', ["drugs" => $drugs , "drugHospital" => $drugHospital]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDrugRequest $request)
    {
        $request->validated();

        $exist = DrugHospital::where('hospital_id', Auth::user()->pharmacy->hospital_id)->where('drug_id', $request->drug_id)->exists();

        if ($exist) {

            $data = DrugHospital::where('hospital_id', Auth::user()->pharmacy->hospital_id)->where('drug_id', $request->drug_id)->where('status', 1)->first();

            if($data)
            {
                $data -> status = 0;
                $data->pharmacy_id = Auth::user()->pharmacy->id;
                $data->price = $request->price;
                $data->quantity = $request->quantity;
                $data->save();

                return redirect()->route('pharmacy.drug.index')->with('success', 'Le médicament à été enregistré avec succès.');

            }else
                return redirect()->back()->with('error', 'Medicament déja existant.');
        }

        try{

            $drug = new DrugHospital();
            $drug -> drug_id = $request->drug_id;
            $drug -> hospital_id = Auth::user()->pharmacy->hospital_id;
            $drug -> pharmacy_id = Auth::user()->pharmacy->id;
            $drug -> price = $request->price;
            $drug -> quantity = $request->quantity;
            $drug -> save();

            return redirect()->route('pharmacy.drug.index')->with('success','Le médicament à été enregistré avec succès.');

        }catch(\Throwable $th)
        {
            return redirect()->back()->with('error', 'Une erreur est survenue lors du traitement.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DrugHospital $drug)
    {
        return view("users.pharmacist.drug.edit", ["drug" => $drug]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDrugRequest $request, DrugHospital $drug)
    {
        $request->validated();

        try{

            $drug->price = $request->price;
            $drug->quantity = $request->quantity;
            $drug->save();

            return redirect()->route('pharmacy.drug.index')->with('success','Le médicament à été mis à jour avec succès.');
        }catch(\Throwable $th)
        {
            return redirect()->back()->with('error', 'Une erreur est survenue lors du traitement.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DrugHospital $drug)
    {
        try
        {
            $drug->status = 1;
            $drug->save();
            return redirect()->back()->with('success','Le médicament à été supprimé avec succès.');

        }catch(\Throwable $th)
        {
            return redirect()->back()->with('error', 'Une erreur est survenue lors du traitement.');
        }
    }
}
