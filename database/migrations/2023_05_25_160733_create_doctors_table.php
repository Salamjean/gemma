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
        Schema::create('doctors', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id');
            $table->integer('hospital_id');
            $table->integer('type_agent_id');
            $table->string('type_name')->nullable(); //generaliste & specialiste
            $table->integer('type_doctor_id')->nullable();
            $table->integer('gyneco')->nullable(); //oui & non
            $table->integer('service_hospital_id');
            $table->string('gender')->nullable();
            $table->integer('chief')->default(0);
            $table->string('matricule')->nullable();
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
        Schema::dropIfExists('medecins');
    }
};
