<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficios', function (Blueprint $table) {
            $table->Increments('id_beneficio');
            $table->string('nombre_beneficio');
            $table->integer('encargado')->unsigned();
            $table->foreign('encargado')->references('id_usuario')->on('usuarios');
            $table->integer('aux_encargado')->unsigned()->nullable();
            $table->foreign('aux_encargado')->references('id_usuario')->on('usuarios');
            $table->enum('estado_beneficio',['habilitado','deshabilitado']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficios');
    }
}
