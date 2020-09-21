<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Llamada;
use App\Http\Requests\LlamadaRequest;

class LlamadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('llamadas',[
          //  'llamadas' => Llamada::with()->latest()->paginate()
       // ]);
        $llamadas = Llamada::latest()->get();

        return view('llamadas.index', compact('llamadas'));
        //return dd($llamadas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('llamadas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $llamada = Llamada::Create([
            'user_id' => auth()->user()->id
        ] + $request->all());

        return back()->with('status', 'Creado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Llamada  $llamada
     * @return \Illuminate\Http\Response
     */
    public function show(Llamada $llamada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Llamada  $llamada
     * @return \Illuminate\Http\Response
     */
    public function edit(Llamada $llamada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Llamada  $llamada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Llamada $llamada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Llamada  $llamada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Llamada $llamada)
    {
        //
    }
}
