<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AsistenciacivicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistenciacivica', function (Blueprint $table) {
            $table->Increments('id_asistenciacivica');
            $table->date('fecha')->nullable();
            $table->enum('firma',['SI','NO'])->nullable();
            $table->integer('id_postulacion')->unsigned();
            $table->foreign('id_postulacion')->references('id_postulacion')->on('postulaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistenciacivica');

    }
}
