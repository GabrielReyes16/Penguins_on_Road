<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chofer;
use App\Models\Viaje;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
}
