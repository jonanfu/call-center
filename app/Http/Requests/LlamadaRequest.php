<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LlamadaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre_cliente' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'direccion' => 'required',
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'asunto' => 'required',
            'tipo_alerta' => 'required',
            'respuesta' => 'required',
            'atendido' => 'required',
            'nivel_satisfacion' => 'required',
            'observaciones' => 'required'
        ];
    }
}
