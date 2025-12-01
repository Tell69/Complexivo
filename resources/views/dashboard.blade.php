@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="text-center">
    <h1 class="mb-4 fw-bold">Bienvenido, {{ Auth::user()->nombre ?? Auth::user()->email }}</h1>

    <div class="row justify-content-center g-3">
        <div class="col-md-3 col-sm-6">
            <a href="{{ url('/usuarios') }}" class="btn btn-outline-primary w-100 py-3 shadow-sm">
                <i class="fa-solid fa-users me-2"></i> Usuarios
            </a>
        </div>
        <div class="col-md-3 col-sm-6">
            <a href="{{ url('/vehiculos') }}" class="btn btn-outline-success w-100 py-3 shadow-sm">
                <i class="fa-solid fa-car me-2"></i> Vehículos
            </a>
        </div>
        <div class="col-md-3 col-sm-6">
            <a href="{{ url('/reservas') }}" class="btn btn-outline-warning w-100 py-3 shadow-sm">
                <i class="fa-solid fa-calendar-check me-2"></i> Reservas
            </a>
        </div>
        <div class="col-md-3 col-sm-6">
            <a href="{{ url('/mantenimientos') }}" class="btn btn-outline-danger w-100 py-3 shadow-sm">
                <i class="fa-solid fa-tools me-2"></i> Mantenimientos
            </a>
        </div>
        <div class="col-md-3 col-sm-6">
    <a href="{{ url('/reportes/reservas') }}" class="btn btn-outline-info w-100 py-3 shadow-sm">
        <i class="fa-solid fa-file-alt me-2"></i> Reportes
    </a>
</div>

    </div>
</div>
@endsection
