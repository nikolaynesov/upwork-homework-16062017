<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Cleaner::class, function (Faker\Generator $faker) {

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'quality_score' => mt_rand(0,5),
        'available_from' => mt_rand(10,12).':00:00',
        'available_to' => mt_rand(13,24).':00:00'
    ];

});
