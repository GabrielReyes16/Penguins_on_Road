<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)

    {
        request()->validate(User::$rules);

        $user = User::create($request->all());

        return redirect()->route('users.index')

            ->with('success', 'User created successfully.');

    }

    /**
     * Display the specified resource.
     *
    //  * @param  int $id
    //  * @return \Illuminate\Http\Response
     */
    public function show($id_usuario)
    {
        $user = User::find($id_usuario);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
    //  * @param  int $id
    //  * @return \Illuminate\Http\Response
     */

     public function edit($id_usuario)
     {
         $user = User::find($id_usuario);
 
         return view('user.edit', compact('user'));
     }
 
     /**
      * Update the user's profile information.
      */
      public function update(UserUpdateRequest $request, $id): RedirectResponse
      {
          $user = User::findOrFail($id);
          $user->fill($request->validated());
      
          if ($user->isDirty('email')) {
              $user->email_verified_at = null;
          }
      
          $user->save();
      
          return redirect()->route('users.index')
              ->with('success', 'Información actualizada correctamente');
      }
 
     /**
      * Delete the user's account.
      */
      public function destroy($id_usuario)
      {
          $user = User::find($id_usuario)->delete();
  
          return redirect()->route('users.index')
              ->with('success', 'Usuario eliminado con éxito');
      }
 }
 