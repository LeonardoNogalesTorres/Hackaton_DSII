<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidenteController;

// 1. Ruta para ver el formulario de registro (Operador) 
Route::get('/incidentes/crear', [IncidenteController::class, 'create'])->name('incidentes.create');

// 2. Ruta para procesar el formulario y guardar en la Base de Datos
Route::post('/incidentes', [IncidenteController::class, 'store'])->name('incidentes.store');

// 3. Ruta para ver el tablero de control con todos los estados (Coordinador) [cite: 294, 295, 296]
Route::get('/dashboard', [IncidenteController::class, 'index'])->name('dashboard.index');

// 4. Ruta rápida para cambiar el estado del incidente (Coordinador) [cite: 284, 285]
Route::put('/incidentes/{id}/estado', [IncidenteController::class, 'updateEstado'])->name('incidentes.updateEstado');   

Route::get('/login', [IncidenteController::class, 'showLogin'])->name('login');
Route::post('/login', [IncidenteController::class, 'login']);
Route::post('/logout', [IncidenteController::class, 'logout'])->name('logout');
// Ruta para el Formulario de Registro (Inicio para el Operador)
Route::get('/incidentes/crear', [IncidenteController::class, 'create'])->name('incidentes.create');

// Ruta para el Tablero (Seguimiento & Registro)
Route::get('/dashboard', [IncidenteController::class, 'index'])->name('dashboard.index');