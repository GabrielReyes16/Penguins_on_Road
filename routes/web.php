<?php


use App\Http\Controllers\ViajeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;  
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController; 
use App\Http\Controllers\ReservaController;  //Meter en carpeta correspondiente en controllers
use App\Http\Controllers\BoletaViajeController;  //Meter en carpeta correspondiente en controllers
use App\Http\Controllers\Admin\ChoferController;
use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\RutaController;
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
// Ruta del formulario de login
Route::get('/', function () {return view('index');});

// Rutas de usuario pasajero
Route::get('/usuario-pasajero/home', function () {return view('usuario-pasajero.homePasajero');});
Route::get('/home', function () {return view('usuario-pasajero.homePasajero');});
Route::get('/turnos', function () {return view('usuario-pasajero.turnos');});
Route::get('/mañana', function () {return view('usuario-pasajero.turno-mañana');});
Route::get('/tarde', function () {return view('usuario-pasajero.turno-tarde');});
Route::get('/noche', function () {return view('usuario-pasajero.turno-noche');});
Route::get('/op1', function () {return view('usuario-pasajero.turno-mañana-op1');});
Route::get('/reserva/{idReserva}', [ReservaController::class, 'mostrarReserva'])->name('mostrar_reserva');
Route::get('/reserva/{idReserva}/editar', [ReservaController::class, 'editarReserva'])->name('editar_reserva');
Route::put('/reserva/{idReserva}', [ReservaController::class, 'actualizarReserva'])->name('actualizar_reserva');
Route::get('/boletas', [BoletaViajeController::class, 'mostrarBoletas'])->name('mostrar_boletas');
Route::get('/boleta/{idBoleta}', [BoletaViajeController::class, 'verBoleta'])->name('ver_boleta');

// Rutas de chofer

Route::get('/home', function () {
    return view('usuario-pasajero.homePasajero');
});

Route::get('/turnos', function () {
    return view('usuario-pasajero.turnos');
});

//Route::get('/boletas', function () {
    //return view('usuario-pasajero.boletos');
//});
// Chofer
Route::get('/welcome', function () {
    return view('usuario-chofer.homeChofer');
});
Route::get('/view_turnos', function () {
    return view('usuario-chofer.Rutas');
});
Route::get('/view_boletas', function () {
    return view('usuario-chofer.mostrarBoletas');
});




Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// Rutas de admin
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('buses', BusController::class)->names('admin.buses');
Route::resource('choferes', ChoferController::class)->names('admin.choferes');
Route::resource('rutas', RutaController::class)->names('admin.rutas');

// Ruta de acciones directas en perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');});
     
// Rutas de abordaje
Route::get('/qrcode', [QRCodeController::class, 'showQRCode']);
Route::get('/formulario-reserva', [ReservaController::class, 'mostrarFormulario'])->name('formulario_reserva');
Route::post('/guardar-reserva', [ReservaController::class, 'guardarReserva'])->name('guardar_reserva');
Route::get('/escaner', function () {return view('escaner');});
Route::post('/utilizar-reserva', [ReservaController::class, 'utilizarReserva'])->name('utilizar-reserva');

// Rutas para crud de viajes , chofer
Route::get('/viajes', [ViajeController::class, 'mostrarViajes'])->name('mostrar_viajes');
Route::get('/viajes/crear', [ViajeController::class, 'crearViaje'])->name('crear_viaje');

// Ruta para cambiar rol de usuario




//Ruta de edicion de roles de usuario
Route::put('/admin/users/{user}/updateRole', [UserController::class, 'updateRole'])->name('admin.users.updateRole');

require __DIR__ . '/auth.php';
