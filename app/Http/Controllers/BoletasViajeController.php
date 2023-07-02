<?php

namespace App\Http\Controllers;

use App\Models\BoletasViaje;
use Illuminate\Http\Request;

/**
 * Class BoletasViajeController
 * @package App\Http\Controllers
 */
class BoletasViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boletasViajes = BoletasViaje::paginate();

        return view('boletas-viaje.index', compact('boletasViajes'))
            ->with('i', (request()->input('page', 1) - 1) * $boletasViajes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $boletasViaje = new BoletasViaje();
        return view('boletas-viaje.create', compact('boletasViaje'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BoletasViaje::$rules);

        $boletasViaje = BoletasViaje::create($request->all());

        return redirect()->route('boletas-viajes.index')
            ->with('success', 'BoletasViaje created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boletasViaje = BoletasViaje::find($id);

        return view('boletas-viaje.show', compact('boletasViaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $boletasViaje = BoletasViaje::find($id);

        return view('boletas-viaje.edit', compact('boletasViaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BoletasViaje $boletasViaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoletasViaje $boletasViaje)
    {
        request()->validate(BoletasViaje::$rules);

        $boletasViaje->update($request->all());

        return redirect()->route('boletas-viajes.index')
            ->with('success', 'BoletasViaje updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $boletasViaje = BoletasViaje::find($id)->delete();

        return redirect()->route('boletas-viajes.index')
            ->with('success', 'BoletasViaje deleted successfully');
    }
}
