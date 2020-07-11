<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeleccionCivicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seleccion_civica', function (Blueprint $table) {
            $table->Increments('id_seleccion_civica');
            $table->string('numero_civica');
            $table->string('observaciones');
            $table->integer('puntaje_conflicto');
            $table->integer('puntaje_estrato');
            $table->integer('puntaje_sisben');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seleccion_civica');
    }
}
