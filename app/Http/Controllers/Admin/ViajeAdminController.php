<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chofer;
use App\Models\Viaje;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ViajeAdminController extends Controller
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

        return view('admin.viaje.mostrar-viajes', compact('viajes'));
    }
}
