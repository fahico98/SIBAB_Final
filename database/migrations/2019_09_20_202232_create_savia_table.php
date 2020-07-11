<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaviaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savia', function (Blueprint $table) {
            $table->Increments('id_savia');
            $table->integer('id_informacion_postulacion')->unsigned();
            $table->foreign('id_informacion_postulacion')->references('id_informacion_postulacion')->on('informacion_postulacion');
            $table->integer('id_informacion_aprendiz')->unsigned();
            $table->foreign('id_informacion_aprendiz')->references('id_informacion_aprendiz')->on('informacion_aprendices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('savia');
    }
}
