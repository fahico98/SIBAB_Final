<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AsistenciaSemanalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('asistencia_semanal', function (Blueprint $table) {
            $table->bigIncrements('id_asistencia_semanal');
            $table->string('nombre_asistencia');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('asistencia_semanal');
    }
}
