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
        Schema::create('drug_sales', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // ordonnance, care_requested, hospitalisation
            $table->integer('ordonnance_id')->nullable();
            $table->integer('care_requested_id')->nullable();
            $table->integer('hospitalisation_drug_requested_id')->nullable();
            $table->integer('hospital_id');
            $table->integer('pharmacy_id')->nullable();
            $table->integer('price')->default(0);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_sales');
    }
};
