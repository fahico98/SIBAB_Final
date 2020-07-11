<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocioeconomicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socioeconomicos', function (Blueprint $table) {
            $table->Increments('id_socioeconomico');
            $table->date('fecha');
            $table->integer('id_datos_formacion')->unsigned();
            $table->foreign('id_datos_formacion')->references('id_datos_formacion')->on('datos_formacion');
            $table->integer('id_vivienda')->unsigned();
            $table->foreign('id_vivienda')->references('id_vivienda')->on('viviendas');
            $table->integer('id_informacion_socioeconomica')->unsigned();
            $table->foreign('id_informacion_socioeconomica')->references('id_informacion_socioeconomica')->on('informacion_socioeconomica');
            $table->integer('id_salud')->unsigned();
            $table->foreign('id_salud')->references('id_salud')->on('salud');
            $table->integer('id_informacion_general')->unsigned();
            $table->foreign('id_informacion_general')->references('id_informacion_general')->on('informacion_general');
            $table->integer('id_datos_aprendiz')->unsigned();
            $table->foreign('id_datos_aprendiz')->references('id_datos_aprendiz')->on('datos_aprendices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socioeconomicos');
    }
}
