<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoletaViaje;
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
        $boletas = BoletaViaje::paginate();
        return view('admin.boletas-viaje.index', compact('boletas'))
            ->with('i', (request()->input('page', 1) - 1) * $boletas->perPage());
    }

    public function create()
    {
        $boleta = new BoletaViaje();
        return view('admin.ruta.create', compact('boleta'));
    }

    public function store(Request $request)
    {
        $boleta = BoletaViaje::create($request->all());

        return redirect()->route('admin.boletas-viaje.indexx')
            ->with('success', 'Registro de Boleta creado exitosamente.');
    }
    public function show($id)
    {
        $boleta = BoletaViaje::find($id);

        return view('admin.boletas-viaje.show', compact('boleta'));
    }
    public function edit($id)
    {
        $boleta = BoletaViaje::find($id);

        return view('admin.boletas-viaje.edit', compact('boleta'));
    }
    public function update(Request $request, BoletaViaje $boleta)
    {
        $boleta->update($request->all());

        return redirect()->route('admin.boletas-viaje.index')
            ->with('success', 'Informacion de la boleta fue actualizada correctamente');
    }
    public function destroy($id)
    {
        $ruta = BoletaViaje::find($id)->delete();

        return redirect()->route('admin.boletas-viaje.index')
            ->with('success', 'La ruta fue eliminada correctamente');
    }
}
