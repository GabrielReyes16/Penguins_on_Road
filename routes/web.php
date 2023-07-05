<?php

use App\Http\Controllers\Admin\RutaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\Admin\ChoferController;
use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('index');
});

Route::get('/usuario-pasajero/home', function () {
    return view('usuario-pasajero.homePasajero');
});

Route::get('/home', function () {
    return view('usuario-pasajero.homePasajero');
});

Route::get('/turnos', function () {
    return view('usuario-pasajero.turnos');
});

Route::get('/boletas', function () {
    return view('usuario-pasajero.boletos');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('buses', BusController::class)->names('admin.buses');
Route::resource('choferes', ChoferController::class)->names('admin.choferes');
Route::resource('rutas', RutaController::class)->names('admin.rutas');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';

Route::get('/qrcode', [QRCodeController::class, 'showQRCode']);


Route::get('/formulario-reserva', [ReservaController::class, 'mostrarFormulario'])->name('formulario_reserva');
Route::post('/guardar-reserva', [ReservaController::class, 'guardarReserva'])->name('guardar_reserva');
Route::get('/reserva/{idReserva}', [ReservaController::class, 'mostrarReserva'])->name('mostrar_reserva');

//Route::get('/escanear-qr/{codigoQR}', [ReservaController::class, 'escanearQR'])->name('escanear_qr');
Route::get('/escaner', function () {
    return view('escaner');
});
Route::post('/utilizar-reserva', [ReservaController::class, 'utilizarReserva'])->name('utilizar-reserva');


Route::put('/admin/users/{user}/updateRole', [UserController::class, 'updateRole'])->name('admin.users.updateRole');
