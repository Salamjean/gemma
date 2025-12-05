<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistreConsultationPostNatale extends Model
{
    use HasFactory;

    public function registre()
    {
        return $this->belongsTo(Registre::class, 'registre_id', 'id');
    }

    protected $fillable = [
        "registre_id",
        "date_consultation",
        "numero_gestante",
        "pb",
        "oedemes",
        "varics",
        "etat_conjonctives",
        "conscience",
        "seins",
        "abdomen",
        "globe_uterin",
        "examen_perine",
        "vulve",
        "uterus",
        "vessie",
        "lochies",
        "examen_speculum",
        "test_acide_acetique",
        "tv",
        "autre_type_allaitement",
        "patologies_associees",
        "chirurgicaux",
        "obstetricaux",
        "gestite",
        "parite",
        "nb_enfant_vivant",
        "enfant_decede",
        "cesarienne",
        "Avortement",
        "toxemie",
        "date_accouchement",
        "date_vat1",
        "date_vat2",
        "date_vat_rappel",
        "numero_depistage_vih",
        "offre_service_nutritionnel_oui_precision",
        "observation",
        "resultat_consultation_oui_precision",
        "date_prochain_rdv",

        //radio, checkbox
        "mode_entree",
        "eleve",
        "type_population",
        "type_consultation_postnatale",
        "enfant_vivant",
        "enfant_jour_vaccin",
        "femme_allaitante",
        "allaitement_exlusif",
        "conseil_alimentation_mere",
        "conseil_alimentation_enfant",
        "etat_nutritionnel",
        "retour_couche",
        "antecedent_hta",
        "antecedent_diabete",
        "antecedent_lieu_accouch",
        "antecedent_mode_accouch",
        "etat_vaccination",
        "status_vih",
        "conseil_pf_pp1",
        "conseil_pf_ppt",
        "conseil_pf_ppp",
        "methode_adoptee",
        "proposition_test_vih",
        "retesting",
        "resultat_test_depistage_vih",
        "annonce_resultat",
        "prophylaxie",
        "analyse_urine_albumine",
        "analyse_urine_sucre",
        "glycemie",
        "offre_service_pf_conseil_pf_ppp1",
        "offre_service_pf_conseil_pf_ppp",
        "acceptation_methodes_contraceptives",
        "acceptation_methodes_contraceptives_precision",
        "acceptation_methodes_contraceptives_methode",
        "offre_service_nutritionnel",
        "resultat_consultation",
        // "mode_sortie",
    ];

}
