<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ruta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class RutaController extends Controller
{
        public function index()
    {
        $rutas = Ruta::paginate();
        return view('admin.ruta.index', compact('rutas'))
            ->with('i', (request()->input('page', 1) - 1) * $rutas->perPage());
    }

    public function create()
    {
        $ruta = new Ruta();
        return view('admin.ruta.create', compact('ruta'));
    }

    public function store(Request $request)
    {
        $ruta = Ruta::create($request->all());

        return redirect()->route('admin.rutas.index')
            ->with('success', 'Registro de Ruta creado exitosamente.');
    }
    public function show($id)
    {
        $ruta = Ruta::find($id);

        return view('admin.ruta.show', compact('ruta'));
    }
    public function edit($id)
    {
        $ruta = Ruta::find($id);

        return view('admin.ruta.edit', compact('ruta'));
    }
    public function update(Request $request, Ruta $ruta)
    {
        $ruta->update($request->all());

        return redirect()->route('admin.rutas.index')
            ->with('success', 'Informacion de la ruta actualizada correctamente');
    }
    public function destroy($id)
    {
        $ruta = Ruta::find($id)->delete();

        return redirect()->route('admin.rutas.index')
            ->with('success', 'La ruta fue eliminada correctamente');
    }
}
