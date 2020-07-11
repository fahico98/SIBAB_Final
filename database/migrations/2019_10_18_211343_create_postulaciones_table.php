<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulaciones', function (Blueprint $table) {
            $table->Increments('id_postulacion');
            $table->string('estado_postulacion');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->integer('id_socioeconomico')->unsigned()->nullable();
            $table->foreign('id_socioeconomico')->references('id_socioeconomico')->on('socioeconomicos');
            $table->integer('id_savia')->unsigned()->nullable();
            $table->foreign('id_savia')->references('id_savia')->on('savia');
            $table->integer('id_convocatoria')->unsigned();
            $table->foreign('id_convocatoria')->references('id_convocatoria')->on('convocatorias');
            $table->float('puntaje')->nullable();
            $table->date('fecha_inicio_beneficio')->nullable();
            $table->date('fecha_fin_beneficio')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulaciones');
    }
}
