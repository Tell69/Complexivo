<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservaSeeder extends Seeder
{
    public function run()
    {
        Reserva::create([
            'usuario_id' => 2, // Cliente1
            'vehiculo_id' => 1, // Toyota Corolla
            'fecha_inicio' => now()->addDays(1),
            'fecha_fin' => now()->addDays(3),
            'total_pago' => 150.00,
            'estado' => 'confirmada'
        ]);

        Reserva::create([
            'usuario_id' => 3, // Cliente2
            'vehiculo_id' => 2, // Honda CRV
            'fecha_inicio' => now()->addDays(2),
            'fecha_fin' => now()->addDays(5),
            'total_pago' => 300.00,
            'estado' => 'confirmada'
        ]);
    }
}
