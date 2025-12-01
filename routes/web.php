<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Rutas públicas (login/logout)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registro
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// RUTAS PROTEGIDAS
Route::middleware(['auth'])->group(function() {

    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    // CRUDS
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('vehiculos', VehiculoController::class);
    Route::resource('reservas', ReservaController::class);
    Route::resource('mantenimientos', MantenimientoController::class);

    // REPORTES
    Route::get('/reportes/reservas', [ReportesController::class, 'reservas'])
         ->name('reportes.reservas');
});
