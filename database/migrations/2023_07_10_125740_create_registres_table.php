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
        Schema::create('registres', function (Blueprint $table) {
            $table->id();

            //donnees globale
            $table->string('code');
            $table->string('type_consultation');//consultation prenatale, consultation postnatale, consultation curative, accouchement
            $table->integer('consultation_id');
            $table->string('issue_consultation')->nullable();
            $table->string('issue_consultation_justification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registres');
    }
};
