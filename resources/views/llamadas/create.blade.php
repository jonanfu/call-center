@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Registro</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{ route('llamadas.store') }}" 
                        method="POST"
                        >
                            <div class="form-group">
                                <label>Nombre Completo *</label>
                                <input type="text" name='nombre_cliente' class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Telefono *</label>
                                <input type="tel" name='telefono' class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" name='email' class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Ciudad *</label>
                                <input type="text" name='ciudad' class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Direccion *</label>
                                <input type="text" name='direccion' class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Fecha *</label>
                                <input type="date" name='fecha' class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Hora Inicio *</label>
                                <input type="time" name='hora_inicio' class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Hora Fin *</label>
                                <input type="time" name='hora_fin' class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Asunto *</label>
                                <textarea name="asunto" rows="6" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nivel de Alerta *</label>
                                <select name="tipo_alerta" class="form-group" required>
                                    <option value="1">Baja</option>
                                    <option value="2">Media</option>
                                    <option value="3">Alta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Respuesta *</label>
                                <textarea name="respuesta" rows="6" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Atendido *</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input checked type="radio" id="si" name="atendido" class="custom-control-input" value="si">
                                    <label class="custom-control-label" for="si">Si</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="no" name="atendido" class="custom-control-input" value="no">
                                    <label class="custom-control-label" for="no">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nivel de Satisfación *</label>
                                <select name="nivel_satisfacion" class="form-group" required>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group" required>
                                <label>Observaciones *</label>
                                <textarea name="observaciones" rows="6" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                @csrf
                                <input type="submit" value="Enviar" class="btn btn-primary btn-sm">
                            </div>
                            
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
