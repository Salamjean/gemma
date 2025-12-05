<?php

namespace App\Http\Controllers\Secretariat;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\Secretaire;
use App\Models\Departement;
use App\Models\PassagePatient;
use Illuminate\Http\Request;
use App\Models\TypeConsultation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ConsultationController extends Controller
{
   
    public function addAdmission(Request $request)
    {
        $rules = [
            'patient_id' => 'required',
            'type_consultation_id' => 'required',
            'departement_id' => 'required',
            'doctor_id' => 'required',
            'motif_consultation' => 'required',

        ];
        /***Messages de validation hospitalisation ****/
        $messages = [
            'patient_id.required' => 'Selectionner un patient svp!',
            'type_consultation_id.required' => 'Selectionner le motif de la visite svp!',
            'doctor_id.required' => 'Selectionner un medecin svp!',
            'departement_id.required' => 'Selectionner un patient svp!',
            'motif_consultation.required' => 'Décrivez en quelques mots la raison de la visite svp!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errorMessages = $validator->errors()->all();
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }

        $secretaire = Secretaire::where('user_id', auth()->user()->id)->first();

        $admission = Admission::create([
            'code_admission' => codeAdmission(),
            'date_admission' => Carbon::now()->format('Y-m-d H:i:s'),
            'secretaire_id' => $secretaire->id,
            'hospital_id' => $secretaire->hospital_id,
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'caissiere_id' => null,
            'type_consultation_id' => $request->type_consultation_id,
            'type_admission' => $request->type_admission_id,
            'type_assurance_id' => $request->type_assurance_id,
            'no_assurance' => $request->no_assurance,
            'mode_entree' => $request->mode_entree,
            'montant' => $request->montant,
            'montant_normal' => $request->montant,
            'motif_consultation' => $request->motif_consultation,
        ]);

        if(!PassagePatient::where('hospital_id', $secretaire->hospital_id)->where('patient_id', $request->patient_id)->exists())
        {
            $passage = new PassagePatient();
            $passage->libelle = 'Passage compte';
            $passage->hospital_id = $secretaire->hospital_id;
            $passage->patient_id = $request->patient_id;
            $passage->date = date('Y-m-d');
            $passage->save();
        }

        return to_route('secretariat.admission.list')->with('success', 'Admission envoyée avec succès');
    }
}
