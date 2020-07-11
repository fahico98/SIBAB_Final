<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->Increments('id_convocatoria');
            $table->date('fecha_creacion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('cupos');
            $table->enum('estado_convocatoria',['habilitado','deshabilitado'])->default('habilitado');
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
        Schema::dropIfExists('convocatorias');
    }
}
