<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\User;
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
        $buses = Bus::paginate(5);

        return view('bus.index', compact('buses'))
            ->with('i', (request()->input('page', 1) - 1) * $buses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    
     public function create()
     {
         $bus = new Bus();
         return view('bus.create', compact('bus'));
     }
 
     /**
      * Store a newly created resource in storage.

      */
     public function store(Request $request)
     {

 
         $bus = Bus::create($request->all());
 
         return redirect()->route('buses.index')
             ->with('success', 'Bus creado exitosamente.');
     }
 
     /**
      * Display the specified resource.
      */

     public function show($id_bus)
     {
         $bus = Bus::find($id_bus);
 
         return view('bus.show', compact('bus'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      */
     public function edit($id_bus)
     {
         $bus = Bus::find($id_bus);
 
         return view('turno.edit', compact('bus'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      */
     public function update(Request $request, Bus $bus)
     {
     
         $bus->update($request->all());
 
         return redirect()->route('buses.index')
             ->with('success', 'Informacion del bus actualizada con exito');
     }
 
     /**
      */
     public function destroy($id_bus)
     {
         $turno = Bus::find($id_bus)->delete();
 
         return redirect()->route('buses.index')
             ->with('success', 'Bus eliminado exitosamente');
     }
 }