@extends('layouts.app')

@section('title', 'Reservas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Reservas</h2>
    <a href="{{ route('reservas.create') }}" class="btn btn-primary">Nueva Reserva</a>
</div>

@if($reservas->count())
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Vehículo</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservas as $reserva)
        <tr>
            <td>{{ $reserva->id }}</td>
            <td>{{ $reserva->usuario->nombre ?? 'N/A' }}</td>
            <td>{{ $reserva->vehiculo->modelo ?? 'N/A' }}</td>
            <td>{{ $reserva->fecha_inicio }}</td>
            <td>{{ $reserva->fecha_fin }}</td>
            <td>{{ $reserva->estado }}</td>
            <td>
                <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" class="d-inline">
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
<p>No hay reservas registradas.</p>
@endif
@endsection
