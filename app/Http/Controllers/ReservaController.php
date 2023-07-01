<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function showSolicitar()
    {
        return view('reserva.solicitar');
    }

    public function guardar(Request $request)
    {
        // Aquí puedes procesar y guardar la reserva en la base de datos
        // usando los datos recibidos en $request

        // Por ahora, simplemente redireccionamos a una página de éxito
        return redirect()->route('reserva.exito');
    }

    public function exito()
    {
        return view('reserva.exito');
    }
}
