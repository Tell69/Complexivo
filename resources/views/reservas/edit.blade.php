@extends('layouts.app') <!-- Asegúrate de tener un layout llamado app.blade.php -->

@section('content')
<div class="container mt-4">
    <h2>Editar Reserva</h2>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="usuario_id" class="form-label">Cliente</label>
            <select name="usuario_id" id="usuario_id" class="form-select" required>
                <option value="">Seleccione un cliente</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $reserva->usuario_id == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="vehiculo_id" class="form-label">Vehículo</label>
            <select name="vehiculo_id" id="vehiculo_id" class="form-select" required>
                <option value="">Seleccione un vehículo</option>
                @foreach($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo->id }}" {{ $reserva->vehiculo_id == $vehiculo->id ? 'selected' : '' }}>
                        {{ $vehiculo->marca }} {{ $vehiculo->modelo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" class="form-control"
                   value="{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de Fin</label>
            <input type="datetime-local" name="fecha_fin" id="fecha_fin" class="form-control"
                   value="{{ \Carbon\Carbon::parse($reserva->fecha_fin)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label for="total_pago" class="form-label">Total a Pagar</label>
            <input type="number" name="total_pago" id="total_pago" class="form-control"
                   value="{{ $reserva->total_pago }}" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
