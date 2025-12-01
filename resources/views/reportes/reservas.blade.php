@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-3">Reporte de Reservas</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Vehículo</th>
            <th>Cliente</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Pago</th>
        </tr>
    </thead>

    <tbody>
        @foreach($reservas as $r)
        <tr>
            <td>{{ $r->vehiculo->placa }}</td>
            <td>{{ $r->cliente }}</td>
            <td>{{ $r->inicio }}</td>
            <td>{{ $r->fin }}</td>
            <td>{{ ucfirst($r->estado_pago) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
