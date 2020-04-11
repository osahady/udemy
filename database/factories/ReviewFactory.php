<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    if (rand(1,5) > 1) {
        
        return [
            'stars' => $faker->numberBetween(7, 10),
            'content' => $faker->paragraphs(1, true)
        ];
    }else{
        return [
            'stars' => $faker->numberBetween(1, 6),
            'content' => $faker->paragraphs(1, true)
        ];
    }
});
