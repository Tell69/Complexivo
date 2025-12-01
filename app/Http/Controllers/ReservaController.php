<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('vehiculo')->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $vehiculos = Vehiculo::all();
        return view('reservas.create', compact('vehiculos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'cliente' => 'required|string',
            'inicio' => 'required|date',
            'fin' => 'required|date|after:inicio'
        ]);

        $vehiculo = Vehiculo::find($request->vehiculo_id);

        if ($vehiculo->estado === 'en_mantenimiento') {
            return back()->withErrors('Este vehículo está en mantenimiento.');
        }

        $choque = Reserva::where('vehiculo_id', $vehiculo->id)
            ->where(function ($q) use ($request) {
                $q->whereBetween('inicio', [$request->inicio, $request->fin])
                  ->orWhereBetween('fin', [$request->inicio, $request->fin])
                  ->orWhereRaw('? BETWEEN inicio AND fin', [$request->inicio])
                  ->orWhereRaw('? BETWEEN inicio AND fin', [$request->fin]);
            })
            ->exists();

        if ($choque) {
            return back()->withErrors('Ya existe una reserva en ese horario.');
        }

        Reserva::create($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva creada.');
    }

    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        $vehiculos = Vehiculo::all();
        return view('reservas.edit', compact('reserva', 'vehiculos'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'cliente' => 'required|string',
            'inicio' => 'required|date',
            'fin' => 'required|date|after:inicio'
        ]);

        $vehiculo = Vehiculo::find($request->vehiculo_id);

        if ($vehiculo->estado === 'en_mantenimiento') {
            return back()->withErrors('Este vehículo está en mantenimiento.');
        }

        $choque = Reserva::where('vehiculo_id', $vehiculo->id)
            ->where('id', '!=', $reserva->id)
            ->where(function ($q) use ($request) {
                $q->whereBetween('inicio', [$request->inicio, $request->fin])
                  ->orWhereBetween('fin', [$request->inicio, $request->fin])
                  ->orWhereRaw('? BETWEEN inicio AND fin', [$request->inicio])
                  ->orWhereRaw('? BETWEEN inicio AND fin', [$request->fin]);
            })
            ->exists();

        if ($choque) {
            return back()->withErrors('Ya existe otra reserva en ese horario.');
        }

        $reserva->update($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada.');
    }
}
