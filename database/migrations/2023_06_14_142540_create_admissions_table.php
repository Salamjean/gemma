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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('code_admission')->nullable();
            $table->string('type_admission')->nullable();
            $table->string('date_admission')->nullable();
            $table->string('mode_entree')->nullable();
            $table->integer('hospital_id')->nullable();
            $table->integer('secretaire_id')->nullable();
            $table->integer('prestation_hopital_id')->nullable();
            $table->integer('type_examen_id')->nullable();
            $table->integer('patient_id')->nullable();
            $table->integer('montant')->nullable();
            $table->integer('montant_normal')->nullable();
            $table->integer('doctor_id')->nullable();
            $table->integer('infirmier_id')->nullable();
            $table->integer('caissiere_id')->nullable();
            $table->integer('type_assurance_id')->nullable();
            $table->string('no_assurance')->nullable();
            $table->text('motif_consultation')->nullable();
            $table->integer('statut_paiement')->default(0);
            $table->date('date_paiement')->nullable();
            $table->integer('statut_validation')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
