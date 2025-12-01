<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['nombre','email','password','rol'];

    public function reservas() {
        return $this->hasMany(Reserva::class);
    }
}
