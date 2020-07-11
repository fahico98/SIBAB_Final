<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViviendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viviendas', function (Blueprint $table) {
            $table->Increments('id_vivienda');
            $table->boolean('agua')->nullable();
            $table->boolean('gas')->nullable();
            $table->boolean('internet')->nullable();
            $table->boolean('luz')->nullable();
            $table->boolean('telefono')->nullable();
            $table->string('tipo_vivienda');
            $table->string('otra')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viviendas');
    }
}
