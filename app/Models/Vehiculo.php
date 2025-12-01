<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = ['placa','marca','modelo','anio','categoria','estado'];

    public function reservas() {
        return $this->hasMany(Reserva::class);
    }

    public function mantenimientos() {
        return $this->hasMany(Mantenimiento::class);
    }

    public function estaEnMantenimiento() {
        return $this->estado === 'en_mantenimiento';
    }
}
