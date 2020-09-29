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
        $llamadas = Llamada::orderBy('id', 'DESC')
            ->where('user_id', auth()->user()->id)
            ->paginate();

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
    public function store(LlamadaRequest $request)
    {
        //dd(['user_id' => auth() -> user()] + $request->all());

        //dd($request);

        $llamada = Llamada::Create([
            'user_id' => auth()->user()->id,
            'atendido' => $request->atendido == 'si' ? true : false
        ] + $request->all());

       

//        if($request->atendido){
//            $llamada->atendido = true;
//            $llamada->save();
//        } else {
//            $llamada->atendido = false;
//            $llamada->save();
//        }

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
        //dd($llamada);
        return view('llamadas.edit', compact('llamada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Llamada  $llamada
     * @return \Illuminate\Http\Response
     */
    public function update(LlamadaRequest $request, Llamada $llamada)
    {
        $llamada->update([ 'atendido' => $request->atendido == 'si' ? true : false] + $request->all());
        return back()->with('status', 'Se ha actualzado el registro de la llamada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Llamada  $llamada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Llamada $llamada)
    {
        $llamada->delete();
        return back()->with('status', 'Se ha eliminado el registro de llamada');
    }
}
