<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estudiantes;
use App\Salones;
use App\Materias;

use Faker\Generator as Faker;

$factory->define(Estudiantes::class, function (Faker $faker) {
    return [
      'nombre'=> $faker->name,
                 'matricula'=> $faker->word,
                 'apellido_paterno'=> $faker->word,
                 'apellido_materno'=> $faker->word,
                 'salon_id'=> Salones::all()->random()->id,
                 'materias_id'=> Materias::all()->random()->id
    ];
});
