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
        Schema::create('diaries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->enum('type', ['doctor', 'male_nurse', 'secreteriat', 'cashier', 'accountant', 'pharmacy']); //hospital, doctor, infirmier, secretaires,
            $table->date('date');
            $table->time('time')->nullable();
            $table->string('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diaries');
    }
};
