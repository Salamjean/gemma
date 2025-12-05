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
        Schema::create('therapeutique_protocols', function (Blueprint $table) {
            $table->id();
            $table->enum('protocol_type',['internal', 'external']);
            $table->integer('day_hospitalisation_id');
            $table->integer('drug_hospital_id');
            $table->integer('hospitalisation_drug_requested_id')->nullable();
            $table->integer('quantity');
            $table->string('dosage')->nullable();
            $table->string('voie_admission')->nullable();
            $table->string('duration')->nullable();
            $table->text('health_dietetic_advice')->nullable();
            $table->integer('price')->nullable();
            $table->integer('total')->nullable();
            $table->string('status')->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('therapeutique_protocols');
    }
};
