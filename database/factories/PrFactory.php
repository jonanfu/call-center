<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\pr;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(pr::class, function (Faker $faker) {
    return [
        //
        'name' => $faker -> name
    ];
});
