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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['admission', 'hospitalisation']);
            $table->integer('prix');
            $table->date('date');
            $table->integer('prix_normal');
            $table->string('no_assurance')->nullable();
            $table->integer('hospital_id');
            $table->integer('caissiere_id')->nullable();

            $table->integer('type_assurance_id')->nullable();
            $table->integer('admission_id')->nullable();
            $table->integer('hospitalisation_id')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
