<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionAprendicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_aprendices', function (Blueprint $table) {
            $table->Increments('id_informacion_aprendiz');
            $table->string('dedicacion_estudio');
            $table->date('fecha_inicio');
            $table->date('fecha_terminacion');
            $table->boolean('jornada');
            $table->string('horario_formacion');
            $table->string('horas_centro_formacion');
            $table->string('tipo_formacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informacion_aprendizes');
    }
}
