<?php

namespace App\Http\Controllers;

use App\Models\Viaje;
use Illuminate\Http\Request;

/**
 * Class ViajeController
 * @package App\Http\Controllers
 */
class ViajeController extends Controller
{
    public function index()
    {
        $viajes = Viaje::paginate();

        return view('viaje.index', compact('viajes'))
            ->with('i', (request()->input('page', 1) - 1) * $viajes->perPage());
    }
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $viaje = new Viaje();
        return view('viaje.create', compact('viaje'));
    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $viaje = Viaje::create($request->all());

        return redirect()->route('viajes.index')
            ->with('success', 'Viaje created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $viaje = Viaje::find($id);

        return view('viaje.show', compact('viaje'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $viaje = Viaje::find($id);
        return view('viaje.edit', compact('viaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Viaje $viaje)
    {
        $viaje->update($request->all());

        return redirect()->route('viajes.index')
            ->with('success', 'Viaje updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $viaje = Viaje::find($id)->delete();

        return redirect()->route('viajes.index')
            ->with('success', 'Viaje deleted successfully');
    }
}
