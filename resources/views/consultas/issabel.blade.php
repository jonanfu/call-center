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

<h1>Registro de Issabel</h1>


<div class="card">
<div class="cardbody">

<table id="llamadas">
<thead>
<tr>
  <td>Fecha</td>
  <td>extension</td>
    <td>Origen</td>
    <td>Destino</td>
    <td>Contexto</td>
    <td>Duracion</td>
    
  </tr>
  </thead>
  <thbody>
  @foreach($issabeles as $issabel)
  <tr>
 
  <td>{{$issabel->calldate}}</td>
  <td>{{$issabel->clid}}</td>
    <td>{{$issabel->src}}</td>
    <td>{{$issabel->dst}}</td>
    <td>{{$issabel->dcontext}}</td>
    <td>{{$issabel->billsec}}</td>
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