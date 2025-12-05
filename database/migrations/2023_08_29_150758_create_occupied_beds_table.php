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
        Schema::create('occupied_beds', function (Blueprint $table) {
            $table->id();
            $table->integer('bed_id');
            $table->integer('hospitalisation_id')->nullable();
            $table->integer('price');
            $table->integer('total_price')->default(0);
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->string('cause')->nullable();
            $table->string('status')->default('active');
            $table->integer('delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occupied_beds');
    }
};
