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
        Schema::create('antecedents', function (Blueprint $table) {
            $table->id(); 
            $table->string('traitement_medicaux_anterieur')->nullable();

            $table->integer('patient_id');

            $table->string('diabetique')->nullable();
            $table->string('HTA')->nullable();
            $table->string('chirurgicaux')->nullable();
            $table->string('obstetricaux')->nullable();
            $table->string('gestite')->nullable();
            $table->string('parite')->nullable();
            $table->string('enfant_vivant')->nullable();
            $table->string('enfant_decede')->nullable();
            $table->string('cesarienne')->nullable();
            $table->string('avortement')->nullable();
            $table->string('toxemie_gravidique')->nullable();
            $table->string('DDR')->nullable();
            $table->string('terme_prevu')->nullable();
            $table->string('date_derniere_cpn')->nullable();
            $table->string('semaine_amenorrhee')->nullable();
            $table->string('type_visite')->nullable();
            $table->string('statut_vih')->nullable();
            $table->string('proposition_test_vih')->nullable();
            $table->string('numero_depistage_vih')->nullable();

            $table->string('poids')->nullable();
            $table->string('taille')->nullable();
            $table->string('perimetre_brachial')->nullable();
            $table->string('perimetre_cranien')->nullable();
            $table->string('temperature')->nullable();
            $table->string('tuberculose')->nullable();
            $table->string('TA')->nullable();
            $table->string('pouls')->nullable();

            $table->string('tabac')->nullable();
            $table->string('alcool')->nullable();

            $table->string('type_de_visite')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedents');
    }
};
