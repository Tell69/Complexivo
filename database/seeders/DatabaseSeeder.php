<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsuarioSeeder::class,
            VehiculoSeeder::class,
            ReservaSeeder::class,
            MantenimientoSeeder::class,
        ]);
    }
}
