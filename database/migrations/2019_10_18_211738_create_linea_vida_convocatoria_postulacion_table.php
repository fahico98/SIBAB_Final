<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineaVidaConvocatoriaPostulacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_vida_convocatoria_postulacion', function (Blueprint $table) {
            $table->Increments('id_line_vida_convocatoria_postulacion');
            $table->integer('cantidad');
            $table->integer('id_postulacion')->unsigned();
            $table->foreign('id_postulacion')->references('id_postulacion')->on('postulaciones');
            $table->integer('id_convocatoria')->unsigned();
            $table->foreign('id_convocatoria')->references('id_convocatoria')->on('convocatorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_vida_convocatoria_postulacion');
    }
}
