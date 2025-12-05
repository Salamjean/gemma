<?php

namespace App\Http\Controllers\Doctor\Maternite;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuivieMereEnfant;
use Illuminate\Support\Facades\Validator;

class SuivieController extends Controller
{
    public function suivieMereEnfant()
    {
        return view('users.doctor.maternite.suivie-mere-enfant'); 
    }
    public function searchPrenatale($data)
    {
        $prenatale = Patient::where('code_patient', $data)->where('mere_id', null)->where('gender','feminin')->with('user')->first();
        if ($prenatale) {
            $suivieMereEnfant = SuivieMereEnfant::where('patient_id', $prenatale->id)->where('type_suivie','prenatale')->get();

            return response()->json(['patient' => $prenatale, 'suivi' => $suivieMereEnfant], 200);
        }else {
            return response()->json(['error' => 'Echec ! Vérifiez si le code '.$data.' est correct ou appartient à une femme. '], 404);
        }
    }
    public function searchPostnatale($data)
    {
        $postnatale = Patient::where('code_patient', $data)
            ->where('mere_id','!=', null)
            ->with('mere')
            ->with('user')
            ->first();

        if ($postnatale) {
            $suivieMereEnfant = SuivieMereEnfant::where('patient_id', $postnatale->id)->get();

            return response()->json(['patient' => $postnatale, 'suivi' => $suivieMereEnfant], 200);
        }else {
            return response()->json(['error' => 'Echec ! Vérifiez si le code '.$data.' est correct ou appartient à un enfant. '], 404);
        }
        
    }
    public function storePrenatale(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date_visite' => 'required|date',
            'age_gestationnel' => 'required',
            'statut_arv' => 'required',
            'date_initiation_arv' => 'required|date',
            'mere_sous_arv' => 'required|in:Oui,Non',
            'cotrimoxazole' => 'required|in:Oui,Non',
            'prelevement_charge_virale' => 'required|in:Oui,Non',
            'resultat_charge_virale' => 'required_if:prelevement_charge_virale,Oui',
            'date_de_prelevement_virale' => 'required_if:prelevement_charge_virale,Oui',
            'date_de_reception_resultat' => 'required_if:prelevement_charge_virale,Oui',
            'depistage_vih_conjoint' => 'required|in:Oui,Non',
            'resultat_vih_conjoint' => 'required_if:depistage_vih_conjoint,Oui',
            'date_depistage_vih_conjoint' => 'required_if:depistage_vih_conjoint,Oui',
            'porte_entree' => 'required',
            'type_vih' => 'required',
            'date_probable_accouchement' => 'required',
            'issue_de_la_grossesse' => 'required',
            'accouchement_gemellaire' => 'required',
            'methode_de_contraception_moderne' => 'required',
            
        
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $patient = new SuivieMereEnfant();
        $patient->type_suivie = 'prenatale';
        $patient->patient_id = $request->patient_id;
        $patient->date_visite = $request->input('date_visite');
        $patient->age_gestationnel = $request->input('age_gestationnel');
        $patient->statut_arv = $request->input('statut_arv');
        $patient->date_initiation_arv = $request->input('date_initiation_arv');
        $patient->mere_sous_arv = $request->input('mere_sous_arv');
        $patient->cotrimoxazole = $request->input('cotrimoxazole');
        $patient->prelevement_charge_virale = $request->input('prelevement_charge_virale');
        $patient->resultat_charge_virale = $request->input('resultat_charge_virale');
        $patient->date_de_prelevement_virale = $request->input('date_de_prelevement_virale');
        $patient->date_de_reception_resultat = $request->input('date_de_reception_resultat');
        $patient->depistage_vih_conjoint = $request->input('depistage_vih_conjoint');
        $patient->resultat_vih_conjoint = $request->input('resultat_vih_conjoint');
        $patient->date_depistage_vih_conjoint = $request->input('date_depistage_vih_conjoint');
        $patient->porte_entree = $request->input('porte_entree');
        $patient->type_vih = $request->input('type_vih');
        $patient->date_probable_accouchement = $request->input('date_probable_accouchement');
        $patient->issue_de_la_grossesse = $request->input('issue_de_la_grossesse');
        $patient->accouchement_gemellaire = $request->input('accouchement_gemellaire');
        $patient->methode_de_contraception_moderne = $request->input('methode_de_contraception_moderne');

        $patient->save();
    
        return response()->json(['success' => 'Suivie Prénatale enregistré avec succès!'], 200);
    }

    public function storePostnatale(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prophylaxie_arv_enfant' => 'required|in:Oui,Non',
            'date_de_remise' => 'required_if:prophylaxie_arv_enfant,Oui',
            'date_visite_postnatale' => 'required|date',
            'age_au_moment_de_la_visite' => 'required',
            'type_alimentation' => 'required',
            'date_de_prelevement_1er_pcr' => 'required',
            'age_au_moment_de_prelevement_1er_pcr' => 'required',
            'resultat_1er_pcr' => 'required',
            'annonce_resultat_parent_1er_pcr' => 'required|in:Oui,Non',
            'date_annonce_1er_pcr' => 'required_if:annonce_resultat_parent_1e_pcr,Oui',
            'date_de_prelevement_2e_pcr' => 'required',
            'age_au_moment_de_prelevement_2e_pcr' => 'required',
            'resultat_2e_pcr' => 'required',
            'annonce_resultat_parent_2e_pcr' => 'required|in:Oui,Non',
            'date_annonce_2e_pcr' => 'required_if:annonce_resultat_parent_2e_pcr,Oui',
            'date_de_prelevement_3e_pcr' => 'required',
            'age_au_moment_de_prelevement_3e_pcr' => 'required',
            'resultat_3e_pcr' => 'required',
            'annonce_resultat_parent_3e_pcr' => 'required|in:Oui,Non',
            'date_annonce_3e_pcr' => 'required_if:annonce_resultat_parent_3e_pcr,Oui',
            'enfant_sous_ctx' => 'required|in:Oui,Non',
            'date_initiation_ctx' => 'required_if:enfant_sous_ctx,Oui',
            'age_initiation_ctx' => 'required_if:enfant_sous_ctx,Oui',
            'enfant_sous_inh' => 'required|in:Oui,Non',
            'date_initiation_inh' => 'required_if:enfant_sous_inh,Oui',
            'age_initiation_inh' => 'required_if:enfant_sous_inh,Oui',
            'date_de_prelevement_vih' => 'required',
            'age_au_moment_du_test' => 'required',
            'resultat_du_test' => 'required',
            'annonce_du_test' => 'required|in:Oui,Non',
            'date_annonce_du_test' => 'required_if:annonce_du_test,Oui',
            'date_de_prelevement_vih2' => 'required',
            'age_au_moment_du_test2' => 'required',
            'resultat_du_test2' => 'required',
            'annonce_du_test2' => 'required|in:Oui,Non',
            'date_annonce_du_test2' => 'required_if:annonce_du_test2,Oui',
            'resultat_final_du_suivi' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if($request->nom_enfant != '' && $request->prenom_enfant != ''){
            $enfant = Patient::findOrFail($request->enfant_id);
            $enfant->user->update([
                'name' => $request->input('nom_enfant'),
                'prenom' => $request->input('prenom_enfant'),
            ]);
        }
    
        $patient = new SuivieMereEnfant();
        $patient->type_suivie = 'postnatale';
        $patient->patient_id = $request->enfant_id;
        $patient->prophylaxie_arv_enfant = $request->input('prophylaxie_arv_enfant');
        $patient->date_de_remise = $request->input('date_de_remise');
        $patient->date_visite_postnatale = $request->input('date_visite_postnatale');
        $patient->age_au_moment_de_la_visite = $request->input('age_au_moment_de_la_visite');
        $patient->type_alimentation = $request->input('type_alimentation');
        $patient->date_de_prelevement_1er_pcr = $request->input('date_de_prelevement_1er_pcr');
        $patient->age_au_moment_de_prelevement_1er_pcr = $request->input('age_au_moment_de_prelevement_1er_pcr');
        $patient->resultat_1er_pcr = $request->input('resultat_1er_pcr');
        $patient->annonce_resultat_parent_1er_pcr = $request->input('annonce_resultat_parent_1er_pcr');
        $patient->date_annonce_1er_pcr = $request->input('date_annonce_1er_pcr');
        $patient->date_de_prelevement_2e_pcr = $request->input('date_de_prelevement_2e_pcr');
        $patient->age_au_moment_de_prelevement_2e_pcr = $request->input('age_au_moment_de_prelevement_2e_pcr');
        $patient->resultat_2e_pcr = $request->input('resultat_2e_pcr');
        $patient->annonce_resultat_parent_2e_pcr = $request->input('annonce_resultat_parent_2e_pcr');
        $patient->date_annonce_2e_pcr = $request->input('date_annonce_2e_pcr');
        $patient->date_de_prelevement_3e_pcr = $request->input('date_de_prelevement_3e_pcr');
        $patient->age_au_moment_de_prelevement_3e_pcr = $request->input('age_au_moment_de_prelevement_3e_pcr');
        $patient->resultat_3e_pcr = $request->input('resultat_3e_pcr');
        $patient->annonce_resultat_parent_3e_pcr = $request->input('annonce_resultat_parent_3e_pcr');
        $patient->date_annonce_3e_pcr = $request->input('date_annonce_3e_pcr');
        $patient->enfant_sous_ctx = $request->input('enfant_sous_ctx');
        $patient->date_initiation_ctx = $request->input('date_initiation_ctx');
        $patient->age_initiation_ctx = $request->input('age_initiation_ctx');
        $patient->enfant_sous_inh = $request->input('enfant_sous_inh');
        $patient->date_initiation_inh = $request->input('date_initiation_inh');
        $patient->age_initiation_inh = $request->input('age_initiation_inh');
        $patient->date_de_prelevement_vih = $request->input('date_de_prelevement_vih');
        $patient->age_au_moment_du_test = $request->input('age_au_moment_du_test');
        $patient->resultat_du_test = $request->input('resultat_du_test');
        $patient->annonce_du_test = $request->input('date_annonce_du_test');
        $patient->date_annonce_du_test = $request->input('date_annonce_du_test');
        $patient->date_de_prelevement_vih2 = $request->input('date_de_prelevement_vih2');
        $patient->age_au_moment_du_test2 = $request->input('age_au_moment_du_test2');
        $patient->resultat_du_test2 = $request->input('resultat_du_test2');
        $patient->annonce_du_test2 = $request->input('annonce_du_test2');
        $patient->date_annonce_du_test2 = $request->input('date_annonce_du_test2');
        $patient->resultat_final_du_suivi = $request->input('resultat_final_du_suivi');
        $patient->site_de_transfert = $request->input('site_de_transfert');
        $patient->date_du_statut_final = $request->input('date_du_statut_final');

        $patient->save();
    
        return response()->json(['success' => 'Suivie Postnatale enregistré avec succès!'], 200);
    }
}