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

<div class="container ">
            <div class="row">
                <div class="col-sm-12">
                <div class="card border-0">
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                - {{$error}} <br>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('llamada.reporte') }}" method="POST">
                        <div class="form-row align-items-center">
                            <div class="col-sm-3  align-self-center">
                                <label class="my-1 mr-2">Fecha Inicio</label>
                                <input type="date" name="fecha_inicio" id="fecha_inicion" class="form-control">
                            </div>
                            <div class="col-sm-3  align-self-center">
                                <label class="my-1 mr-2">Fecha Fin</label>
                                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
                            </div>
                            <div class="col-sm-3  align-self-center">
                                <label class="my-1 mr-2">Tipo de reporte</label>
                                <select name="tipo_reporte" id="tipo_reporte" class="custom-select form-control">
                                    <option value="1">Reporte general</option>
                                    <option value="2">Reporte por estudiante</option>
                                </select>
                            </div>
                            <div class="col-sm-3  align-self-center">
                                <label class="my-1 mr-2">Número de cedula</label>
                                <input type="text" name="buscar_cedula" id="buscar_cedula"class="form-control" placeholder="Cédula" disabled>
                            </div>
                            <div class="col-auto mx-auto my-3">
                                @csrf
                                <button type="submit" class="btn btn-primary form-control ">Generar Reporte</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </di>
        </div>
    </div>
</div>

<h1>Llamadas Registradas</h1>


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
    <td>Nivel de Alerta</td>
    <td>Respuesta</td>
    <td>Atendido</td>
    <td>Calificacion</td>
    <td>Observaciones</td>
    <td>Asunto</td>
  </tr>
  </thead>
  <thbody>
  @foreach($usuarios as $usuario)
  <tr>
 
  <td>{{$usuario->id}}</td>
  <td>{{$usuario->cedula}}</td>
    <td> {{$usuario->lastname}} {{$usuario->name}}</td>
    <td>{{$usuario->nombre_cliente}}</td>
    <td>{{$usuario->telefono}}</td>
    <td>{{$usuario->email}}</td>
    <td>{{ $usuario->ciudad }}</td>
    <td>{{$usuario->direccion}}</td>
    <td>{{$usuario->fecha}}</td>
    <td>{{$usuario->hora_inicio}}</td>
    <td>{{$usuario->hora_fin}}</td>
    <td>
        @switch($usuario->tipo_alerta)
            @case(1)
                Baja
                @break
            @case(2)
                Media
                @break
            @case(3)
                Alta
                @break
            @endswitch
    </td>
    <td>{{$usuario->respuesta}}</td>
    <td>
        @if( $usuario->atendido)
            Atendido
        @else
            No Atendido
        @endif
    </td>
    <td>{{$usuario->nivel_satisfacion}}</td>
    <td>{{$usuario->observaciones}}</td>
    <td>{{$usuario->asunto}}</td>
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

   <script src="{{ asset('js/reporte.js') }}"></script>
@endsection
