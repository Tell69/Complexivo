<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        Usuario::create([
            'nombre' => 'Admin',
            'email' => 'admin@autos.com',
            'password' => Hash::make('admin123'),
            'rol' => 'administrador'
        ]);

        Usuario::create([
            'nombre' => 'Cliente1',
            'email' => 'cliente1@autos.com',
            'password' => Hash::make('cliente123'),
            'rol' => 'cliente'
        ]);

        Usuario::create([
            'nombre' => 'Cliente2',
            'email' => 'cliente2@autos.com',
            'password' => Hash::make('cliente123'),
            'rol' => 'cliente'
        ]);
    }
}
