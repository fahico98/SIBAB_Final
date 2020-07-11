<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paises')->insert([
            'Nombre_pais' => 'Canadá',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'EE.UU',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Perú',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Chile',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Brasil',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Venezuela',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Bolivia',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Uruguay',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Ecuador',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Argentina',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Japón',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Corea',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Australia',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'China',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Francia',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Italia',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Alemania',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Países Bajos',
        ]);
        DB::table('paises')->insert([
            'Nombre_pais' => 'Suecia',
        ]);

    }
}
