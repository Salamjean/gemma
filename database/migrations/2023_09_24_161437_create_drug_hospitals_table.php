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
        Schema::create('drug_hospitals', function (Blueprint $table) {
            $table->id();
            $table->integer('hospital_id');
            $table->integer('drug_id');
            $table->integer('pharmacy_id');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_hospitals');
    }
};
