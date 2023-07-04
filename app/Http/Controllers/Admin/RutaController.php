<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ruta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class RutaController
 * @package App\Http\Controllers
 */
class RutaController extends Controller
{
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
        $rutas = Ruta::paginate();

        return view('ruta.index', compact('rutas'))
            ->with('i', (request()->input('page', 1) - 1) * $rutas->perPage());
    }

    public function create()
    {
        $ruta = new Ruta();
        return view('ruta.create', compact('ruta'));
    }

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store(Request $request)
    {
        request()->validate(Ruta::$rules);

        $ruta = Ruta::create($request->all());

        return redirect()->route('rutas.index')
            ->with('success', 'Ruta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $ruta = Ruta::find($id);

        return view('ruta.show', compact('ruta'));
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit($id)
    {
        $ruta = Ruta::find($id);

        return view('ruta.edit', compact('ruta'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Ruta $ruta)
    {
        request()->validate(Ruta::$rules);

        $ruta->update($request->all());

        return redirect()->route('rutas.index')
            ->with('success', 'Ruta updated successfully');
    }

    /**

     */
    public function destroy($id)
    {
        $ruta = Ruta::find($id)->delete();

        return redirect()->route('rutas.index')
            ->with('success', 'Ruta deleted successfully');
    }
}
