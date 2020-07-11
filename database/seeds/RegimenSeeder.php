<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegimenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regimen')->insert([
            'nombre_regimen' => 'Contributivo',
        ]);

        DB::table('regimen')->insert([
            'nombre_regimen' => 'Subsidiado',
        ]);
    }
}
