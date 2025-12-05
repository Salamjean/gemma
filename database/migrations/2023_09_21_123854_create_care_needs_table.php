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
        Schema::create('care_needs', function (Blueprint $table) {
            $table->id();

            $table->integer('care_requested_id');

            $table->integer('injection_id')->nullable();
            $table->integer('bandage_id')->nullable();
            $table->integer('care_id')->nullable();

            $table->integer('total_drug')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('care_needs');
    }
};
