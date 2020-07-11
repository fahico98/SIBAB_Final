<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);

        $this->call(RegistroUsuarioSeeder::class);

        $this->call(MunicipioSeeder::class);

        $this->call(PaisesSeeder::class);

        $this->call(TipoDocumentoSeeder::class);

        $this->call(GeneroSeeder::class);

        $this->call(EstadoLaboralSeeder::class);

        $this->call(RegimenSeeder::class);

        $this->call(TipoEPSSeeder::class);
        

    }
}
