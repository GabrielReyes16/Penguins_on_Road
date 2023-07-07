<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Chofer;
use App\Models\Empresa;
use Illuminate\Http\Request;

/**
 * Class BusController
 * @package App\Http\Controllers
 */
class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Bus::paginate();

        return view('admin.bus.index', compact('buses'))
            ->with('i', (request()->input('page', 1) - 1) * $buses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    
     public function create()
     {
        $empresas = Empresa::all();
        $choferes  = Chofer::all();
         $bus = new Bus();
         return view('admin.bus.create', compact('bus', 'empresas','choferes'));
     }
 
     /**
      * Store a newly created resource in storage.

      */
     public function store(Request $request)
     {

 
         $bus = Bus::create($request->all());
 
         return redirect()->route('admin.buses.index')
             ->with('success', 'Registro de bus creado exitosamente.');
     }
 
     /**
      * Display the specified resource.
      */

     public function show($id)
     {
         $bus = Bus::find($id);
 
         return view('admin.bus.show', compact('bus'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      */
     public function edit($id_bus)
     {
        $empresas = Empresa::all();
        $choferes  = Chofer::all();
         $bus = Bus::find($id_bus);
 
         return view('admin.bus.edit', compact('bus', 'empresas', 'choferes'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      */
     public function update(Request $request, Bus $bus)
     {
     
         $bus->update($request->all());
 
         return redirect()->route('admin.buses.index')
             ->with('success', 'Informacion del bus actualizada con exito');
     }
 
     /**
      */
     public function destroy($id_bus)
     {
         $turno = Bus::find($id_bus)->delete();
 
         return redirect()->route('admin.buses.index')
             ->with('success', 'Bus eliminado exitosamente');
     }
 }