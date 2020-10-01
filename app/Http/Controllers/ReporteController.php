<?php

namespace App\Http\Controllers;
use App\Llamada;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(){
        $llamadas = Llamada::orderBy('id', 'DESC')
            ->where('user_id', auth()->user()->id)->paginate();

        return view('reportes.index', compact('llamadas'));
    }
}
