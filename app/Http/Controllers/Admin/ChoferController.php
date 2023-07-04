<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Bus;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Chofer;
use Illuminate\Http\Request;
class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $choferes = Chofer::paginate(5);
    
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
 
         $user = User::create($request->all());
 
         return redirect()->route('choferes.index')
 
             ->with('success', 'Chofer creado exitosamente.');
 
     }
     
     public function show($id)
     {
        $chofer = Chofer::find($id);
         return view('chofer.show', compact('chofer'));
     }
     
     public function edit($id)
     {
        $chofer = Chofer::find($id);
        $buses = Bus::all();
        $empresas = Empresa::all();
     
         return view('chofer.edit', compact('chofer','buses','empresas'));
     }
     
     public function update(Request $request, $id)
     {
        $chofer = Chofer::find($id);
        $chofer->id_bus = $request->input('id_bus');
        $chofer->id_empresa = $request->input('id_empresa');
        $chofer->licencia_conducir = $request->input('licencia_conducir');
         $chofer->save();
         return redirect()->route('choferes.index')->with('success', 'La información fue actualizada correctamente');
     }
     
     public function destroy($id)
     {
         $chofer = Chofer::find($id);
         $chofer->delete();
         return redirect()->route('choferes.index')->with('success', 'El chofer fue eliminado con éxito');
     }}
     
     
     
     
     
     
     