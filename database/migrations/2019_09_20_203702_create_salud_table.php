<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaludTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salud', function (Blueprint $table) {
            $table->Increments('id_salud');
            $table->string('eps')->nullable();
            $table->boolean('medico_particular');
            $table->string('otros')->nullable();
            $table->double('puntaje_sisben');
            $table->boolean('tiene_eps');
            $table->integer('id_tipo_eps')->unsigned()->nullable();
            $table->foreign('id_tipo_eps')->references('id_tipo_eps')->on('tipo_eps');
            $table->integer('id_regimen')->unsigned()->nullable();
            $table->foreign('id_regimen')->references('id_regimen')->on('regimen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salud');
    }
}
