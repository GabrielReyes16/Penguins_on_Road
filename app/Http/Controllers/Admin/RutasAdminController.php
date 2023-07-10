<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chofer;
use App\Models\Ruta;
use App\Models\Turno;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Viaje;
use Illuminate\Support\Facades\Auth;

class RutasAdminController extends Controller
{

    public function index()
{
    $turnos = Turno::select('id_turno', 'nombre')->get();

    return view('admin.ruta.turnos', compact('turnos'));
}
public function mostrarTurnoschofer()
{
    $turnos = Turno::select('id_turno', 'nombre')->get();

    return view('admin.turnos', compact('turnos'));
}
public function mostrarRutas($id_turno)
{
    $turno = Turno::select('id_turno','nombre', 'hora_inicio')->find($id_turno);
    $rutas = Ruta::where('id_turno', $id_turno)->get();

    return view('admin.seleccion-turno', compact('rutas','turno'));
}
public function mostrarRutaschofer($id_turno)
{
    $turno = Turno::select('id_turno','nombre', 'hora_inicio')->find($id_turno);
    $rutas = Ruta::where('id_turno', $id_turno)->get();

    return view('admin.seleccion-turno', compact('rutas','turno'));
}
public function verRuta($id_turno, $id_ruta)
{
    $ruta = Ruta::findOrFail($id_ruta);
    $paraderos = $ruta->paraderos;
    $horaInicio = Carbon::parse($ruta->turno->hora_inicio);

    $horaFinEstimada = $horaInicio->copy()->addHours(2);

    return view('admin.ver-ruta', compact('ruta', 'paraderos','horaFinEstimada','horaInicio'));
}
public function verRutachofer($id_turno, $id_ruta)
{
    $ruta = Ruta::findOrFail($id_ruta);
    $paraderos = $ruta->paraderos;
    $horaInicio = Carbon::parse($ruta->turno->hora_inicio);

    $horaFinEstimada = $horaInicio->copy()->addHours(2);

    return view('admin.ver-ruta', compact('ruta', 'paraderos','horaFinEstimada','horaInicio'));
}
}