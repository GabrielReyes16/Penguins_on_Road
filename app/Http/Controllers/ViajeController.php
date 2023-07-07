<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use Illuminate\Http\Request;
use App\Models\Viaje;
use Illuminate\Support\Facades\Auth;

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
    return view('mostrar_viajes', compact('viajes'));
}
public function crearViaje()
{
    // Lógica para crear un nuevo viaje

    return view('crear_viaje'); // Retornar la vista de creación de viaje
}

}


