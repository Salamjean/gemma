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
        Schema::create('registre_consultation_curatives', function (Blueprint $table) {
            $table->id();
            $table->integer('registre_id');

            $table->string('mode_entree')->nullable();
            $table->text('motif_consultation')->nullable();
            $table->string('en_cours_de_scolarisation')->nullable();
            //Examen complémentaire
            $table->string('tdr_paludisme')->nullable();
            $table->string('goutte_epaise')->nullable();
            $table->string('milda_enfant_eligible')->nullable();
            $table->string('remise_milda_enfant')->nullable();

            $table->string('cdip_propose')->nullable();
            $table->string('cdip_realise')->nullable();
            $table->string('code_depistage_client')->nullable();
            $table->string('glycemie_a_jeun')->nullable();
            $table->string('glycemie_non_a_jeun')->nullable();

            //Examen physique
            $table->string('zcore')->nullable();
            $table->string('temperature')->nullable();
            $table->string('frequence_respiratoire')->nullable();
            $table->string('ta')->nullable();
            $table->string('pouls')->nullable();
            $table->string('perimetre_brachial')->nullable();
            $table->string('perimetre_cranien')->nullable();
            $table->string('tuberculose')->nullable();
            $table->string('hta')->nullable();
            $table->string('taille')->nullable();
            $table->string('poids')->nullable();
            $table->string('imc')->nullable();
            $table->string('saturation_oxygene')->nullable();
            $table->string('drepanocytaire')->nullable();

            $table->text('traitement_medicamenteux_anterieur')->nullable();
            $table->string('traitement_medicamenteux')->nullable();
            $table->string('antecedent_medical')->nullable();
            $table->text('autre_antecedent_medical')->nullable();

            $table->text('antecedent_chirurgical')->nullable();
            $table->text('autre_antecedent_chirurgical')->nullable();
            $table->string('nom_operation')->nullable();  

            $table->string('gyneco_obstetrico')->nullable();
            $table->string('ddr')->nullable();
            $table->string('en_cours_de_grossesse')->nullable();
            $table->text('description_grossesse')->nullable();

            $table->string('mode_de_vie')->nullable();

            $table->string('tabac')->nullable();
            $table->string('alcool')->nullable();

            $table->string('type_visite')->nullable();

            $table->text('examen_physique')->nullable();
            $table->text('diagnostic_retenu')->nullable();
            $table->text('autre_pathologie_associee')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registre_consultation_curatives');
    }
};
