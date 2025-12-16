<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->text('fingerprint_left_index')->nullable()->comment('Template empreinte gauche');
            $table->text('fingerprint_right_index')->nullable()->comment('Template empreinte droite');
            $table->string('fingerprint_left_image')->nullable()->comment('Image empreinte gauche (base64)');
            $table->string('fingerprint_right_image')->nullable()->comment('Image empreinte droite (base64)');
            $table->string('fingerprint_device')->nullable()->comment('Modèle du scanner utilisé');
            $table->string('fingerprint_template_format')->default('ISO19794-2')->comment('Format du template');
            $table->datetime('fingerprint_captured_at')->nullable();
            $table->boolean('fingerprint_verified')->default(false);
            $table->string('fingerprint_quality_left')->nullable();
            $table->string('fingerprint_quality_right')->nullable();
        });
    }

    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn([
                'fingerprint_left_index',
                'fingerprint_right_index',
                'fingerprint_left_image',
                'fingerprint_right_image',
                'fingerprint_device',
                'fingerprint_template_format',
                'fingerprint_captured_at',
                'fingerprint_verified',
                'fingerprint_quality_left',
                'fingerprint_quality_right'
            ]);
        });
    }
};