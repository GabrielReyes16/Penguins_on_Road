<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = Usuario::all();

        return view('usuarios.index', compact('users'));
    }
}

