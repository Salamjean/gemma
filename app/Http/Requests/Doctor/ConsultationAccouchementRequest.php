<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationAccouchementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {   

        return [
           
            "consultation_id" => "required|exists:consultations,id",
            "date_consultation" => "nullable",
            "numero_gestante" => "nullable",
    
            //identite de la mère
            "origine" => "nullable",
            "mode_entree" => "nullable",
            "preciser_centre" => "nullable",
            "preciser_autre" => "nullable",
            "date_accouchement" => "nullable",
            "num_accouchement" => "nullable",
            "accouch_dom" => "nullable",
            "en_scolarisation" => "nullable",
            "telephone" => "nullable",
            "contact2" => "nullable",
    
            //Arrivée
            "mode_admission" => "nullable",
            "en_travail" => "nullable",
            "contractions" => "nullable",
            "poche_intacte" => "nullable",
            "nbre_heure_ecoule" => "nullable",
            "aspect_amnio" => "nullable",
    
            //Antécédents        
            "hta" => "nullable",
            "diabete" => "nullable",
            "autre_antecedent" => "nullable",
            "gestite" => "nullable",
            "parite" => "nullable",
            "gemellite" => "nullable",
            "premature" => "nullable",
            "enfant_vivant" => "nullable",
            "enfant_decede" => "nullable",
            "cesarienne" => "nullable",
            "avortement" => "nullable",
            "toxemie" => "nullable",
            "status_vih" => "nullable",
            "preciser_num_pec" => "nullable",
            "tarv" => "nullable",
            "age_1e_cpn" => "nullable",
            "nombre_cpn" => "nullable",
            "status_vaccination_vat" => "nullable",
    
            //Enfant
            "sexe_enfant" => "nullable",
            "taille_enfant" => "nullable",
            "poids_enfant" => "nullable",
            "perimetre_cranien" => "nullable",
            "apgar_1mn" => "nullable",
            "apgar_5mn" => "nullable",
            "etat_nouveau_ne" => "nullable",
            "mort_ne" => "nullable",
            "malformation" => "nullable",
            "type_malformation" => "nullable",
            "date_mise_sein" => "nullable",
            "conseil_allaitement" => "nullable",
            "skm" => "nullable",
            "preciser_traitement" => "nullable",
            "sat" => "nullable",
            "prophylaxie" => "nullable",
            "raison_evacuation" => "nullable",
            "lieu_evacuation" => "nullable",
            "date_evacuation" => "nullable",
            "deces_oui" => "nullable",
            "date_deces_maternite" => "nullable",
    
            //Offre de service
            "proposition_test_vih" => "nullable",
            "numero_depistage" => "nullable",
            "resultat_test_vih" => "nullable",
            "annonce_resultat_vih" => "nullable",
            "init_arv" => "nullable",
            "conseil_pf" => "nullable",
            "methode_adoptee" => "nullable",
            
            //Info cliniques et examen obstetrical
            
            "group_rhesus" => "nullable",
            "ddr" => "nullable",
            "terme_prevu" => "nullable",
            "HU" => "nullable",
            "PO" => "nullable",
            "presentation" => "nullable",
            "RCF" => "nullable",
            "Excision" => "nullable",
            "Oedemes" => "nullable",
            "Varices" => "nullable",
            "TA" => "nullable",
            "Pouls" => "nullable",
            "Bassin" => "nullable",
            "temperature" => "nullable",
            "conjonctives" => "nullable",
            "TV" => "nullable",
            "interventions" => "nullable",
            "Actes" => "nullable",
    
            //Réanimation du nouveau-né
            "reaction_bebe" => "nullable",
            "action_si" => "nullable",
            "reanimation" => "nullable",
            "autre_medicament" => "nullable",
            "mode_accouchement" => "nullable",
            "mode_expulsion" => "nullable",
            "mode_delivrance" => "nullable",
            "heure_delivrance" => "nullable",
            "placenta" => "nullable",
            "examen" => "nullable",
            "membrane" => "nullable",
            "cordon" => "nullable",
            "particularite" => "nullable",
            "Nbre_vo" => "nullable",
            "revision_uterine" => "nullable",
            "ta_apres_accouchement" => "nullable",
            "pouls_apres_accouchement" => "nullable",
            "conscience" => "nullable",
            "globule_uterin" => "nullable",
            "saignement_vulvaire" => "nullable",
            "paludisme" => "nullable",
            "complication_obstetricales" => "nullable",
            "type_complication" => "nullable",
            "prise_en_charge_hppi" => "nullable",
            "ordonnane_mere" => "nullable",
            "ordonnance_enfant" => "nullable",
    
            //Sortie de la mère
            "date_sortie" => "nullable",
            "mode_sortie" => "nullable",
            "cause_deces" => "nullable",
            "evacuation_mere" => "nullable",
            "Motif_evacuation_mere" => "nullable",
            "heure_decision" => "nullable",
            "heure_depart" => "nullable",
            "nom_etablissement" => "nullable",
            "Ambulance" => "nullable",
            "preciser_evacuation" => "nullable",
            "vit_A_1ere_dose" => "nullable",
            "vit_A_2e_dose" => "nullable",
            "date_prochain_rdv" => "nullable",
            "responsable_accouchement" => "nullable",
            "fiche_renseignee" => "nullable",
            "fiche_rens_complet" => "nullable",
      
        ];
    }
}
