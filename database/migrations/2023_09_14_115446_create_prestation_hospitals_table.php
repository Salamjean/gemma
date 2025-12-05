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
        Schema::create('prestation_hospitals', function (Blueprint $table) {
            $table->id();
            $table->integer('service_hospital_id');
            $table->integer('prestation_service_id');
            $table->text('description')->nullable();
            $table->integer('prix');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestation_hospitals');
    }
};
