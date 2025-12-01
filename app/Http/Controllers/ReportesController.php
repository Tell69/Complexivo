<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function reservas()
    {
        $reservas = Reserva::with('vehiculo')->orderBy('inicio','desc')->get();
        return view('reportes.reservas', compact('reservas'));
    }
}
