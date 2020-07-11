<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_general', function (Blueprint $table) {
            $table->Increments('id_informacion_general');
            $table->boolean('km_desplazamiento');
            $table->boolean('beneficio');
            $table->boolean('cabeza_familia');
            $table->boolean('condicionamiento');
            $table->boolean('desplazado');
            $table->boolean('discapacitado');
            $table->boolean('jovenes_en_accion');
            $table->boolean('liderazgo_voluntariado');
            $table->boolean('monitor');
            $table->boolean('patrocinio');
            $table->boolean('proyecto_productivo');
            $table->boolean('red_unidos');
            $table->boolean('uniparental');
            $table->boolean('victima_conflicto');
            $table->boolean('vocero');
            $table->string('certificado_sofia', 300);
            $table->string('copia_documento', 300);
            $table->string('copia_servicio_publico', 300);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informacion_general');
    }
}
