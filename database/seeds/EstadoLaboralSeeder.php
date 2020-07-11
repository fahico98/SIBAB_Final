<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoLaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('informacion_socioeconomica')->insert([
    		'estado_laboral' => 'Empleado vinculado',
    	]);
    	DB::table('informacion_socioeconomica')->insert([
    		'estado_laboral' => 'Trabajador independiente',
    	]);
    	DB::table('informacion_socioeconomica')->insert([
    		'estado_laboral' => 'Pensionado',
    	]);

    	DB::table('informacion_socioeconomica')->insert([
    		'estado_laboral' => 'Desempleado',
    	]);
    	
    	}
}

