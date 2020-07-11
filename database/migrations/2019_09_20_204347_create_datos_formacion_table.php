<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosFormacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_formacion', function (Blueprint $table) {
            $table->Increments('id_datos_formacion');
            $table->string('nombre_programa');
            $table->integer('numero_ficha');
            $table->integer('trimestre');
            $table->string('alternativa_etapa_practica')->nullable();
            $table->string('centro_formacion');
            $table->string('escolaridad');
            $table->string('instructor');
            $table->string('ocupacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_formacion');
    }
}
