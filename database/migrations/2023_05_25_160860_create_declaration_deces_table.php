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
        Schema::create('declaration_deces', function (Blueprint $table) {
            $table->id();
            $table->integer('declaration_id');
            $table->string('person');
            $table->string('reference');
            $table->string('numero_declaration');
            $table->string('deces_maternel'); // 1 = oui, 2 = non
            $table->string('milieu_residence')->nullable();
            $table->date('date')->nullable();
            $table->time('heure')->nullable();
            $table->string('age')->nullable();
            $table->integer('nombre');
            $table->string('genre');
            $table->string('lieu')->nullable();
            $table->text('cause_initiale')->nullable();
            $table->text('cause_directe')->nullable();
            $table->text('observations')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declaration_deces');
    }
};
