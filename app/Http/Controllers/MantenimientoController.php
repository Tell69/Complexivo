<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function index()
    {
        $mantenimientos = Mantenimiento::with('vehiculo')->get();
        return view('mantenimientos.index', compact('mantenimientos'));
    }

    public function create()
    {
        $vehiculos = Vehiculo::all();
        return view('mantenimientos.create', compact('vehiculos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date|after:now',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'estado' => 'required|in:pendiente,en_proceso,completado'
        ]);

        Mantenimiento::create($request->all());

        // Cambiar estado del vehículo a en_mantenimiento si no está completado
        if ($request->estado != 'completado') {
            $vehiculo = Vehiculo::find($request->vehiculo_id);
            $vehiculo->estado = 'en_mantenimiento';
            $vehiculo->save();
        }

        return redirect()->route('mantenimientos.index')->with('success','Mantenimiento registrado correctamente.');
    }

    public function show(Mantenimiento $mantenimiento)
    {
        return view('mantenimientos.show', compact('mantenimiento'));
    }

    public function edit(Mantenimiento $mantenimiento)
    {
        $vehiculos = Vehiculo::all();
        return view('mantenimientos.edit', compact('mantenimiento','vehiculos'));
    }

    public function update(Request $request, Mantenimiento $mantenimiento)
    {
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date|after:now',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'estado' => 'required|in:pendiente,en_proceso,completado'
        ]);

        $mantenimiento->update($request->all());

        // Actualizar estado del vehículo
        $vehiculo = Vehiculo::find($request->vehiculo_id);
        if ($request->estado == 'completado') {
            $vehiculo->estado = 'disponible';
        } else {
            $vehiculo->estado = 'en_mantenimiento';
        }
        $vehiculo->save();

        return redirect()->route('mantenimientos.index')->with('success','Mantenimiento actualizado correctamente.');
    }

    public function destroy(Mantenimiento $mantenimiento)
    {
        $vehiculo = Vehiculo::find($mantenimiento->vehiculo_id);
        $mantenimiento->delete();
        
        // Verificar si quedan mantenimientos activos
        $activos = $vehiculo->mantenimientos()->where('estado','!=','completado')->count();
        if ($activos == 0) {
            $vehiculo->estado = 'disponible';
            $vehiculo->save();
        }

        return redirect()->route('mantenimientos.index')->with('success','Mantenimiento eliminado correctamente.');
    }
}
