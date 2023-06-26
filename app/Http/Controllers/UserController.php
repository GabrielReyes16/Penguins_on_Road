<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);

        return view('Users.index', compact('users'));
    }
    public function create()
    {
        return view('Users.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'rol' => 'required', 'email' => 'required'
        ]);

        $user = $request->all();
        User::create($user);
        return redirect()->route('Users.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('Users.editar', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required', 'rol' => 'required', 'email' => 'required'
        ]);

        $usuario = $request -> all();

        $user->update($usuario);

        return redirect()->route('Users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('Users.index');
    }
}


