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
        Schema::create('patients', function (Blueprint $table) {

            $table->id();
            $table->string('code_patient');
            $table->integer('mere_id')->nullable();
            $table->integer('user_id');
            $table->integer('secretaire_id')->nullable();
            $table->integer('doctor_id')->nullable();
            $table->integer('registre_naissance_id')->nullable();
            $table->integer('hospital_id');
            $table->string('gender')->nullable();
            $table->integer('type_assurance_id')->nullable();
            $table->string('assurer')->nullable();
            $table->string('no_assurance')->nullable();
            $table->string('ethnie')->nullable();
            $table->integer('lieu_de_naissance_id')->nullable();
            $table->string('profession')->nullable();
            $table->string('birth_date')->nullable();
            $table->integer('residence_habituelle_id')->nullable();
            $table->integer('residence_actuelle_id')->nullable();
            $table->string('contact2')->nullable();
            $table->string('type_piece')->nullable();
            $table->string('numero_identite')->nullable();
            $table->string('img_url')->nullable();
            $table->string('taille')->nullable();
            $table->string('poids')->nullable();
            $table->string('temperature')->nullable();
            $table->string('group_sanguin')->nullable();
            $table->string('antecedent_churgical')->nullable();
            $table->string('type_antecedent_medical')->nullable();
            $table->string('allergie_medicamenteuse')->nullable();
            $table->string('type_allergie_medicamenteuse')->nullable();
            $table->string('alcool')->nullable();
            $table->string('tabac')->nullable();
            $table->string('situation_matrimoniale')->nullable();
            $table->string('telephone')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('nbre_enfant')->nulllable();
            $table->string('nom_personne_cas_urgence')->nullable();
            $table->string('telephone_personne_cas_urgence')->nullable();
            $table->string('lien_personne_cas_urgence')->nullable();
            $table->string('nom_personne2_cas_urgence')->nullable();
            $table->string('telephone_personne2_cas_urgence')->nullable();
            $table->string('lien_personne2_cas_urgence')->nullable();
            $table->boolean('status')->nullable()->default(1);
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
