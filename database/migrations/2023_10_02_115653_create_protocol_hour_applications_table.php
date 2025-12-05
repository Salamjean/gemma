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
        Schema::create('protocol_hour_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('therapeutique_protocol_id');
            $table->time('hour');
            $table->time('hour_applique')->nullable();
            $table->string('status')->default('pending');
            $table->string('status_doc')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protocol_hour_applications');
    }
};
