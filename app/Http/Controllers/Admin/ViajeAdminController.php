<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chofer;
use App\Models\Viaje;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ViajeAdminController extends Controller
{
    public function index()
    {

        $viajes = Viaje::all();

        $viajes->transform(function ($viaje) {
            $duracion = Carbon::parse($viaje->hora_final)->diff(Carbon::parse($viaje->hora_inicio));
            $viaje->duracion = $duracion->format('%H:%I:%S');
            $viaje->fecha_viaje = Carbon::createFromFormat('Y-m-d', $viaje->fecha_viaje)->format('d/m/Y');
            return $viaje;
        });

        return view('admin.viaje.mostrar-viajes', compact('viajes'));
    }
    public function crearViaje(Request $request)
    {
        $idUsuario = $request->input('id_usuario');
        
        $chofer = Chofer::where('id_usuario', $idUsuario)->first();

        $bus = $chofer->bus;

        $ruta = $bus->ruta;

        $viaje = new Viaje();
        $viaje->id_chofer = $chofer->id_chofer;
        $viaje->id_bus = $bus->id_bus;
        $viaje->id_ruta = $ruta->id_ruta;
        $viaje->fecha_viaje = Carbon::now()->format('Y-m-d');
        $viaje->save();

        return redirect()->back()->with('success', 'El viaje se ha creado correctamente.');
    }
    public function comenzarViaje(Request $request, $idViaje)
{
    $viaje = Viaje::findOrFail($idViaje);
    $viaje->hora_inicio = Carbon::now();
    $viaje->save();

    return redirect()->back()->with('success', 'El viaje ha comenzado exitosamente.');
}
public function terminarViaje(Request $request, $idViaje)
{
    $viaje = Viaje::findOrFail($idViaje);
    $viaje->hora_final = Carbon::now();
    $viaje->save();

    return redirect()->back()->with('success', 'El viaje ha sido terminado exitosamente.');
}
public function actualizarEstadoViaje(Request $request)
{
    $viajeId = $request->input('id_viaje');
    $estado = $request->input('estado_viaje');

    $viaje = Viaje::findOrFail($viajeId);
    $viaje->estado = $estado;
    $viaje->save();

    return redirect()->back()->with('success', 'El estado del viaje se ha actualizado correctamente.');
}


}

