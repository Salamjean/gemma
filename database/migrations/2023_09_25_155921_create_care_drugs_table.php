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
        Schema::create('care_drugs', function (Blueprint $table) {
            $table->id();
            $table->integer('care_need_id');
            $table->integer('drug_hospital_id');
            $table->integer('price');
            $table->integer('total_price');
            $table->integer('quantity');
            $table->string('dosage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('care_drugs');
    }
};
