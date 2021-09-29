<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Test;
use Faker\Generator as Faker;

$factory->define(Test::class, function (Faker $faker) {
    return [
        'nacionalidad' => $faker->jobTitle,
        'cedula'=> $faker->randomDigitNotNull,
        'nombre_pr'=> $faker->paragraph,
        'apellido_pr'=> $faker->paragraph
    ];
});
