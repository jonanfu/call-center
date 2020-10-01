@extends('layouts.app')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
<style type="text/css">
table{
    text-align: left;
    border-collapse:collapse;
    widht:100%;
}
th,td{

   padding:20px;
}
thead{
    font-weight: bold;
}
tr:nth-child(even){
    background-color: #ddd;
}
</style>
@section('content')

<h1>Reporte de llamadas</h1>


<div class="card">
<div class="cardbody">

<table id="llamadas">
<thead>
<tr>
  <td>Codigo</td>
  <td>Cedula del responsable</td>
    <td>Responsable</td>
    <td>Cliente</td>
    <td>Telefono</td>
    <td>Correo Electronico</td>
    <td>Ciudad</td>
    <td>Direccion</td>
    <td>Fecha</td>
    <td>Inicio de la llamada</td>
    <td>Fin de la llamada</td>
    <td>Tipo de Alerta</td>
    <td>Respuesta</td>
    <td>Atendido</td>
    <td>Calificacion</td>
    <td>Observaciones</td>
    <td>Asunto</td>
  </tr>
  </thead>
  <thbody>
  @foreach($llamadas as $llamada)
  <tr>
 
  <td>{{$llamada->id}}</td>
  <td>{{$llamada->user->cedula}}</td>
    <td> {{$llamada->user->full_name}}</td>
    <td>{{$llamada->nombre_cliente}}</td>
    <td>{{$llamada->telefono}}</td>
    <td>{{$llamada->email}}</td>
    <td>{{ $llamada->ciudad }}</td>
    <td>{{$llamada->direccion}}</td>
    <td>{{$llamada->fecha}}</td>
    <td>{{$llamada->hora_inicio}}</td>
    <td>{{$llamada->hora_fin}}</td>
    <td>
        @switch($llamada->tipo_alerta)
            @case(1)
                Verde
                @break
            @case(2)
                Amarillo
                @break
            @case(3)
                Verde
                @break
            @endswitch
    </td>
    <td>{{$llamada->respuesta}}</td>
    <td>
        @if( $llamada->atendido)
            Atendido
        @else
            No Atendido
        @endif
    </td>
    <td>{{$llamada->nivel_satisfacion}}</td>
    <td>{{$llamada->observaciones}}</td>
    <td>{{$llamada->asunto}}</td>
  </tr>
  @endforeach
  </thbody>
</table>
</div>

</div>

    
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

   <script>
    $('#llamadas').DataTable({
        responsive:true,
        autoWidth:false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search': 'Buscar registros: ',
            'paginate':{
                'next':'Siguiente',
            'previous':'Anterior'            }
        }
    }
      
    );
   </script>

   
@endsection