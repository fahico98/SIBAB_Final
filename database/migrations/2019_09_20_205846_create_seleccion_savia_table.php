<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeleccionSaviaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seleccion_savia', function (Blueprint $table) {
            $table->Increments('id_seleccion_savia');
            $table->integer('puntaje_form_savia');
            $table->integer('puntaje_savia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seleccion_savia');
    }
}
