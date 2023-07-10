<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Rutas
Route::get('/dashboard', function () {return view('dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');
Route::resource('users',UserController::class)->names('admin.users');
Route::resource('buses',BusController::class)->names('admin.buses');
Route::resource('choferes',ChoferController::class)->names('admin.choferes');
Route::resource('turnos',TurnoController::class)->names('admin.turnos');
Route::resource('viajes',ViajeAdminController::class)->names('admin.viajes');
