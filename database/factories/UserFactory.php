<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'resume' => $faker->paragraphs(2, true),
        'remember_token' => Str::random(10),
    ];
});

$factory->state(User::class, 'osama', function (Faker $faker) {
    return [
        'name' => 'Osama',
        'email' => 'osahady@gmail.com',
    ];
});
$factory->state(User::class, 'obada', function (Faker $faker) {
    return [
        'name' => 'Obada',
        'email' => 'o@o.com',
    ];
});
$factory->state(User::class, 'teacher', function (Faker $faker) {
    return [
        'name' => 'Teacher',
        'email' => 't@t.com',
    ];
});
$factory->state(User::class, 'student', function (Faker $faker) {
    return [
        'name' => 'Student',
        'email' => 's@s.com',
    ];
});
