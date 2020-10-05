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

<h1>Usuarios registrados</h1>


<div class="card">
<div class="cardbody">

<table id="llamadas" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cedula</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Carrera</th>
                            <th>Nivel</th>
                            <th>Paralelo</th>
                            <th>Rol</th>
                            
                        </tr>
                          
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user-> id }}</td>
                        <td>{{ $user-> name }}</td>
                        <td>{{ $user-> lastname }}</td>
                        <td>{{ $user-> cedula }}</td>
                        <td>{{ $user-> telefono }}</td>
                        <td>{{ $user-> email }}</td>
                        <td>
                            @switch($user->carrera)
                                @case(1)
                                Administración Pública
                                @break
                                @case(2)
                                Administración de Empresas
                                @break        
                                @case(3)
                                Agropecuaria
                                @break        
                                @case(4)
                                Alimentos
                                @break
                                @case(5)
                                Comercio Exterior
                                @break   
                                @case(6)
                                Computación
                                @break
                                @case(7)
                                Enfermeria
                                @break
                                @case(8)
                                Logistica y Transporte
                                @break
                                @case(9)
                                Turismo
                                @break
                            @endswitch
                        </td>
                        <td>
                            @switch($user->nivel)
                                @case(1)
                                Primero
                                @break
                                @case(2)
                                Segundo
                                @break        
                                @case(3)
                                Tercero
                                @break        
                                @case(4)
                                Cuarto
                                @break
                                @case(5)
                                Quinto
                                @break   
                                @case(6)
                                Sexto
                                @break
                                @case(7)
                                Séptimo
                                @break
                                @case(8)
                                Octavo
                                @break
                                @case(9)
                                Noveno
                                @break
                                @case(10)
                                Décimo
                                @break
                                @case(11)
                                No aplica
                                @break
                            @endswitch
                        </td>
                        <td>
                            @switch($user->paralelo)
                                @case(1)
                                AM
                                @break
                                @case(2)
                                AT
                                @break        
                                @case(3)
                                BM
                                @break        
                                @case(4)
                                BT
                                @break
                                @case(5)
                                CM
                                @break   
                                @case(6)
                                CT
                                @break
                                @case(7)
                                No aplica
                                @break
                            @endswitch
                        </td>
                        <td>
                            @switch($user->rol)
                                @case(1)
                                    Administrador
                                @break
                                @case(2)
                                    Profesor
                                @break
                                @case(3)
                                    Estudiante
                                @break
                            @endswitch
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input 
                                    type="submit" 
                                    value="Eliminar" 
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Deseha eliminar... ?')">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
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
