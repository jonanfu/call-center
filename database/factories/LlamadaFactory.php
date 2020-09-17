<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Llamada;
use Faker\Generator as Faker;

$factory->define(Llamada::class, function (Faker $faker) {
    
    return [
        'user_id' => 1,
        'nombre_cliente' => $faker -> name,
        'telefono' => $faker -> phoneNumber,
        'email'=> $faker -> email,
        'direccion' => $faker -> city,
        'fecha' => $faker -> date($format = 'Y-m-d', $max = 'now'),
        'hora_inicio' => $faker -> time($format = 'H:i:s', $max = 'now'),
        'hora_fin' => $faker ->time($format = 'H:i:s', $max = 'now'),
        'asunto' => $faker -> text(100),
        'tipo_alerta' => $faker -> randomElement(array('Verde', 'Amarillo','Rojo')),
        'respuesta' => $faker -> text(100),
        'atendido' => $faker -> randomElement($array = array(true, false)),
        'nivel_satisfacion' => $faker -> numberBetween(1, 5),
        'observaciones'=> $faker -> text(100)
    ];
});
