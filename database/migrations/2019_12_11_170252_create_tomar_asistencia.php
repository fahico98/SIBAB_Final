<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTomarAsistencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tomar_asistencia', function (Blueprint $table) {
            $table->bigIncrements('id_tomar_asistencia');
            $table->date('fecha');
            $table->boolean('asistio');
            $table->integer('datos_aprendices')->unsigned();
            $table->foreign('datos_aprendices')->references('id_datos_aprendiz')->on('datos_aprendices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tomar_asistencia');
    }
}
