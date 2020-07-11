<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos')->insert([
            'nombre_genero' => 'Masculino',
        ]);

        DB::table('generos')->insert([
            'nombre_genero' => 'Femenino',
        ]);

        DB::table('generos')->insert([
            'nombre_genero' => 'Otro',
        ]);
    }
}
