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
        Schema::create('hospitalisations', function (Blueprint $table) {
            $table->id();

            $table->integer('doctor_id');
            $table->integer('consultation_id');

            $table->string('code');
            $table->string('type');
            $table->date('date');
            $table->date('end_date')->nullable();

            $table->string('motif')->nullable();

            $table->text('diagnostic')->nullable();
            $table->text('regime')->nullable();
            $table->text('analyse_medical')->nullable();
            $table->string('sonde')->nullable();
            $table->string('oxygenotherapie')->nullable();
            $table->string('volume')->nullable();
            $table->text('remark')->nullable();

            $table->string('number_days')->nullable();

            $table->string('status')->default('in_progress');

            $table->string('price')->nullable();

            $table->text('mot_sortie')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitalisations');
    }
};
