<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lecture;
use Faker\Generator as Faker;

$factory->define(Lecture::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'duration' => $faker->time('i:s'),
        'created_at' => $faker->dateTimeBetween('-3 months')
    ];
});
