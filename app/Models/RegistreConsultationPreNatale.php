<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistreConsultationPreNatale extends Model
{
    use HasFactory;

    public function registre()
    {
        return $this->belongsTo(Registre::class, 'registre_id', 'id');
    }

    protected $fillable = [
        "registre_id",
        "date_consultation",
        "num_gest_prec",
        "num_gest_visite",

        //Antécédents et constances physiques
        "mode_entree",
        "preciser_centre",
        "preciser_autre",
        "hta",
        "diabete",
        "chirurgicaux",
        "obstetricaux",
        "gestite",
        "parite",
        "enft_vivants",
        "enft_decedes",
        "cesarienne",
        "avortement",
        "toxemie_grav",
        "ddr",
        "terme_prevu",
        "derniere_cpn",
        "semaine_amenor",
        "type_visite",
        "preciser_cpn",
        "date_vat1",
        "date_vat2",
        "date_vatR",
        "status_vat",
        "status_vih",
        "num_pec",
        "prop_test",
        "retesting",
        "num_depistage",
        "perimetre_brachial",
        "ta",
        "pouls",

        //Examen général
        "conjonctives",
        "seins",
        "vergetures",
        "varices",
        "oedemes",
        "autres",

        //Examen obstétrical
        "po",
        "hu",
        "age_gest",
        "bdc",
        "presentation",
        "tv",
        "pathologie",
        "Anemie",
        "etat_nutri",
        "conseil_pf",
        "methode",
        "resultat_consultation",
        "mode_sortie",

        //Examen biologique
        "groupe_rhesus",
        "taux_hemoglo",
        "electrophese",
        "albumine",
        "sucre",
        "ecbu",
        "glyc_exa",
        "glyc_recu",
        "resul_ajeun",
        "resul_najeun",
        "glyc_resul_na",
        "syph_exa",
        "syph_recu",
        "resul_syph",
        "st_igG",
        "st_igM",
        "sr_igG",
        "sr_igM",
        "agHBs_exa",
        "agHBs_recu",
        "agHBs_resul",
        "resultat_vih",
        "annonce_vih",
        "conjoint_vih",
        "status_vih_conjoint",
        "Prel_charge",
        "cv_inf1000",
        "autres_exa",
        "exa_echo",
        "prescription",
        "conseil_nutri",
        "service_nutri",
        "prec_sn",
        "autre_medic",
        "date_prochain_rdv",    
    ];

}
