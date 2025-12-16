<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('consultations', function (Blueprint $table) {
            // Rendre le champ issue_consultation_id nullable
            $table->unsignedBigInteger('issue_consultation_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consultations', function (Blueprint $table) {
            // Revenir à NOT NULL si nécessaire
            $table->unsignedBigInteger('issue_consultation_id')->nullable(false)->change();
        });
    }
};
