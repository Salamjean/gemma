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
        Schema::create('arret_travail', function (Blueprint $table) {
            $table->id();
            $table->string('code_arret')->nullable();
            $table->string('date_debut')->nullable();
            $table->string('date_fin')->nullable();
            $table->string('motif')->nullable();
            $table->integer('doctor_id');
            $table->integer('patient_id');
            $table->integer('consultation_id');
            $table->integer('examen_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arret_travail');
    }
};
