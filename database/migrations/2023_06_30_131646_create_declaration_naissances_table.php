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
        Schema::create('declaration_naissances', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('numero_declaration');
            $table->integer('declaration_id');
            $table->integer('enfant_id');
            $table->date('date');
            $table->string('heure');
            $table->integer('nombre');
            $table->string('nee');
            $table->string('lieu');
            $table->string('genre');
            $table->string('observations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declaration_naissances');
    }
};
