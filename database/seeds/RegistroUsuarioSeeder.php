<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistroUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'email' => 'glciro@sena.edu.co',
            'password' => bcrypt('123123'),
            'rol' => '1',
            'estado' => 'habilitado',
        ]);
    }
}
