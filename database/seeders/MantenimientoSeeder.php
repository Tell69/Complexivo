<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mantenimiento;

class MantenimientoSeeder extends Seeder
{
    public function run()
    {
        Mantenimiento::create([
            'vehiculo_id' => 3, // Ford Focus
            'descripcion' => 'Cambio de aceite y revisión general',
            'fecha_inicio' => now()->addDays(1),
            'fecha_fin' => now()->addDays(2),
            'estado' => 'pendiente'
        ]);
    }
}
