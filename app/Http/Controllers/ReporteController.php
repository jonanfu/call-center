<?php

namespace App\Http\Controllers;
use App\Llamada;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
// use Barryvdh\DomPDF\Facade as PDF;
//use Barryvdh\Snappy\Facades\SnappyPdf as PDF;


class ReporteController extends Controller
{
    public function index(){
        $llamadas = Llamada::orderBy('id', 'DESC')
            ->where('user_id', auth()->user()->id)->paginate();

        return view('reportes.index', compact('llamadas'));
    }


 
    public function verReporte(Request $request){
        //obtener la fecha
        $now = Carbon::now();
        $fecha_reporte = ['fecha_inicio' => $request->fecha_inicio, 'fecha_fin' => $request->fecha_fin];
        

        //$llamadas = Llamada::join('users','llamadas.user_id','=','users.id')
        //    ->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin])
        //    ->get()
        //;

        $llamadas = User::join('llamadas', 'users.id', '=', 'llamadas.user_id')
            ->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin])
            ->get();
        //dd($llamadas);
        //return view('pdf.llamadas', compact('llamadas'));

        $pdf = \PDF::loadView('pdf.llamadas', compact('llamadas', 'now', 'fecha_reporte'));
       // $pdf->setOptions(['isRemoteEnabled' => True]);
        return $pdf->stream('reporte.pdf');
    }
}
