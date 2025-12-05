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
        Schema::create('suivie_mere_enfants', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id')->nullable();
            $table->string('no_identification')->nullable();
            $table->string('date_probable_accouchement')->nullable();
            $table->string('porte_entree')->nullable();
            $table->date('date_visite')->nullable();
            $table->string('age_gestationnel')->nullable();
            $table->string('statut_arv')->nullable();
            $table->date('date_initiation_arv')->nullable();
            $table->string('mere_sous_arv')->nullable();
            $table->string('cotrimoxazole')->nullable();
            $table->string('prelevement_charge_virale')->nullable();
            $table->string('resultat_charge_virale')->nullable();
            $table->string('date_de_prelevement_virale')->nullable();
            $table->string('date_de_reception_resultat')->nullable();
            $table->string('valeur')->nullable();
            $table->string('depistage_vih_conjoint')->nullable();
            $table->string('resultat_vih_conjoint')->nullable();
            $table->string('date_depistage_vih_conjoint')->nullable();
            $table->string('issue_de_la_grossesse')->nullable();
            $table->string('accouchement_gemellaire')->nullable();
            $table->string('methode_de_contraception_moderne')->nullable();
            $table->string('type_vih')->nullable();
            $table->string('type_suivie')->nullable();
            $table->date('date_accouchement')->nullable();
            $table->string('prophylaxie_arv_enfant')->nullable();
            $table->date('date_de_remise')->nullable();
            $table->date('date_visite_postnatale')->nullable();
            $table->string('age_au_moment_de_la_visite')->nullable();
            $table->string('type_alimentation')->nullable();
            $table->date('date_de_prelevement_1er_pcr')->nullable();
            $table->string('age_au_moment_de_prelevement_1er_pcr')->nullable();
            $table->string('resultat_1er_pcr')->nullable();
            $table->string('annonce_resultat_parent_1er_pcr')->nullable();
            $table->date('date_annonce_1er_pcr')->nullable();
            $table->date('date_de_prelevement_2e_pcr')->nullable();
            $table->string('age_au_moment_de_prelevement_2e_pcr')->nullable();
            $table->string('annonce_resultat_parent_2e_pcr')->nullable();
            $table->string('resultat_2e_pcr')->nullable();
            $table->date('date_annonce_2e_pcr')->nullable();
            $table->date('date_de_prelevement_3e_pcr')->nullable();
            $table->string('age_au_moment_de_prelevement_3e_pcr')->nullable();
            $table->string('annonce_resultat_parent_3e_pcr')->nullable();
            $table->string('resultat_3e_pcr')->nullable();
            $table->date('date_annonce_3e_pcr')->nullable();
            $table->string('initiation_ctx')->nullable();
            $table->string('date_initiation_ctx')->nullable();
            $table->string('age_initiation_ctx')->nullable();
            $table->string('enfant_sous_ctx')->nullable();
            $table->string('initiation_inh')->nullable();
            $table->string('date_initiation_inh')->nullable();
            $table->string('age_initiation_inh')->nullable();
            $table->string('enfant_sous_inh')->nullable();

            $table->date('date_de_prelevement_vih')->nullable();
            $table->string('age_au_moment_du_test')->nullable();
            $table->string('resultat_du_test')->nullable();
            $table->date('date_annonce_du_test')->nullable();
            $table->date('date_de_prelevement_vih2')->nullable();
            $table->string('age_au_moment_du_test2')->nullable();
            $table->string('resultat_du_test2')->nullable();
            $table->date('date_annonce_du_test2')->nullable();
            $table->string('annonce_du_test')->nullable();
            $table->string('annonce_du_test2')->nullable();
            $table->string('resultat_final_du_suivi')->nullable();
            $table->string('site_de_transfert')->nullable();
            $table->date('date_du_statut_final')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suivie_mere_enfants');
    }
};
