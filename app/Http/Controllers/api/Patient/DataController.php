<?php

namespace App\Http\Controllers\api\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\PatientRequest;
use App\Models\Patient;
use App\Models\RendezVous;
use App\Models\SubPrefecture;
use App\Repositories\Patient\PatientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function instance()
    {
        return new PatientRepository();
    }

    public function show()
    {
        return response(['patient' => Patient::where('id', Auth::user()->patient->id)->with('user', 'habitualResidence', 'currentResidence', 'lieuNaissance')->first()], 200);
    }

    public function cities()
    {
        return response(['cities' => SubPrefecture::all()], 200);
    }

    public function update(PatientRequest $request)
    {
        $request->validated();


        $res = $this->instance()->update($request);

        if ($res['status'] == 'error')
            return response()->json(['status' => $res['status'], 'message' => $res['message']], 400);

        return response()->json(['status' => $res['status'], 'message' => $res['message']], 200);
    }

    public function consultations()
    {
        return response(['consultations' => $this->instance()->consultations()], 200);
    }

    public function declarations()
    {
        return response(['declarations' => $this->instance()->declarations()], 200);
    }

    public function rendezVous()
    {
        return response(['rdv' => $this->instance()->rendezVous()], 200);
    }

    public function deleteRendezVous($id){

        $rdv = RendezVous::find($id);
        if ($rdv)
            $rdv -> delete();
        else
            return response(['message' => 'Rendez vous introuvable'], 403);

        return response(['message' => 'Rendez vous supprimé'], 200);

    }
}
