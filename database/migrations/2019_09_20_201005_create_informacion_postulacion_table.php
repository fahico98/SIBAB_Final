<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionPostulacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_postulacion', function (Blueprint $table) {
            $table->Increments('id_informacion_postulacion');
            $table->boolean('desplazamiento_forzado')->default('0');
            $table->boolean('nutrientes')->default('0');
            $table->boolean('puntajeSisben')->default('0');
            $table->boolean('regimen_contributivo')->default('0');
            $table->boolean('regimen_subsidiado')->default('0');
            $table->boolean('tres_comidas')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informacion_postulacion');
    }
}
