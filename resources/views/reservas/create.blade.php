@extends('layouts.app')

@section('content')
<h2>Nueva Reserva</h2>

<form action="{{ route('reservas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Vehículo</label>
        <select name="vehiculo_id" class="form-select">
            @foreach($vehiculos as $v)
                <option value="{{ $v->id }}">{{ $v->placa }} - {{ $v->marca }} {{ $v->modelo }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Cliente</label>
        <input type="text" name="cliente" class="form-control">
    </div>

    <div class="mb-3">
        <label>Inicio</label>
        <input type="datetime-local" name="inicio" class="form-control">
    </div>

    <div class="mb-3">
        <label>Fin</label>
        <input type="datetime-local" name="fin" class="form-control">
    </div>

    <button class="btn btn-success">Guardar</button>
</form>
@endsection
