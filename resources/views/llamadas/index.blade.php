@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Registro de llamadas
                <a href="{{ route('llamadas.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <!--<th>Nombre cliente</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>Fecha</th>
                        <th>Hora inicio</th>
                        <th>Hora fin</th>
                        <th>Asunto</th>-->
                        <th>Tipo de alerta</th>
                        <!--<th>Respuesta</th>-->
                        <th>Atendido</th>
                        <th>Nivel de satisfación</th>
                        <!--<th>Observaciones</th>-->
                    </thead>
                    <tbody>
                        @foreach($llamadas as $llamada)
                        <tr>
                            <td>{{ $llamada->id }}</td>
                            <!--<td>{{ $llamada->nombre_cliente }}</td>
                            <td>{{ $llamada->telefono }}</td>
                            <td>{{ $llamada->email }}</td>
                            <td>{{ $llamada->direccion }}</td>-->
                            <!--<td>{{ $llamada->fecha }}</td>
                            <td>{{ $llamada->hora_inicio }}</td>
                            <td>{{ $llamada->hora_fin }}</td>
                            <td>{{ $llamada->asunto }}</td>-->
                            <td>{{ $llamada->tipo_alerta }}</td>
                            <!--<td>{{ $llamada->respuesta }}</td>-->
                            <td>@if( $llamada->atendido  == 1)
                                    Atendido
                                @else
                                    No Atendido
                                @endif
                            </td>
                            <td>{{ $llamada->nivel_satisfacion }}</td>
                            <!--<td>{{ $llamada->observaciones }}</td>-->
                            <td>
                                <a href="{{ route('llamadas.edit', $llamada) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('llamadas.destroy', $llamada)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input 
                                        type="submit" 
                                        value="Eliminar" 
                                        class="btn btn-danger btn-sm"
                                        onClick="return confirm('Desea eliminar el registro')"
                                        >
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection