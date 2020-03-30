<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    // $filePath = storage_path('images');
    $filePath = public_path('storage\images');

    return [

        'path' => 'https://source.unsplash.com/600x400/?nature,water'
    ];
});
