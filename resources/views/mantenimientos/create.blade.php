@extends('layouts.app')

@section('title', 'Nuevo Mantenimiento')

@section('content')
<div class="card p-4 shadow">
    <h2 class="mb-4">Crear Mantenimiento</h2>
    <form action="{{ route('mantenimientos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="vehiculo_id" class="form-label">Vehículo</label>
            <select name="vehiculo_id" class="form-select" required>
                @foreach($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->id }}">{{ $vehiculo->marca }} {{ $vehiculo->modelo }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha Fin</label>
            <input type="date" name="fecha_fin" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
