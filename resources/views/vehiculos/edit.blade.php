@extends('layouts.app')

@section('title', 'Editar Vehículo')

@section('content')
<div class="card p-4 shadow">
    <h2 class="mb-4">Editar Vehículo</h2>

    <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="placa" class="form-label">Placa</label>
            <input type="text" name="placa" class="form-control" required 
                   value="{{ old('placa', $vehiculo->placa) }}">
        </div>

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" required 
                   value="{{ old('marca', $vehiculo->marca) }}">
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" class="form-control" required 
                   value="{{ old('modelo', $vehiculo->modelo) }}">
        </div>

        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" name="anio" class="form-control" required 
                   value="{{ old('anio', $vehiculo->anio) }}">
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select name="categoria" class="form-select" required>
                <option value="Economico" {{ $vehiculo->categoria == 'Economico' ? 'selected' : '' }}>Económico</option>
                <option value="Medio" {{ $vehiculo->categoria == 'Medio' ? 'selected' : '' }}>Medio</option>
                <option value="Lujo" {{ $vehiculo->categoria == 'Lujo' ? 'selected' : '' }}>Lujo</option>
            </select>
        </div>

        {{-- ✔ NUEVO Campo ESTADO --}}
        <div class="mb-3">
            <label for="estado" class="form-label">Estado del Vehículo</label>
            <select name="estado" class="form-select" required>
                <option value="disponible" {{ $vehiculo->estado == 'disponible' ? 'selected' : '' }}>
                    Disponible
                </option>
                <option value="en_mantenimiento" {{ $vehiculo->estado == 'en_mantenimiento' ? 'selected' : '' }}>
                    En mantenimiento
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>
</div>
@endsection
