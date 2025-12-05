<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationPostNataleRequest extends FormRequest
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

            "tension_arterielle" => "nullable",
            "temperature" => "nullable",
            "saturation_oxygene" => "nullable",
            "taille" => "nullable",
            "poids" => "nullable",
            "pouls" => "nullable",
            "gly_a_jeun" => "nullable",
            "gly_nn_jeun" => "nullable",
            "perimetre_brach" => "nullable",

            //text, texarea
            "consultation_id" => "required|exists:consultations,id",
            "date_consultation" => "nullable",
            "numero_gestante" => "nullable",
            "ta" => "nullable",
            "pb" => "nullable",
            "oedemes" => "nullable",
            "varics" => "nullable",
            "etat_conjonctives" => "nullable",
            "conscience" => "nullable",
            "seins" => "nullable",
            "abdomen" => "nullable",
            "globe_uterin" => "nullable",
            "examen_perine" => "nullable",
            "vulve" => "nullable",
            "uterus" => "nullable",
            "vessie" => "nullable",
            "lochies" => "nullable",
            "examen_speculum" => "nullable",
            "test_acide_acetique" => "nullable",
            "tv" => "nullable",
            "autre_type_allaitement" => "nullable",
            "patologies_associees" => "nullable",
            "chirurgicaux" => "nullable",
            "obstetricaux" => "nullable",
            "gestite" => "nullable",
            "parite" => "nullable",
            "nb_enfant_vivant" => "nullable",
            "enfant_decede" => "nullable",
            "cesarienne" => "nullable",
            "Avortement" => "nullable",
            "toxemie" => "nullable",
            "date_accouchement" => "nullable",
            "date_vat1" => "nullable",
            "date_vat2" => "nullable",
            "date_vat_rappel" => "nullable",
            "numero_depistage_vih" => "nullable",
            "glycemie_jeun" => "nullable",
            "glycemie_no_jeun" => "nullable",
            "offre_service_nutritionnel_oui_precision" => "nullable",
            "observation" => "nullable",
            "resultat_consultation_oui_precision" => "nullable",
            "date_prochain_rdv" => "nullable",

            //radio, checkbox
            "mode_entree" => "nullable",
            "eleve" => "nullable",
            "type_population" => "nullable",
            "type_consultation_postnatale" => "nullable",
            "enfant_vivant" => "nullable",
            "enfant_jour_vaccin" => "nullable",
            "femme_allaitante" => "nullable",
            "allaitement_exlusif" => "nullable",
            "conseil_alimentation_mere" => "nullable",
            "conseil_alimentation_enfant" => "nullable",
            "etat_nutritionnel" => "nullable",
            "retour_couche" => "nullable",
            "antecedent_hta" => "nullable",
            "antecedent_diabete" => "nullable",
            "antecedent_lieu_accouch" => "nullable",
            "antecedent_mode_accouch" => "nullable",
            "etat_vaccination" => "nullable",
            "status_vih" => "nullable",
            "conseil_pf_pp1" => "nullable",
            "conseil_pf_ppt" => "nullable",
            "conseil_pf_ppp" => "nullable",
            "methode_adoptee" => "nullable",
            "proposition_test_vih" => "nullable",
            "retesting" => "nullable",
            "resultat_test_depistage_vih" => "nullable",
            "annonce_resultat" => "nullable",
            "prophylaxie" => "nullable",
            "analyse_urine_albumine" => "nullable",
            "analyse_urine_sucre" => "nullable",
            "glycemie" => "nullable",
            "offre_service_pf_conseil_pf_ppp1" => "nullable",
            "offre_service_pf_conseil_pf_ppp" => "nullable",
            "acceptation_methodes_contraceptives" => "nullable",
            "acceptation_methodes_contraceptives_precision" => "nullable",
            "acceptation_methodes_contraceptives_methode" => "nullable",
            "offre_service_nutritionnel" => "nullable",
            "resultat_consultation" => "nullable",
            "mode_sortie" => "nullable",
        ];
    }
}
