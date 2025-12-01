<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehiculo_id',
        'cliente',
        'inicio',
        'fin',
        'precio_total',
        'estado_pago'
    ];

    public function vehiculo() {
        return $this->belongsTo(Vehiculo::class);
    }
}
