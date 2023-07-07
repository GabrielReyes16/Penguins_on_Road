<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoletaViaje;
use Illuminate\Support\Facades\Auth;

class BoletaViajeController extends Controller
{
    public function mostrarBoletas()
{
    // Obtener el ID del usuario pasajero autenticado
    $idUsuarioPasajero = Auth::id();

    // Obtener todos los boletos del usuario pasajero
    $boletas = BoletaViaje::where('id_usuario_pasajero', $idUsuarioPasajero)->get();

    // Retornar la vista con los datos de los boletos
    return view('usuario-pasajero.mostrar_boletas', compact('boletas'));
}

public function verBoleta($idBoleta)
    {
        // Obtener la boleta de viaje por su ID
        $boleta = BoletaViaje::find($idBoleta);

        // Verificar si se encontró la boleta
        if (!$boleta) {
            abort(404); // Mostrar error 404 si la boleta no existe
        }

        // Retornar la vista con los datos de la boleta
        return view('ver_boleta', compact('boleta'));
    }
}
