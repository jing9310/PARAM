<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'content_id' => $faker->numberBetween(1,15),
        'reply_body' => $faker->realText,
        'comment_id' => $faker->numberBetween(1,15),
        'user_id' => $faker->numberBetween(1,5),
    ];
});
