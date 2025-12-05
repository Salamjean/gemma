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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->nullable();
            $table->string('nom_direction_generale')->nullable();
            $table->string('no_registre')->nullable();
            $table->string('district_sanitaire')->nullable();
            $table->integer('user_id');
            $table->string('label')->nullable();
            $table->string("contact")->nullable();
            $table->integer("localite")->nullable();
            $table->string("img_url")->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('hospitals');
    }
};
