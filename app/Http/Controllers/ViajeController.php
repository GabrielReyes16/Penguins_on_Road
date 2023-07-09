<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Viaje;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViajeController extends Controller{

    public function mostrarViajes()
{
    // Obtener el ID del usuario del chofer autenticado
    $idUsuario = Auth::id();

    // Obtener el ID del chofer basado en el ID del usuario
    $chofer = Chofer::where('id_usuario', $idUsuario)->first();

    if (!$chofer) {
        // Si no se encuentra el chofer, redirigir o mostrar un mensaje de error
        return redirect()->back()->with('error', 'No se encontró el chofer.');
    }

    // Obtener todos los viajes del chofer
    $viajes = Viaje::where('id_chofer', $chofer->id_chofer)->get();

    // Formatear la fecha de cada viaje antes de pasarlos a la vista
    $viajes->transform(function ($viaje) {
        $viaje->fecha_viaje = Carbon::createFromFormat('Y-m-d', $viaje->fecha_viaje)->format('d/m/Y');
        return $viaje;
    });

    // Retornar la vista con los datos de los viajes
    return view('usuario-chofer.mostrar-viajes', compact('viajes'));
}
public function crearViaje(Request $request)
{
    // Validar los datos recibidos del formulario, si es necesario

    // Crear un nuevo objeto Viaje con los datos del formulario
    $viaje = new Viaje();
    $viaje->id_ruta = $request->input('id_ruta');
    $viaje->id_bus = $request->input('id_bus');
    $viaje->id_chofer = $request->input('id_chofer');
    $viaje->fecha_viaje = $request->input('fecha_viaje');
    $viaje->hora_inicio = $request->input('hora_inicio');
    $viaje->hora_final = $request->input('hora_final');
    $viaje->estado = 'activo'; // Ejemplo de valor por defecto para el estado
    $viaje->aforo_actual = 0; // Ejemplo de valor por defecto para el aforo actual
    $viaje->save();

    // Redirigir a una página de éxito o mostrar un mensaje de éxito, según sea necesario
    return redirect()->route('usuario-chofer.crear-viaje')->with('success', 'Viaje creado exitosamente');
}

}


