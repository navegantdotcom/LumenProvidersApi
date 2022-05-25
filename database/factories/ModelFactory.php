<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Provider::class, function (Faker\Generator $faker) {
    return [    
        'nombre' => $faker->name   ,
        'direccion' => $faker->address,
        'colonia' => $faker->text,
        'estado' => $faker->state,
        'cp' => $faker->postcode,        
        'rfc' => $faker->text,
        'telefono' => $faker->phoneNumber,
        'movil' => $faker->phoneNumber,
        'correo' => $faker->unique()->safeEmail,
        'contrato' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});
