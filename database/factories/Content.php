<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Content;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(20),
        'body' => $faker->realText,
        'del_flg' => $faker->numberBetween(1,2),
        'user_id' => $faker->numberBetween(1,15),
    ];
});
