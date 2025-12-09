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
        Schema::table('rendez_vouses', function (Blueprint $table) {
            $table->json('details')->nullable()->after('image');
            $table->string('heure')->nullable()->after('date');
            $table->string('motif')->nullable()->after('heure');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rendez_vouses', function (Blueprint $table) {
             $table->dropColumn(['details', 'heure', 'motif']);
        });
    }
};
