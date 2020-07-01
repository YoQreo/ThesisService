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

$factory->define(App\Models\ThesisCopy::class, function (Faker\Generator $faker) {
    return [
        'incomeNumber' => $faker->numberBetween(1,20),
        'barcode' => $faker->randomNumber($nbDigits = 6, $strict = true),
        'copy' => $faker->numberBetween(1,20),
        'status' => $faker->randomElement(['Prestado','En Espera','Deshabilitado','Disponible']),
        'thesis_id' => $faker->numberBetween(1,40),
    ];
});
