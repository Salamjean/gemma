<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registre_accouchements', function (Blueprint $table) {
            $table->id();
            $table->integer('registre_id');

            //Identité de la mère
            $table->text('date_consultation')->nullable();
            $table->text('numero_gestante')->nullable();
            $table->text('origine')->nullable();
            $table->text('mode_entree')->nullable();
            $table->text('preciser_centre')->nullable();
            $table->text('preciser_autre')->nullable();
            $table->text('date_accouchement')->nullable();
            $table->text('num_accouchement')->nullable();
            $table->text('accouch_dom')->nullable();
            $table->text('en_scolarisation')->nullable();
            $table->text('telephone')->nullable();
            $table->text('contact2')->nullable();

            //Arrivéé
            $table->text('mode_admission')->nullable();
            $table->text('en_travail')->nullable();
            $table->text('contractions')->nullable();
            $table->text('poche_intacte')->nullable();
            $table->text('nbre_heure_ecoule')->nullable();
            $table->text('aspect_amnio')->nullable();

            //Antécédents
            $table->text('hta')->nullable();
            $table->text('diabete')->nullable();
            $table->text('autre_antecedent')->nullable();
            $table->text('gestite')->nullable();
            $table->text('parite')->nullable();
            $table->text('gemellite')->nullable();
            $table->text('premature')->nullable();
            $table->text('enfant_vivant')->nullable();
            $table->text('enfant_decede')->nullable();
            $table->text('cesarienne')->nullable();
            $table->text('avortement')->nullable();
            $table->text('toxemie')->nullable();
            $table->text('status_vih')->nullable();
            $table->text('preciser_num_pec')->nullable();
            $table->text('tarv')->nullable();
            $table->text('age_1e_cpn')->nullable();
            $table->text('nombre_cpn')->nullable();
            $table->text('status_vaccination_vat')->nullable();

            //Enfant
            $table->text('sexe_enfant')->nullable();
            $table->text('taille_enfant')->nullable();
            $table->text('poids_enfant')->nullable();
            $table->text('perimetre_cranien')->nullable();
            $table->text('apgar_1mn')->nullable();
            $table->text('apgar_5mn')->nullable();
            $table->text('etat_nouveau_ne')->nullable();
            $table->text('mort_ne')->nullable();
            $table->text('malformation')->nullable();
            $table->text('type_malformation')->nullable();
            $table->text('date_mise_sein')->nullable();
            $table->text('conseil_allaitement')->nullable();
            $table->text('skm')->nullable();
            $table->text('preciser_traitement')->nullable();
            $table->text('sat')->nullable();
            $table->text('prophylaxie')->nullable();
            $table->text('raison_evacuation')->nullable();
            $table->text('lieu_evacuation')->nullable();
            $table->text('date_evacuation')->nullable();
            $table->text('deces_oui')->nullable();
            $table->text('date_deces_maternite')->nullable();

            //Offre de service
            $table->text('proposition_test_vih')->nullable();
            $table->text('numero_depistage')->nullable();
            $table->text('resultat_test_vih')->nullable();
            $table->text('annonce_resultat_vih')->nullable();
            $table->text('init_arv')->nullable();
            $table->text('conseil_pf')->nullable();
            $table->text('methode_adoptee')->nullable();

            //Info cliniques et examen obstetrical
            $table->text('group_rhesus')->nullable();
            $table->text('ddr')->nullable();
            $table->text('terme_prevu')->nullable();
            $table->text('HU')->nullable();
            $table->text('PO')->nullable();
            $table->text('presentation')->nullable();
            $table->text('RCF')->nullable();
            $table->text('Excision')->nullable();
            $table->text('Oedemes')->nullable();
            $table->text('Varices')->nullable();
            $table->text('TA')->nullable();
            $table->text('Pouls')->nullable();
            $table->text('Bassin')->nullable();
            $table->text('temperature')->nullable();
            $table->text('conjonctives')->nullable();
            $table->text('TV')->nullable();
            $table->text('interventions')->nullable();
            $table->text('Actes')->nullable();

            //Réanimation du nouveau-né
            $table->text('reaction_bebe')->nullable();
            $table->text('action_si')->nullable();
            $table->text('reanimation')->nullable();
            $table->text('autre_medicament')->nullable();
            $table->text('mode_accouchement')->nullable();
            $table->text('mode_expulsion')->nullable();
            $table->text('mode_delivrance')->nullable();
            $table->text('heure_delivrance')->nullable();
            $table->text('placenta')->nullable();
            $table->text('examen')->nullable();
            $table->text('membrane')->nullable();
            $table->text('cordon')->nullable();
            $table->text('particularite')->nullable();
            $table->text('Nbre_vo')->nullable();
            $table->text('revision_uterine')->nullable();
            $table->text('ta_apres_accouchement')->nullable();
            $table->text('pouls_apres_accouchement')->nullable();
            $table->text('conscience')->nullable();
            $table->text('globule_uterin')->nullable();
            $table->text('saignement_vulvaire')->nullable();
            $table->text('paludisme')->nullable();
            $table->text('complication_obstetricales')->nullable();
            $table->text('type_complication')->nullable();
            $table->text('prise_en_charge_hppi')->nullable();
            $table->text('ordonnane_mere')->nullable();
            $table->text('ordonnance_enfant')->nullable();

            //Sortie de la mère
            $table->text('date_sortie')->nullable();
            $table->text('mode_sortie')->nullable();
            $table->text('cause_deces')->nullable();
            $table->text('evacuation_mere')->nullable();
            $table->text('Motif_evacuation_mere')->nullable();
            $table->text('heure_decision')->nullable();
            $table->text('heure_depart')->nullable();
            $table->text('nom_etablissement')->nullable();
            $table->text('Ambulance')->nullable();
            $table->text('preciser_evacuation')->nullable();
            $table->text('vit_A_1ere_dose')->nullable();
            $table->text('vit_A_2e_dose')->nullable();
            $table->text('date_prochain_rdv')->nullable();
            $table->text('responsable_accouchement')->nullable();
            $table->text('fiche_renseignee')->nullable();
            $table->text('fiche_rens_complet')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registre_accouchements');
    }
};
