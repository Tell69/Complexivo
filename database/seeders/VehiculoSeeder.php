<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehiculo;

class VehiculoSeeder extends Seeder
{
    public function run()
    {
        Vehiculo::create([
            'placa' => 'ABC123',
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'anio' => 2020,
            'categoria' => 'sedán',
            'estado' => 'disponible'
        ]);

        Vehiculo::create([
            'placa' => 'XYZ987',
            'marca' => 'Honda',
            'modelo' => 'CRV',
            'anio' => 2021,
            'categoria' => 'SUV',
            'estado' => 'disponible'
        ]);

        Vehiculo::create([
            'placa' => 'LMN456',
            'marca' => 'Ford',
            'modelo' => 'Focus',
            'anio' => 2019,
            'categoria' => 'sedán',
            'estado' => 'disponible'
        ]);
    }
}
