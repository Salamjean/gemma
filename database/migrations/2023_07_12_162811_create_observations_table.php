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
        Schema::create('observations', function (Blueprint $table) {
            $table->id();
            $table->string('code_observation');
            $table->integer('consultation_id');
            $table->string('date_observation')->nullable();
            $table->string('duree');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->text('observations')->nullable();
            $table->text('diagnostic')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observations');
    }
};
