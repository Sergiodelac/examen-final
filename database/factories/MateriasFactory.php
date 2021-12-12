<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Materias;
use Faker\Generator as Faker;

$factory->define(Materias::class, function (Faker $faker) {
    return [
    'nombre' => $this->faker->word
    ];
});
