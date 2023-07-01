<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**

 */
class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $choferes = User::where('rol', 'Chofer')->paginate();
    
        return view('chofer.index', compact('choferes'))
            ->with('i', (request()->input('page', 1) - 1) * $choferes->perPage());
    }
    

    /**
     * Show the form for creating a new resource.
     */
    
     public function create()
     {
        return view('chofer.create');
     }
     
     public function store(Request $request)

     {
         request()->validate(User::$rules);
 
         $chofer = User::create($request->all());
 
         return redirect()->route('choferes.index')
 
             ->with('success', 'Chofer created successfully.');
 
     }
     
     public function show($id_usuario)
     {
         // Se busca el usuario solo si tiene rol Chofer
         $user = User::where('rol', 'Chofer')->find($id_usuario);
     
         if (!$user) {
             return redirect()->route('choferes.index')->with('error', 'Chofer no encontrado');
         }
     
         return view('chofer.show', compact('user'));
     }
     
     public function edit($id_usuario)
     {
         // Se busca el usuario solo si tiene rol Chofer
         $user = User::where('rol', 'Chofer')->find($id_usuario);
     
         if (!$user) {
             return redirect()->route('users.index')->with('error', 'Usuario no encontrado');
         }
     
         return view('chofer.edit', compact('user'));
     }
     
     public function update(UserUpdateRequest $request, $id)
     {
         $user = User::where('rol', 'Chofer')->findOrFail($id);
         $user->fill($request->validated());
     
         if ($user->isDirty('email')) {
             $user->email_verified_at = null;
         }
     
         $user->save();
     
         return redirect()->route('choferes.index')->with('success', 'Información actualizada correctamente');
     }
     
     public function destroy($id_usuario)
     {
         $user = User::where('rol', 'Chofer')->find($id_usuario);
     
         if (!$user) {
             return redirect()->route('choferes.index')->with('error', 'Chofer no encontrado');
         }
     
         $user->delete();

         return redirect()->route('choferes.index')->with('success', 'Chofer eliminado con éxito');
     }}
     
     
     
     
     
     
     