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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('ordonnance_id');
            $table->integer('drug_id');
            $table->integer('quantity')->default(1);
            $table->string('route_administration')->nullable();
            $table->string('duration')->nullable();
            $table->text('health_dietetic_advice')->nullable();
            $table->string('dosage')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
