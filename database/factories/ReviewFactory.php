<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'stars' => $faker->numberBetween(1, 10),
        'content' => $faker->paragraphs(1, true)
    ];
});
