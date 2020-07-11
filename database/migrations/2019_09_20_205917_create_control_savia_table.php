<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlSaviaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_savia', function (Blueprint $table) {
            $table->Increments('id_control_savia');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('lunes')->nullable();
            $table->boolean('martes')->nullable();
            $table->boolean('miercoles')->nullable();
            $table->boolean('jueves')->nullable();
            $table->boolean('viernes')->nullable();
            $table->integer('id_seleccion_savia')->unsigned();
            $table->foreign('id_seleccion_savia')->references('id_seleccion_savia')->on('seleccion_savia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_savia');
    }
}
