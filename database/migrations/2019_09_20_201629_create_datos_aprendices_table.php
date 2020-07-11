<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosAprendicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_aprendices', function (Blueprint $table) {
            $table->Increments('id_datos_aprendiz');
            $table->string('area');
            $table->string('barrio');
            $table->string('celular');
            $table->string('direccion');
            $table->string('documento_identidad');
            $table->integer('edad');
            $table->string('email');
            $table->string('estado_civil');
            $table->integer('estrato');
            $table->date('fecha_nacimiento');
            $table->integer('lugar_expedicion')->unsigned()->nullable();
            $table->foreign('lugar_expedicion')->references('id_municipios')->on('municipios');
            $table->integer('id_pais_expedicion')->unsigned()->nullable();
            $table->foreign('id_pais_expedicion')->references('id_pais')->on('paises');
            $table->integer('lugar_nacimiento')->unsigned()->nullable();
            $table->foreign('lugar_nacimiento')->references('id_municipios')->on('municipios');
            $table->integer('id_pais_nacimiento')->unsigned()->nullable();
            $table->foreign('id_pais_nacimiento')->references('id_pais')->on('paises');
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->integer('id_tipo_documento')->unsigned();
            $table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipos_de_documentos');
            $table->integer('id_hijo')->unsigned();
            $table->foreign('id_hijo')->references('id_hijo')->on('hijos');
            $table->integer('id_contacto')->unsigned();
            $table->foreign('id_contacto')->references('id_contacto')->on('contactos');
            $table->integer('id_municipios')->unsigned();
            $table->foreign('id_municipios')->references('id_municipios')->on('municipios');
            $table->integer('id_genero')->unsigned();
            $table->foreign('id_genero')->references('id_genero')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_aprendices');
    }
}
