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
        Schema::create('soins_administres', function (Blueprint $table) {
            $table->id();
            $table->integer('hospitalisation_id')->nullable();
            $table->integer('observation_id')->nullable();
            $table->integer('suivie_hospitalisation_id')->nullable();
            $table->string('libelle')->nullable();
            $table->dateTime('date', $precision = 0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soins_administres');
    }
};
