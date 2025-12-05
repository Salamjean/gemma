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
        Schema::create('day_hospitalisations', function (Blueprint $table) {
            $table->id();

            $table->date('day');
            $table->date('end_date')->nullable();
            $table->integer('number_days')->default(0);

            $table->integer('hospitalisation_id');
            $table->string('doctor_id');
            $table->string('infirmier_id')->nullable();

            $table->string('bed_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('status')->default('en_cours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('day_hospitalisations');
    }
};
