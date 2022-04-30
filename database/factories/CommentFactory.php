<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween($min = 50, $max = 100),
        'user_id' => $faker->numberBetween($min = 50, $max = 100),
        'post_id' => $faker->numberBetween($min = 50, $max = 100),
        'parent_id' => $faker->numberBetween($min = 50, $max = 100),
        'body' =>  $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});
