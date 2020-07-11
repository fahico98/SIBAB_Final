<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nombre_rol' => 'Administrador',
        ]);

        DB::table('roles')->insert([
            'nombre_rol' => 'Funcionario',
        ]);

        DB::table('roles')->insert([
            'nombre_rol' => 'Auxiliar',
        ]);

        DB::table('roles')->insert([
            'nombre_rol' => 'Aprendiz',
        ]);
    }
}
