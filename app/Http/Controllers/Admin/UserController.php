<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $searchValue = request('search');
        $users = User::where('name', 'like', "%$searchValue%")
                    ->orWhere('email', 'like', "%$searchValue%")
                    ->get();
        $users = User::paginate(100);
        return view('admin.user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }
    
    

    public function create()
    {
        $roles = Role::pluck('name', 'id');

        return view('admin.user.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate(User::$rules);
    
        $user = User::create($request->all());
        $user->assignRole($request->input('roles'));
    
        session()->flash('alert-color', 'green');
    
        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_usuario)
    {
        $user = User::find($id_usuario);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit($id_usuario)
     {
         $user = User::find($id_usuario);
         $roles = Role::all();
 
         return view('admin.user.edit', compact('user', 'roles'));
     }
 
     /**
      * Update the user's profile information.
      */
      public function update(UserUpdateRequest $request, $id_usuario)
      {
          $user = User::find($id_usuario);
          $user->fill($request->validated());
      
          if ($user->isDirty('email')) {
              $user->email_verified_at = null;
          }
      
          $user->save();
      
          return redirect()->route('admin.users.index')
              ->with('success', 'La información fue actualizada correctamente');
      }
      
 
 

    //   Actualizar el rol del usuario
    public function updateRole(Request $request, User $user)
      {
            $user->roles()->sync($request->roles);
          return redirect()->route('admin.users.index', ['color' => 'blue'])
              ->with('success', 'Los roles se actualizaron correctamente');
      }

     /**
      * Delete the user's account.
      */
      public function destroy($id_usuario)
      {
          $user = User::find($id_usuario)->delete();
      
          return redirect()->route('admin.users.index')
              ->with('success', 'El usuario fue eliminado con éxito');
      }
 }
 