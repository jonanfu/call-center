<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {

        $usuarios= \DB::table('users')->join('llamadas','users.id','=','llamadas.user_id')
        ->select('users.id AS cedula','users.name','llamadas.*')-> get();
       // return $usuarios;
       return view('consultas.consulta',compact('usuarios'));
    }
}
