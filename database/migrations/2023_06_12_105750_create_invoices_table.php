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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('reference');
            $table->integer('patient_id');
            $table->integer('consultation_id')->nullable();
            $table->integer('examen_id')->nullable();
            $table->integer('addmission_id');
            $table->integer('hospital_id');
            $table->string('nature');
            $table->date('date');
            $table->string('tarif');
            $table->string('mode_reglement');
            $table->string('justificatif')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
