<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        

        $usuarios= \DB::table('users')->join('llamadas','users.id','=','llamadas.user_id')
        ->select('users.cedula AS cedula','users.lastname','users.name','llamadas.*')-> get();
       // return $usuarios;
       //dd($usuarios);
       return view('consultas.consulta',compact('usuarios'));
    }
}
