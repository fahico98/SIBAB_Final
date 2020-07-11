<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEPSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_eps')->insert([
            'nombre_tipo' => 'Beneficiario',
        ]);

        DB::table('tipo_eps')->insert([
            'nombre_tipo' => 'Contributivo',
        ]);        
    }
}
