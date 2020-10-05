@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Registro</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{ route('llamadas.update', $llamada) }}" 
                        method="POST"
                        >
                            <div class="form-group">
                                <label>Nombre Completo *</label>
                                <textarea name="nombre_cliente" class="form-control"  rows="1">{{ old('nombre_cliente', $llamada->nombre_cliente) }}</textarea>
                                <!--<input type="text" name='nombre_cliente' class="form-control" size="60" required value={{ old('nombre_cliente', $llamada->nombre_cliente) }}>-->
                            </div>
                            <div class="form-group">
                                <label>Telefono *</label>
                                <input type="tel" name='telefono' class="form-control" required value={{ old('telefono', $llamada->telefono) }}>
                            </div>
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" name='email' class="form-control" value={{ old('email', $llamada->email) }}>
                            </div>
                            <div class="form-group">
                                <label>Ciudad *</label>
                                <textarea name="ciudad" class="form-control" rows="1" required>{{ old('ciudad', $llamada->ciudad) }}</textarea>
                                <!--<input type="text" name='direccion' class="form-control" required value={{ old('direccion', $llamada->direccion) }}>-->
                            </div>
                            <div class="form-group">
                                <label>Dirección *</label>
                                <textarea name="direccion" class="form-control" rows="1">{{ old('direccion', $llamada->direccion) }}</textarea>
                                <!--<input type="text" name='direccion' class="form-control" required value={{ old('direccion', $llamada->direccion) }}>-->
                            </div>
                            <div class="form-group">
                                <label>Fecha *</label>
                                <input type="date" name='fecha' class="form-control" required value={{ old('fecha', $llamada->fecha) }}>
                            </div>
                            <div class="form-group">
                                <label>Hora Inicio *</label>
                                <input type="time" name='hora_inicio' class="form-control" required value={{ old('hora_inicio', $llamada->hora_fin) }}>
                            </div>
                            <div class="form-group">
                                <label>Hora Fin *</label>
                                <input type="time" name='hora_fin' class="form-control" required value={{ old('hora_fin', $llamada->hora_fin) }}>
                            </div>
                            <div class="form-group">
                                <label>Asunto *</label>
                                <textarea name="asunto" rows="6" class="form-control" required>{{ old('asunto', $llamada->asunto) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nivel de Alerta *</label>
                                <select name="tipo_alerta" class="form-group" value={{ old('tipo_alerta', $llamada->tipo_alerta) }}>
                                    <option value="1" {{ old('tipo_alerta', $llamada->tipo_alerta) == "1"  ? 'selected' : '' }}>Baja</option>
                                    <option value="2" {{ old('tipo_alerta', $llamada->tipo_alerta) == "2"  ? 'selected' : '' }}>Media</option>
                                    <option value="3" {{ old('tipo_alerta', $llamada->tipo_alerta) == "3"  ? 'selected' : '' }}>Alta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Respuesta *</label>
                                <textarea name="respuesta" rows="6" class="form-control" required >{{ old('respuesta', $llamada->respuesta) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Atendido *</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="si" name="atendido" class="custom-control-input" value="si" {{ old('atendido', $llamada->atendido) ? 'checked' : '' }} >
                                    <label class="custom-control-label" for="si">Si</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="no" name="atendido" class="custom-control-input" value="no" {{ old('atendido', $llamada->atendido)  ? '' : 'checked' }}>
                                    <label class="custom-control-label" for="no">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nivel de Satisfación *</label>
                                <select name="nivel_satisfacion" class="form-group" required>
                                    <option value="5" {{ old('nivel_satisfacion', $llamada->nivel_satisfacion) === 5  ? 'selected' : '' }}>5</option>
                                    <option value="4" {{ old('nivel_satisfacion', $llamada->nivel_satisfacion) === 4  ? 'selected' : '' }}>4</option>
                                    <option value="3" {{ old('nivel_satisfacion', $llamada->nivel_satisfacion) === 3  ? 'selected' : '' }}>3</option>
                                    <option value="2" {{ old('nivel_satisfacion', $llamada->nivel_satisfacion) === 2  ? 'selected' : '' }}>2</option>
                                    <option value="1" {{ old('nivel_satisfacion', $llamada->nivel_satisfacion) === 1  ? 'selected' : '' }}>1</option>
                                </select>
                            </div>
                            <div class="form-group" required>
                                <label>Observaciones *</label>
                                <textarea name="observaciones" rows="6" class="form-control" required>{{ old('observaciones', $llamada->observaciones) }}</textarea>
                            </div>
                            <div class="form-group">
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Enviar" class="btn btn-primary btn-sm">
                            </div>
                            
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
