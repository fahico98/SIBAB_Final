<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_de_documentos')->insert([
            'nombre_tipo_documento' => 'Tarjeta de identidad',
        ]);

        DB::table('tipos_de_documentos')->insert([
            'nombre_tipo_documento' => 'Cedula de ciudadania',
        ]);

        DB::table('tipos_de_documentos')->insert([
            'nombre_tipo_documento' => 'Cedula de extranjeria ',
        ]);                
    }
}
