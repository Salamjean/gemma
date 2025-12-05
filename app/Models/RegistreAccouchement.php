<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistreAccouchement extends Model
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

        //Identité de la mère

        "origine",
        "mode_entree",
        "preciser_centre",
        "preciser_autre",
        "date_accouchement",
        "num_accouchement",
        "accouch_dom",
        "en_scolarisation",
        "telephone",
        "contact2",

        //Arrivée

        "mode_admission",
        "en_travail",
        "contractions",
        "poche_intacte",
        "nbre_heure_ecoule",
        "aspect_amnio",

        //Antécédents
        "hta",
        "diabete",
        "autre_antecedent",
        "gestite",
        "parite",
        "gemellite",
        "premature",
        "enfant_vivant",
        "enfant_decede",
        "cesarienne",
        "avortement",
        "toxemie",
        "status_vih",
        "preciser_num_pec",
        "tarv",
        "age_1e_cpn",
        "nombre_cpn",
        "status_vaccination_vat",

        //Enfant
        "sexe_enfant",
        "taille_enfant",
        "poids_enfant",
        "perimetre_cranien",
        "apgar_1mn",
        "apgar_5mn",
        "etat_nouveau_ne",
        "mort_ne",
        "malformation",
        "type_malformation",
        "date_mise_sein",
        "conseil_allaitement",
        "skm",
        "preciser_traitement",
        "sat",
        "prophylaxie",
        "raison_evacuation",
        "lieu_evacuation",
        "date_evacuation",
        "deces_oui",
        "date_deces_maternite",

        //Offre de service
        "proposition_test_vih",
        "numero_depistage",
        "resultat_test_vih",
        "annonce_resultat_vih",
        "init_arv",
        "conseil_pf",
        "methode_adoptee",

        //Info cliniques et examen obstetrical
        "group_rhesus",
        "ddr",
        "terme_prevu",
        "HU",
        "PO",
        "presentation",
        "RCF",
        "Excision",
        "Oedemes",
        "Varices",
        "TA",
        "Pouls",
        "Bassin",
        "temperature",
        "conjonctives",
        "TV",
        "interventions",
        "Actes",

        //Réanimation du nouveau-né
        "reaction_bebe",
        "action_si",
        "reanimation",
        "autre_medicament",
        "mode_accouchement",
        "mode_expulsion",
        "mode_delivrance",
        "heure_delivrance",
        "placenta",
        "examen",
        "membrane",
        "cordon",
        "particularite",
        "Nbre_vo",
        "revision_uterine",
        "ta_apres_accouchement",
        "pouls_apres_accouchement",
        "conscience",
        "globule_uterin",
        "saignement_vulvaire",
        "paludisme",    
        "complication_obstetricales",    
        "type_complication",    
        "prise_en_charge_hppi",    
        "ordonnane_mere",    
        "ordonnance_enfant",    

        //Sortie de la mère
        "date_sortie",    
        "mode_sortie",    
        "cause_deces",    
        "evacuation_mere",    
        "Motif_evacuation_mere",    
        "heure_decision",    
        "heure_depart",    
        "nom_etablissement",    
        "Ambulance",    
        "preciser_evacuation",    
        "vit_A_1ere_dose",    
        "vit_A_2e_dose",    
        "date_prochain_rdv",    
        "responsable_accouchement",    
        "fiche_renseignee",    
        "fiche_rens_complet",    
  
    ];
}
