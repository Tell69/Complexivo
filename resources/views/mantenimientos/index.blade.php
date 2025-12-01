@extends('layouts.app')

@section('title', 'Mantenimientos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Mantenimientos</h2>
    <a href="{{ route('mantenimientos.create') }}" class="btn btn-primary">Nuevo Mantenimiento</a>
</div>

@if($mantenimientos->count())
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Vehículo</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mantenimientos as $mantenimiento)
        <tr>
            <td>{{ $mantenimiento->id }}</td>
            <td>{{ $mantenimiento->vehiculo->modelo ?? 'N/A' }}</td>
            <td>{{ $mantenimiento->fecha_inicio }}</td>
            <td>{{ $mantenimiento->fecha_fin }}</td>
            <td>{{ $mantenimiento->descripcion }}</td>
            <td>
                <a href="{{ route('mantenimientos.edit', $mantenimiento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('mantenimientos.destroy', $mantenimiento->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No hay mantenimientos registrados.</p>
@endif
@endsection
