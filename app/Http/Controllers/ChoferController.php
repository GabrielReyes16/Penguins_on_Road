<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use Illuminate\Http\Request;

/**
 * Class ChofereController
 //* @package App\Http\Controllers
 */
class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $choferes = Chofer::paginate();

        return view('chofere.index', compact('choferes'))
            ->with('i', (request()->input('page', 1) - 1) * $choferes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     //* @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chofere = new Chofer();
        return view('chofer.create', compact('chofere'));
    }

    /**
     * Store a newly created resource in storage.
     *
     //* @param  \Illuminate\Http\Request $request
     //* @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Chofer::$rules);

        $chofere = Chofer::create($request->all());

        return redirect()->route('choferes.index')
            ->with('success', 'Chofere created successfully.');
    }

    /**
     * Display the specified resource.
     *
     //* @param  int $id
     //* @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chofere = Chofer::find($id);

        return view('chofere.show', compact('chofere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     //* @param  int $id
    // * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chofere = Chofer::find($id);

        return view('chofere.edit', compact('chofere'));
    }

    /**
     * Update the specified resource in storage.
     *
    // * @param  \Illuminate\Http\Request $request
    // * @param  Chofere $chofere
     //* @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chofer $chofer)
    {
        request()->validate(Chofer::$rules);

        $chofer->update($request->all());

        return redirect()->route('choferes.index')
            ->with('success', 'Chofere updated successfully');
    }

    /**
     //* @param int $id
     //* @return \Illuminate\Http\RedirectResponse
     //* @throws \Exception
     */
    public function destroy($id)
    {
        $chofere = Chofer::find($id)->delete();

        return redirect()->route('choferes.index')
            ->with('success', 'Chofere deleted successfully');
    }
}
