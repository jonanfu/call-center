<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Llamada;

class RegistroController extends Controller
{
    public function llamadas(){
        return view('llamadas',[
            'llamadas' => Llamada::with('user')->latest()->paginate()
        ]);

    }

    public function llamada(Llamada $llamada){
        return view('llamada', ['post' => $post]);
    }
}
