@extends('layouts.app')

@section('content')
        <div class="container">
            <!--<div class="row">
                <div class="col-sm-8 ex-auto">
                <div class="card border-0 shadow">
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                - {{$error}} <br>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('users.store') }}" method="POST">
                        <div class="form-row">
                            <div class="col-sm-3">
                                <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name')}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email')}}">
                            </div>
                            <div class="col-sm-3">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="col-auto">
                                @csrf
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                    
                    </div>
                </div>-->
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cedula</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Carrera</th>
                            <th>Rol</th>
                            <th>&nbsp;</th>
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
                {{ $users -> links() }}
                </div>
            </div>
        </div>
@endsection