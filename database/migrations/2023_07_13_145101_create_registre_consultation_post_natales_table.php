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
        Schema::create('registre_consultation_post_natales', function (Blueprint $table) {
            $table->id();
            $table->integer('registre_id');

            //checkbox, radio
            $table->text('date_consultation')->nullable();
            $table->text('numero_gestante')->nullable();
            $table->text('pb')->nullable();
            $table->text('oedemes')->nullable();
            $table->text('varics')->nullable();
            $table->text('etat_conjonctives')->nullable();
            $table->text('conscience')->nullable();
            $table->text('seins')->nullable();
            $table->text('abdomen')->nullable();
            $table->text('globe_uterin')->nullable();
            $table->text('examen_perine')->nullable();
            $table->text('vulve')->nullable();
            $table->text('uterus')->nullable();
            $table->text('vessie')->nullable();
            $table->text('lochies')->nullable();
            $table->text('examen_speculum')->nullable();
            $table->text('test_acide_acetique')->nullable();
            $table->text('tv')->nullable();
            $table->text('autre_type_allaitement')->nullable();
            $table->text('antecedent_autre')->nullable();
            $table->text('patologies_associees')->nullable();
            $table->text('chirurgicaux')->nullable();
            $table->text('obstetricaux')->nullable();
            $table->text('gestite')->nullable();
            $table->text('parite')->nullable();
            $table->text('nb_enfant_vivant')->nullable();
            $table->text('enfant_decede')->nullable();
            $table->text('cesarienne')->nullable();
            $table->text('Avortement')->nullable();
            $table->text('toxemie')->nullable();
            $table->text('date_accouchement')->nullable();
            $table->text('date_vat1')->nullable();
            $table->text('date_vat2')->nullable();
            $table->text('date_vat_rappel')->nullable();
            $table->text('numero_depistage_vih')->nullable();
            $table->text('offre_service_nutritionnel_oui_precision')->nullable();
            $table->text('observation')->nullable();
            $table->text('resultat_consultation_oui_precision')->nullable();
            $table->text('date_prochain_rdv')->nullable();

            //checkbox, radio
            $table->text('mode_entree')->nullable();
            $table->text('eleve')->nullable();
            $table->text('type_population')->nullable();
            $table->text('type_consultation_postnatale')->nullable();
            $table->text('enfant_vivant')->nullable();
            $table->text('enfant_jour_vaccin')->nullable();
            $table->text('femme_allaitante')->nullable();
            $table->text('allaitement_exlusif')->nullable();
            $table->text('conseil_alimentation_mere')->nullable();
            $table->text('conseil_alimentation_enfant')->nullable();
            $table->text('etat_nutritionnel')->nullable();
            $table->text('retour_couche')->nullable();
            $table->text('antecedent_hta')->nullable();
            $table->text('antecedent_diabete')->nullable();
            $table->text('antecedent_lieu_accouch')->nullable();
            $table->text('antecedent_mode_accouch')->nullable();
            $table->text('etat_vaccination')->nullable();
            $table->text('status_vih')->nullable();
            $table->text('conseil_pf_pp1')->nullable();
            $table->text('conseil_pf_ppt')->nullable();
            $table->text('conseil_pf_ppp')->nullable();
            $table->text('methode_adoptee')->nullable();
            $table->text('proposition_test_vih')->nullable();
            $table->text('retesting')->nullable();
            $table->text('resultat_test_depistage_vih')->nullable();
            $table->text('annonce_resultat')->nullable();
            $table->text('prophylaxie')->nullable();
            $table->text('analyse_urine_albumine')->nullable();
            $table->text('analyse_urine_sucre')->nullable();
            $table->text('glycemie')->nullable();
            $table->text('offre_service_pf_conseil_pf_ppp1')->nullable();
            $table->text('offre_service_pf_conseil_pf_ppp')->nullable();
            $table->text('acceptation_methodes_contraceptives')->nullable();
            $table->text('acceptation_methodes_contraceptives_precision')->nullable();
            $table->text('acceptation_methodes_contraceptives_methode')->nullable();
            $table->text('offre_service_nutritionnel')->nullable();
            $table->text('resultat_consultation')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registre_consultation_post_natales');
    }
};
