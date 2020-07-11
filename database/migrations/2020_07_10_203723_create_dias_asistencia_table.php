<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiasAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias_asistencia', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->date("fecha")->nullable();
            $table->string("dia_semana")->nullable();
            $table->integer("asistencia")->default(0);
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->integer('id_encargado')->unsigned();
            $table->foreign('id_encargado')->references('id_usuario')->on('usuarios');
            $table->integer('id_beneficio')->unsigned();
            $table->foreign('id_beneficio')->references('id_beneficio')->on('beneficios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dias_asistencia');
    }
}
