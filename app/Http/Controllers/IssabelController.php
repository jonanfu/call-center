<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssabelController extends Controller
{
    public function index()
    {

        $issabeles= \DB::connection('issabel')->table('cdr')-> get();
       // return $usuarios;
       return view('consultas.issabel',compact('issabeles'));
    }
}
