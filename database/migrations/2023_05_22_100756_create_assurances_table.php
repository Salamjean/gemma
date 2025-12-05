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
        Schema::create('assurances', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->date('date');
            $table->integer('type_assurance_id');
            $table->enum('type', ['admission', 'hospitalisation']);
            $table->integer('patient_id');
            $table->integer('caissiere_id');
            $table->integer('hospital_id');
            $table->integer('payment_id')->nullable();
            $table->float('percent');
            $table->float('prix');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assurances');
    }
};
