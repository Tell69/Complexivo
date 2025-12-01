@extends('layouts.app')

@section('title', 'Vehículos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Vehículos</h2>
    <a href="{{ route('vehiculos.create') }}" class="btn btn-primary">Nuevo Vehículo</a>
</div>

@if($vehiculos->count())
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Categoría</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($vehiculos as $vehiculo)
        <tr>
            <td>{{ $vehiculo->id }}</td>
            <td>{{ $vehiculo->placa }}</td>
            <td>{{ $vehiculo->marca }}</td>
            <td>{{ $vehiculo->modelo }}</td>
            <td>{{ $vehiculo->anio }}</td>
            <td>{{ $vehiculo->categoria }}</td>

            {{-- ✔ MOSTRAR ESTADO CON COLOR --}}
            <td>
                @if($vehiculo->estado === 'disponible')
                    <span class="badge bg-success">Disponible</span>
                @else
                    <span class="badge bg-danger">En mantenimiento</span>
                @endif
            </td>

            <td>
                <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Seguro que quieres eliminar?')">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No hay vehículos registrados.</p>
@endif
@endsection
