<?php

namespace App\Http\Controllers;

use App\Models\Bus;
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

        return view('bus.index', compact('buses'))
            ->with('i', (request()->input('page', 1) - 1) * $buses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bus = new Bus();
        return view('bus.create', compact('bus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bus::$rules);

        $bus = Bus::create($request->all());

        return redirect()->route('buses.index')
            ->with('success', 'Bus created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bus = Bus::find($id);

        return view('bus.show', compact('bus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Bus::find($id);

        return view('bus.edit', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bus $bus)
    {
        request()->validate(Bus::$rules);

        $bus->update($request->all());

        return redirect()->route('buses.index')
            ->with('success', 'Bus updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bus = Bus::find($id)->delete();

        return redirect()->route('buses.index')
            ->with('success', 'Bus deleted successfully');
    }
}
