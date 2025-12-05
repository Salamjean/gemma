doctor<?php

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
        Schema::create('caissieres', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->nullable();
            $table->integer('user_id');
            $table->string('gender')->nullable();
            $table->integer('hospital_id');
            $table->string('type_piece')->nullable();
            $table->string('numero_piece')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->integer('status')->default(0);
            $table->string('img_url')->nullable();
                    $table->integer('delete')->default(0);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caisses');
    }
};
