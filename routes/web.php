<?php


use App\Http\Controllers\ViajeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController; 
use App\Http\Controllers\ReservaController;  //Meter en carpeta correspondiente en controllers
use App\Http\Controllers\BoletaViajeController;  //Meter en carpeta correspondiente en controllers
use App\Http\Controllers\Admin\ChoferController;
use App\Http\Controllers\Admin\ViajeAdminController;
use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\RutaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RutasController;
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
// Ruta del formulario de login
Route::get('/', function () {return view('index');});

// Rutas de usuario pasajero
// Route::get('/usuario-pasajero/home', function () {return view('usuario-pasajero.homePasajero');});
// Route::get('/home', function () {return view('usuario-pasajero.homePasajero');});
// Route::get('/turnos', function () {return view('usuario-pasajero.turnos');});
// Route::get('/mañana', function () {return view('usuario-pasajero.turno-mañana');});
// Route::get('/tarde', function () {return view('usuario-pasajero.turno-tarde');});
// Route::get('/noche', function () {return view('usuario-pasajero.turno-noche');});
// Route::get('/tm-op1', function () {return view('usuario-pasajero.turno-mañana-op1');});
// Route::get('/tm-op2', function () {return view('usuario-pasajero.turno-mañana-op2');});
// Route::get('/tt-op1', function () {return view('usuario-pasajero.turno-tarde-op1');});

// Usuario Pasajero
Route::get('/formulario-reserva', [ReservaController::class, 'mostrarFormulario'])->name('usuario-pasajero.formulario_reserva');
Route::post('/guardar-reserva', [ReservaController::class, 'guardarReserva'])->name('guardar_reserva');
Route::get('/reserva/{codigo}', [ReservaController::class, 'mostrarReserva'])->name('usuario-pasajero.mostrar_reserva');
Route::get('/reserva/{codigo}/editar', [ReservaController::class, 'editarReserva'])->name('usuario-pasajero.editar_reserva');
Route::put('/reserva/{codigo}', [ReservaController::class, 'actualizarReserva'])->name('usuario-pasajero.actualizar_reserva');
Route::get('/boletas', [BoletaViajeController::class, 'mostrarBoletas'])->name('usuario-pasajero.mostrar_boletas');
Route::get('/boleta/{idBoleta}', [BoletaViajeController::class, 'verBoleta'])->name('usuario-pasajero.ver_boleta');
Route::get('/turnos', [RutasController::class, 'mostrarTurnos'])->name('usuario-pasajero.turnos');
Route::get('/turnos/{id}', [RutasController::class, 'mostrarRutas'])->name('usuario-pasajero.seleccion-turno');
Route::get('/turnos/{id_turno}/ruta/{id_ruta}', [RutasController::class, 'verRuta'])->name('usuario-pasajero.ver-ruta');


// Usuario Chofer
// Rutas de chofer

Route::get('/home', function () {
    return view('usuario-pasajero.homePasajero');
});
Route::get('/view-turnos', [RutasController::class, 'mostrarTurnoschofer'])->name('usuario-chofer.turnos');
Route::get('/view-turnos/{id}', [RutasController::class, 'mostrarRutaschofer'])->name('usuario-chofer.seleccion-turno');
Route::get('/view-turnos/{id_turno}/ruta/{id_ruta}', [RutasController::class, 'verRutachofer'])->name('usuario-chofer.ver-ruta');
Route::get('/escaner', function () {return view('usuario-chofer.escaner');});//->name('usuario-chofer.escaner');
Route::post('/utilizar-reserva', [ReservaController::class, 'utilizarReserva'])->name('utilizar-reserva');
Route::get('/viajes', [ViajeController::class, 'mostrarViajes'])->name('usuario-chofer.mostrar-viajes');
Route::post('viajes/crear', [ViajeController::class, 'crearViaje'])->name('usuario-chofer.crear-viaje');
Route::post('viajes/comenzar/{idViaje}', [ViajeController::class, 'comenzarViaje'])->name('usuario-chofer.comenzar-viaje');
Route::post('viajes/terminar/{idViaje}', [ViajeController::class, 'terminarViaje'])->name('usuario-chofer.terminar-viaje');
Route::post('viajes/actualizar-estado', [ViajeController::class, 'actualizarEstadoViaje'])->name('usuario-chofer.actualizar-estado-viaje');







Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas de admin
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('users', UserController::class)->middleware('can:admin.users.index')->names('admin.users');
Route::POST('/admin/users/{user}/storeChofer', [UserController::class, 'storeChofer'])->middleware('can:admin.users.index')
    ->name('admin.users.storeChofer');
Route::get('/admin/users/{user}/createChofer', [UserController::class, 'createChofer'])->middleware('can:admin.choferes.index')
    ->name('admin.users.createChofer');
Route::resource('buses', BusController::class)->middleware('can:admin.buses.index')->names('admin.buses');
Route::resource('choferes', ChoferController::class)->middleware('can:admin.choferes.index')->names('admin.choferes');
Route::resource('rutas', RutaController::class)->middleware('can:admin.rutas.index')->names('admin.rutas');
Route::resource('viajes', ViajeAdminController::class)->names('admin.viajes');

// Ruta de acciones directas en perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');});

// Ruta para cambiar rol de usuario

//Ruta de edicion de roles de usuario
Route::put('/admin/users/{user}/updateRole', [UserController::class, 'updateRole'])->name('admin.users.updateRole');

require __DIR__ . '/auth.php';
