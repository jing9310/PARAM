<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Doctor;
use Faker\Generator as Faker;

$factory->define(Doctor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'kana' => $faker->kanaName,
        'nickname' => $faker->firstName,
        'gender' => $faker->randomElement($array=['1', '2', '3']),
        'birthday' => $faker->dateTimeBetween('-65 years', '-18years')->format('Y-m-d'),
        'specialty' => $faker->text(20),
        'doctors_history' => $faker->numberBetween(1,15),
        'self_introduction' => $faker->realText,
        'sport_id' => $faker->numberBetween(1,15),
        'place_id' => $faker->numberBetween(1,50),
        'remember_token' => Str::random(10),
    ];
});
