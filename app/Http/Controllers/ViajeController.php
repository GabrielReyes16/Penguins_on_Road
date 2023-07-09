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
        // Obtener el ID del usuario del chofer autenticado
        $idUsuario = Auth::id();

        // Obtener el chofer basado en el ID del usuario
        $chofer = Chofer::where('id_usuario', $idUsuario)->first();

        if (!$chofer) {
            // Si no se encuentra el chofer, redirigir o mostrar un mensaje de error
            return redirect()->back()->with('error', 'No se encontró el chofer.');
        }

        // Obtener todos los viajes del chofer
        $viajes = Viaje::where('id_chofer', $chofer->id_chofer)
            ->orderByDesc('id_viaje')
            ->get();

        // Calcular la duración de cada viaje
        $viajes->transform(function ($viaje) {
            $duracion = Carbon::parse($viaje->hora_final)->diff(Carbon::parse($viaje->hora_inicio));
            $viaje->duracion = $duracion->format('%H:%I:%S');
            $viaje->fecha_viaje = Carbon::createFromFormat('Y-m-d', $viaje->fecha_viaje)->format('d/m/Y');
            return $viaje;
        });

        // Retornar la vista con los datos de los viajes
        return view('usuario-chofer.mostrar-viajes', compact('viajes'));
    }

    public function crearViaje(Request $request)
    {
        // Obtener el ID del chofer autenticado
        $idUsuario = $request->input('id_usuario');
        
        // Obtener el chofer basado en el ID del usuario
        $chofer = Chofer::where('id_usuario', $idUsuario)->first();

        if (!$chofer) {
            // Si no se encuentra el chofer, redirigir o mostrar un mensaje de error
            return redirect()->back()->with('error', 'No se encontró el chofer.');
        }

        // Obtener el bus actual del chofer
        $bus = $chofer->bus;

        if (!$bus) {
            // Si no se encuentra el bus, redirigir o mostrar un mensaje de error
            return redirect()->back()->with('error', 'No se encontró el bus del chofer.');
        }

        // Obtener la ruta actual del bus
        $ruta = $bus->ruta;

        if (!$ruta) {
            // Si no se encuentra la ruta, redirigir o mostrar un mensaje de error
            return redirect()->back()->with('error', 'No se encontró la ruta actual del bus.');
        }

        // Crear el viaje con los datos proporcionados
        $viaje = new Viaje();
        $viaje->id_chofer = $chofer->id_chofer;
        $viaje->id_bus = $bus->id_bus;
        $viaje->id_ruta = $ruta->id_ruta;
        $viaje->fecha_viaje = Carbon::now()->format('Y-m-d');
        $viaje->save();

        // Redireccionar a la página deseada o mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'El viaje se ha creado correctamente.');
    }
}
