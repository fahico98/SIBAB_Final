<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaviaOcacionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savia_ocacionales', function (Blueprint $table) {
            $table->Increments('id_savia_ocacionales');
            $table->string('numero_documento');
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->integer('estrato');
            $table->string('telefono');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('lunes')->nullable();
            $table->boolean('martes')->nullable();
            $table->boolean('miercoles')->nullable();
            $table->boolean('jueves')->nullable();
            $table->boolean('viernes')->nullable();
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_savia_ocacionales');
    }
}
