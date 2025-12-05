doctor<?php

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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('code_consultation')->nullable();
            $table->integer('admission_id');
            $table->date('date_consultation');
            $table->string('mode_entree')->nullable();
            $table->text('motif_consultation')->nullable();
            $table->integer('prestation_hospital_id');
            $table->integer('hospital_id');
            $table->integer('montant');
            $table->integer('patient_id');
            $table->string('status')->default('0');
            $table->string('status_inf')->default('0');
            $table->integer('issue_consultation_id')->nullable();
            $table->date('date_prochain_rdv')->nullable();

            $table->text('observation_infirmiere')->nullable();


            $table->string('tension_arterielle')->nullable();
            $table->string('temperature')->nullable();

            $table->string('saturation_oxygene')->nullable();

            $table->string('taille')->nullable();
            $table->string('poids')->nullable();
            $table->string('imc')->nullable();
            $table->string('pouls')->nullable();
            $table->string('gly_a_jeun')->nullable();
            $table->string('gly_nn_jeun')->nullable();
            $table->string('perimetre_brach')->nullable();


            $table->softDeletes();
            $table->timestamps();

            //new champs
            $table->integer('doctor_id')->nullable();
            $table->integer('infirmier_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
