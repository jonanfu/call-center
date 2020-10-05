@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Actualizar usuario') }}</div>

                <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombres</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname',$user->lastname) }}" required >
                            </div>
                        </div>

                       
                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">Cédula</label>

                            <div class="col-md-6">
                                <input id="cedula" size="10" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula',$user->cedula) }}" required >
                            </div>

                            @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>

                            <div class="col-md-6">
                                <input id="telefono"  type="tel" class="form-control" name="telefono" value="{{ old('telefono',$user->telefono) }}" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="carrera" class="col-md-4 col-form-label text-md-right">Carrera</label>
                                <div class="col-md-6">
                                    <select name="carrera" class="form-control" required>
                                        <option value="1" {{ old('carrera', $user->carrera) == 1  ? 'selected' : '' }}>Administración Pública</option>
                                        <option value="2" {{ old('carrera', $user->carrera) == 2  ? 'selected' : '' }}>Administración de Empresas</option>
                                        <option value="3" {{ old('carrera', $user->carrera) == 3  ? 'selected' : '' }}>Agropecuaria</option>
                                        <option value="4" {{ old('carrera', $user->carrera) == 4  ? 'selected' : '' }}>Alimentos</option>
                                        <option value="5" {{ old('carrera', $user->carrera) == 5  ? 'selected' : '' }}>Comercio Exterior</option>
                                        <option value="6" {{ old('carrera', $user->carrera) == 6  ? 'selected' : '' }}>Computación</option>
                                        <option value="7" {{ old('carrera', $user->carrera) == 7  ? 'selected' : '' }}>Enfermeria</option>
                                        <option value="8" {{ old('carrera', $user->carrera) == 8  ? 'selected' : '' }}>Logistica y Transporte</option>
                                        <option value="9" {{ old('carrera', $user->carrera) == 9  ? 'selected' : '' }}>Turismo</option>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="carrera" class="col-md-4 col-form-label text-md-right">Nivel</label>
                                <div class="col-md-6">
                                    <select name="nivel" class="form-control" required>
                                        <option value="1" {{ old('nivel', $user->nivel) == 1  ? 'selected' : '' }}>Primero</option>
                                        <option value="2" {{ old('nivel', $user->nivel) == 2  ? 'selected' : '' }}>Segundo</option>
                                        <option value="3" {{ old('nivel', $user->nivel) == 3  ? 'selected' : '' }}>Tercero</option>
                                        <option value="4" {{ old('nivel', $user->nivel) == 4  ? 'selected' : '' }}>Cuarto</option>
                                        <option value="5" {{ old('nivel', $user->nivel) == 5  ? 'selected' : '' }}>Quinto</option>
                                        <option value="6" {{ old('nivel', $user->nivel) == 6  ? 'selected' : '' }}>Sexto</option>
                                        <option value="7" {{ old('nivel', $user->nivel) == 7  ? 'selected' : '' }}>Séptimo</option>
                                        <option value="8" {{ old('nivel', $user->nivel) == 8  ? 'selected' : '' }}>Octavo</option>
                                        <option value="9" {{ old('nivel', $user->nivel) == 9  ? 'selected' : '' }}>Noveno</option>
                                        <option value="10" {{ old('nivel', $user->nivel) == 10  ? 'selected' : '' }}>Décimo</option>
                                        <option value="11" {{ old('nivel', $user->nivel) == 11  ? 'selected' : '' }}>No aplica</option>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="paralelo" class="col-md-4 col-form-label text-md-right">Paralelo</label>
                                <div class="col-md-6">
                                    <select name="paralelo" class="form-control" required>
                                        <option value="1" {{ old('paralelo', $user->paralelo) == 1  ? 'selected' : '' }}>AM</option>
                                        <option value="2" {{ old('paralelo', $user->paralelo) == 2  ? 'selected' : '' }}>AT</option>
                                        <option value="3" {{ old('paralelo', $user->paralelo) == 3  ? 'selected' : '' }}>BM</option>
                                        <option value="4" {{ old('paralelo', $user->paralelo) == 4  ? 'selected' : '' }}>BT</option>
                                        <option value="5" {{ old('paralelo', $user->paralelo) == 5  ? 'selected' : '' }}>CM</option>
                                        <option value="6" {{ old('paralelo', $user->paralelo) == 6  ? 'selected' : '' }}>CT</option>
                                        <option value="7" {{ old('paralelo', $user->paralelo) == 7  ? 'selected' : '' }}>No aplica</option>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">Rol</label>
                                <div class="col-md-5">
                                    <select name="rol" class="form-control" required>
                                        <option value="1" {{ old('rol', $user->rol) == 1  ? 'selected' : '' }}>Administrador</option>
                                        <option value="2" {{ old('rol', $user->rol) == 2  ? 'selected' : '' }}>Profesor</option>
                                        <option value="3" {{ old('rol', $user->rol) == 3  ? 'selected' : '' }}>Estudiante</option>
                                    </select>
                                </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar Registro') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
