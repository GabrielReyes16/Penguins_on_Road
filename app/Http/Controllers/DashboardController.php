<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('Administrador')) {
            return view('dashboard');
        } elseif (auth()->user()->hasRole('Chofer')) {
            return view('usuario-chofer.homeChofer');
        }elseif (auth()->user()->hasRole('Pasajero')) {
            return view('usuario-pasajero.homePasajero');
    }
}
}
