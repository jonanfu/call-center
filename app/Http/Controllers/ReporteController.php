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
        $cedula = $request->buscar_cedula;
        switch($request->tipo_reporte){
            case 1:
                $llamadas = User::join('llamadas', 'users.id', '=', 'llamadas.user_id')
                ->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin])
                ->get();

                $pdf = \PDF::loadView('pdf.reporte_general', compact('llamadas', 'now', 'fecha_reporte'));
                return $pdf->stream('reporte.pdf');
                break;

            case 2:
                $llamadas = User::join('llamadas', 'users.id', '=', 'llamadas.user_id')
                ->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin])
                ->get();

                $pdf = \PDF::loadView('pdf.reporte_estudiante', compact('llamadas', 'now', 'fecha_reporte', 'cedula'));
                return $pdf->stream('reporte.pdf');
                break;
        }
    }
}
