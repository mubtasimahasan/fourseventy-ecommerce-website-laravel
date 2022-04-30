<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween($min = 50, $max = 100),
        'title' => $faker->sentence($nbWords = 3, $variableNbWords = true), 
        'body' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'user_id' => $faker->numberBetween($min = 50, $max = 100),
        'cover_image' => 'noimage.jpg',
    ];
});
