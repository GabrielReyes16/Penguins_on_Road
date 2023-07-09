<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
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

    // Retornar la vista con los datos de los viajes
    return view('usuario-chofer.mostrar-viajes', compact('viajes'));
}
public function actualizarEstado(Request $request, $idViaje)
{
    // Obtener el viaje
    $viaje = Viaje::findOrFail($idViaje);

    // Validar el estado proporcionado en la solicitud
    $request->validate([
        'estado' => 'required|in:activo,no-activo',
    ]);

    // Actualizar el estado del viaje en la base de datos
    DB::table('viajes')->where('id_viaje', $idViaje)->update(['estado' => $request->estado]);

    // Devolver una respuesta con el estado actualizado
    return response()->json(['message' => 'Estado del viaje actualizado con éxito.']);
}
public function crearViaje()
{
    // Lógica para crear un nuevo viaje

    return view('usuario-chofer.crear-viaje'); // Retornar la vista de creación de viaje
}

}


