<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Salones;
use Faker\Generator as Faker;

$factory->define(Salones::class, function (Faker $faker) {
    return [
        'nombre' => $this->faker->word
    ];
});
