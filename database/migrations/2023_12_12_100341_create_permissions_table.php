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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->integer('user_id');
            $table->integer('hospital_id');
            $table->enum('type', ['doctor', 'male_nurse', 'secreteriat', 'cashier', 'accountant', 'pharmacy']); //hospital, doctor, infirmier, secretaires,
            $table->date('beging_date');
            $table->date('end_date');
            $table->time('beging_time')->nullable();
            $table->time('end_time')->nullable();
            $table->text('description')->nullable();
            $table->string('_url')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
