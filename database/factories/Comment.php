<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content_id' => $faker->numberBetween(1,15),
        'comment' => $faker->realText,
        'doctor_id' => $faker->numberBetween(1,5),
    ];
});
