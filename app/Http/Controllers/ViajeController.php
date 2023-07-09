<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Viaje;
use Illuminate\Support\Facades\Auth;

class ViajeController extends Controller
{
    public function mostrarViajes()
    {
        $idUsuario = Auth::id();

        $chofer = Chofer::where('id_usuario', $idUsuario)->first();

        if (!$chofer) {
            return redirect()->back()->with('error', 'No se encontró el chofer.');
        }

        $viajes = Viaje::where('id_chofer', $chofer->id_chofer)
            ->orderByDesc('id_viaje')
            ->get();

        $viajes->transform(function ($viaje) {
            $duracion = Carbon::parse($viaje->hora_final)->diff(Carbon::parse($viaje->hora_inicio));
            $viaje->duracion = $duracion->format('%H:%I:%S');
            $viaje->fecha_viaje = Carbon::createFromFormat('Y-m-d', $viaje->fecha_viaje)->format('d/m/Y');
            return $viaje;
        });

        return view('usuario-chofer.mostrar-viajes', compact('viajes'));
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

    // Obtén el viaje y actualiza el estado
    $viaje = Viaje::findOrFail($viajeId);
    $viaje->estado = $estado;
    $viaje->save();

    // Redirecciona a la página deseada o muestra un mensaje de éxito
    return redirect()->back()->with('success', 'El estado del viaje se ha actualizado correctamente.');
}


}
