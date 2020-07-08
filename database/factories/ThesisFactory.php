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

$factory->define(App\Models\Thesis::class, function (Faker\Generator $faker) {
    return [
        'type' => $faker->numberBetween(1,2),
        'clasification' => $faker->word(),
        'title' => $faker->sentence(5),
        'year' => (string)$faker->year($max = 'now'),
        'school_id' => $faker->numberBetween(1,50),
        'editorial_id' => $faker->numberBetween(1,20),
        'stand_id' => $faker->numberBetween(1,10),
        'adviser' => $faker->name,
        'extension' => (string)$faker->numberBetween(100,300),
        'observations' => $faker->sentence(5),
        'accompaniment' => $faker->sentence(5),
        'content' => $faker->text(200),
        'summary' => $faker->text(200),
        'recomendations' => $faker->text(200),
        'conclusions' => $faker->text(200),
        'bibliography' => $faker->text(200),
        'keywords' => $faker->text(20),
        'mention' => $faker->randomElement(['bachiller','titulo','maestria','doctorado']),
    ];
});
