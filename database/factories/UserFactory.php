<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'kana' => $faker->kanaName,
        'nickname' => $faker->firstName,
        'gender' => $faker->randomElement($array=['1', '2', '3']),
        'birthday' => $faker->dateTimeBetween('-65 years', '-18years')->format('Y-m-d'),
        'height' => $faker->numberBetween(140,190),
        'weight' => $faker->numberBetween(50,90),
        'active' => $faker->randomElement(['1', '2']),
        'sport_id' => $faker->numberBetween(1,15),
        'place_id' => $faker->numberBetween(1,50),
        'remember_token' => Str::random(10),
    ];
});
