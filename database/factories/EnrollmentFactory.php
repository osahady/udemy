<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enrollment;
use Faker\Generator as Faker;

$factory->define(Enrollment::class, function (Faker $faker) {
    return [
        'reason' => $faker->sentence(10),
        'created_at' => $faker->dateTimeBetween('-3 months')
    ];
});
