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
        Schema::create('surveillances', function (Blueprint $table) {
            $table->id();
            $table->integer('day_hospitalisation_id');
            $table->time('hour');
            $table->string('ta');
            $table->string('t');
            $table->string('pouls');
            $table->string('diurese');
            $table->string('conscience');
            $table->string('glycemie');
            $table->string('sao2');
            $table->string('poids');
            $table->text('evolution')->nullable();
            $table->text('conduite_tenir')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveillances');
    }
};
