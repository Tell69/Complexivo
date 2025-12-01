@extends('layouts.app')

@section('title', 'Editar Mantenimiento')

@section('content')
<div class="card p-4 shadow">
    <h2 class="mb-4">Editar Mantenimiento</h2>
    <form action="{{ route('mantenimientos.update', $mantenimiento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="vehiculo_id" class="form-label">Vehículo</label>
            <select name="vehiculo_id" class="form-select" required>
                @foreach($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->id }}" {{ $vehiculo->id == $mantenimiento->vehiculo_id ? 'selected' : '' }}>
                    {{ $vehiculo->marca }} {{ $vehiculo->modelo }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" required value="{{ $mantenimiento->fecha_inicio }}">
        </div>
        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha Fin</label>
            <input type="date" name="fecha_fin" class="form-control" required value="{{ $mantenimiento->fecha_fin }}">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required>{{ $mantenimiento->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
