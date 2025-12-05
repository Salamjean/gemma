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
        Schema::create('accountants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('gender')->nullable();
            $table->integer('user_id');
            $table->integer('hospital_id');
            $table->string('type_piece')->nullable();
            $table->string('numero_piece')->nullable();
            $table->string('contact');
            $table->string('address')->nullable();
            $table->integer('status')->default(1);
            $table->string('img_url')->nullable();
            $table->integer('delete')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accountants');
    }
};
