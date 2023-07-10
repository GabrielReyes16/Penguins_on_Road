<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\BoletaViaje;
use Illuminate\Support\Facades\Auth;

class BoletaViajeController extends Controller
{
    public function mostrarBoletas()
    {
        $idUsuarioPasajero = Auth::id();
    
        $boletas = BoletaViaje::where('id_usuario_pasajero', $idUsuarioPasajero)->get();
    
        Carbon::setLocale('es');

        $boletas->transform(function ($boleto) {
            $boleto->fecha_formateada = Carbon::createFromFormat('Y-m-d', $boleto->fecha_viaje)->format('D d/m');
            return $boleto;
        });
    
        return view('usuario-pasajero.mostrar_boletas', compact('boletas'));
    }
    
public function verBoleta($idBoleta)
    {
        $boleta = BoletaViaje::find($idBoleta);

        return view('usuario-pasajero.ver_boleta', compact('boleta'));
    }
}
