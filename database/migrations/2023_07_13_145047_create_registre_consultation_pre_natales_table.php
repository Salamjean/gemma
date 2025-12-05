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
        Schema::create('registre_consultation_pre_natales', function (Blueprint $table) {
            $table->id();
            $table->integer('registre_id');

            //Antécédents et constances physiques
            $table->text('date_consultation')->nullable();
            $table->text('num_gest_prec')->nullable();
            $table->text('num_gest_visite')->nullable();
            $table->text('mode_entree')->nullable();
            $table->text('preciser_centre')->nullable();
            $table->text('preciser_autre')->nullable();
            $table->text('hta')->nullable();
            $table->text('diabete')->nullable();
            $table->text('chirurgicaux')->nullable();
            $table->text('obstetricaux')->nullable();
            $table->text('gestite')->nullable();
            $table->text('parite')->nullable();
            $table->text('enft_vivants')->nullable();
            $table->text('enft_decedes')->nullable();
            $table->text('cesarienne')->nullable();
            $table->text('avortement')->nullable();
            $table->text('toxemie_grav')->nullable();
            $table->text('ddr')->nullable();
            $table->text('terme_prevu')->nullable();
            $table->text('derniere_cpn')->nullable();
            $table->text('semaine_amenor')->nullable();
            $table->text('type_visite')->nullable();
            $table->text('preciser_cpn')->nullable();
            $table->text('date_vat1')->nullable();
            $table->text('date_vat2')->nullable();
            $table->text('date_vatR')->nullable();
            $table->text('status_vat')->nullable();
            $table->text('status_vih')->nullable();
            $table->text('num_pec')->nullable();
            $table->text('prop_test')->nullable();
            $table->text('retesting')->nullable();
            $table->text('num_depistage')->nullable();
            $table->text('perimetre_brachial')->nullable();
            $table->text('ta')->nullable();
            $table->text('pouls')->nullable();

            //Examen général
            $table->text('conjonctives')->nullable();
            $table->text('seins')->nullable();
            $table->text('vergetures')->nullable();
            $table->text('varices')->nullable();
            $table->text('oedemes')->nullable();
            $table->text('autres')->nullable();

            //Examen obstétrical
            $table->text('po')->nullable();
            $table->text('hu')->nullable();
            $table->text('age_gest')->nullable();
            $table->text('bdc')->nullable();
            $table->text('presentation')->nullable();
            $table->text('tv')->nullable();
            $table->text('pathologie')->nullable();
            $table->text('Anemie')->nullable();
            $table->text('etat_nutri')->nullable();
            $table->text('conseil_pf')->nullable();
            $table->text('methode')->nullable();
            $table->text('resultat_consultation')->nullable();
            $table->text('mode_sortie')->nullable();

            //Examen biologique
            $table->text('groupe_rhesus')->nullable();
            $table->text('taux_hemoglo')->nullable();
            $table->text('electrophèse')->nullable();

            $table->text('albumine')->nullable();
            $table->text('sucre')->nullable();
            $table->text('ecbu')->nullable();
            $table->text('glyc_exa')->nullable();
            $table->text('glyc_recu')->nullable();
            $table->text('resul_ajeun')->nullable();
            $table->text('resul_najeun')->nullable();
            $table->text('glyc_resul_na')->nullable();
            $table->text('syph_exa')->nullable();
            $table->text('syph_recu')->nullable();
            $table->text('resul_syph')->nullable();
            $table->text('st_igG')->nullable();
            $table->text('st_igM')->nullable();
            $table->text('sr_igG')->nullable();
            $table->text('sr_igM')->nullable();
            $table->text('agHBs_exa')->nullable();
            $table->text('agHBs_recu')->nullable();
            $table->text('agHBs_resul')->nullable();
            $table->text('resultat_vih')->nullable();
            $table->text('annonce_vih')->nullable();
            $table->text('conjoint_vih')->nullable();
            $table->text('status_vih_conjoint')->nullable();
            $table->text('Prel_charge')->nullable();
            $table->text('cv_inf1000')->nullable();
            $table->text('autres_exa')->nullable();
            $table->text('exa_echo')->nullable();
            $table->text('prescription')->nullable();
            $table->text('conseil_nutri')->nullable();
            $table->text('service_nutri')->nullable();
            $table->text('prec_sn')->nullable();
            $table->text('autre_medic')->nullable();
            $table->text('date_prochain_rdv')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registre_consultation_pre_natales');
    }
};
