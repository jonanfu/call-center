<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Llamada extends Model
{
    protected $fillable = [
        'nombre_cliente', 'telefono', 'email', 'direccion',
        'fecha', 'hora_inicio', 'hora_fin', 'asunto',
        'tipo_alerta', 'respuesta', 'atendido', 'nivel_satisfacion',
        'observaciones', 'user_id'
    ];

   public function user(){
       return $this->belongsTo(User::class);
   }
}
