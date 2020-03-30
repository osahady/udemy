<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use App\User;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'teacher_id' => factory(User::class)->create(),
        'category_id' => rand(1,9) ,
        'title' => $faker->sentence(10),
        'description' => $faker->paragraphs(3, true),
        'created_at' => $faker->dateTimeBetween('-3 months')
    ];
});
