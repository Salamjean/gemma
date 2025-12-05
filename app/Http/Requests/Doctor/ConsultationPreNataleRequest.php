<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationPreNataleRequest extends FormRequest
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
        //dd($this);
        return [
            
            "consultation_id" => "required|exists:consultations,id",
            "date_consultation" => "nullable",
            "num_gest_prec" => "nullable",
            "num_gest_visite" => "nullable",
    
            //Antécédents et constances physiques
            "mode_entree" => "nullable",
            "preciser_centre" => "nullable",
            "preciser_autre" => "nullable",
            "hta" => "nullable",
            "diabete" => "nullable",
            "chirurgicaux" => "nullable",
            "obstetricaux" => "nullable",
            "gestite" => "nullable",
            "parite" => "nullable",
            "enft_vivants" => "nullable",
            "enft_decedes" => "nullable",
            "cesarienne" => "nullable",
            "avortement" => "nullable",
            "toxemie_grav" => "nullable",
            "ddr"=> "nullable",
            "terme_prevu" => "nullable",
            "derniere_cpn" => "nullable",
            "semaine_amenor" => "nullable",
            "type_visite" => "nullable",
            "preciser_cpn" => "nullable",
            "date_vat1" => "nullable",
            "date_vat2" => "nullable",
            "date_vatR" => "nullable",
            "status_vat" => "nullable",
            "status_vih" => "nullable",
            "num_pec" => "nullable",
            "prop_test" => "nullable",
            "retesting" => "nullable",
            "num_depistage" => "nullable",
            "perimetre_brachial" => "nullable",
            "ta" => "nullable",
            "pouls" => "nullable",
    
            //Examen général
            "conjonctives" => "nullable",
            "seins" => "nullable",
            "vergetures" => "nullable",
            "varices" => "nullable",
            "oedemes" => "nullable",
            "autres" => "nullable",
    
            //Examen obstétrical
            "po" => "nullable",
            "hu" => "nullable",
            "age_gest" => "nullable",
            "bdc" => "nullable",
            "presentation" => "nullable",
            "tv" => "nullable",
            "pathologie" => "nullable",
            "Anemie" => "nullable",
            "etat_nutri" => "nullable",
            "conseil_pf" => "nullable",
            "methode" => "nullable",
            "resultat_consultation" => "nullable",
            "mode_sortie" => "nullable",
    
            //Examen biologique
            "groupe_rhesus" => "nullable",
            "taux_hemoglo" => "nullable",
            "electrophèse" => "nullable",
            "albumine" => "nullable",
            "sucre" => "nullable",
            "ecbu" => "nullable",
            "glyc_exa" => "nullable",
            "glyc_recu" => "nullable",
            "resul_ajeun" => "nullable",
            "resul_najeun" => "nullable",
            "glyc_resul_na" => "nullable",
            "syph_exa" => "nullable",
            "syph_recu" => "nullable",
            "resul_syph" => "nullable",
            "st_igG" => "nullable",
            "st_igM" => "nullable",
            "sr_igG" => "nullable",
            "sr_igM" => "nullable",
            "agHBs_exa" => "nullable",
            "agHBs_recu" => "nullable",
            "agHBs_resul" => "nullable",
            "resultat_vih" => "nullable",
            "annonce_vih" => "nullable",
            "conjoint_vih" => "nullable",
            "status_vih_conjoint" => "nullable",
            "Prel_charge" => "nullable",
            "cv_inf1000" => "nullable",
            "autres_exa" => "nullable",
            "exa_echo" => "nullable",
            "prescription" => "nullable",
            "conseil_nutri" => "nullable",
            "service_nutri" => "nullable",
            "prec_sn" => "nullable",
            "autre_medic" => "nullable",
            "date_prochain_rdv" => "nullable",
      
        ];
    }
}