@extends('layouts.app')

@section('title', 'Nuevo Vehículo')

@section('content')
<div class="card p-4 shadow">
    <h2 class="mb-4">Crear Vehículo</h2>
    <form action="{{ route('vehiculos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Placa</label>
            <input type="text" name="placa" class="form-control" required value="{{ old('placa') }}">
        </div>

        <div class="mb-3">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control" required value="{{ old('marca') }}">
        </div>

        <div class="mb-3">
            <label>Modelo</label>
            <input type="text" name="modelo" class="form-control" required value="{{ old('modelo') }}">
        </div>

        <div class="mb-3">
            <label>Año</label>
            <input type="number" name="anio" class="form-control" required value="{{ old('anio') }}">
        </div>

        <div class="mb-3">
            <label>Categoría</label>
            <select name="categoria" class="form-select" required>
                <option value="Economico">Económico</option>
                <option value="Medio">Medio</option>
                <option value="Lujo">Lujo</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-select">
                <option value="disponible">Disponible</option>
                <option value="en_mantenimiento">En mantenimiento</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
