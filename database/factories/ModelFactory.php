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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Hall::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'user_id' => 1,
        'address' => $faker->name,
        'lat' => 6.6 . rand(1, 5000) .  3755 . rand(1, 5000) . 63 . rand(1, 5000),
        'lng' => 3.3 . rand(1, 5000) . 0 . rand(1, 5000) . 06 . rand(1, 500) . 80 . rand(1, 5000) . 6,
        'label' => $faker->name,
        'image' => $faker->imageUrl($width="200", $height="200", 'cats', true, 'TestImage')
    ];
});

$factory->define(App\Booking::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'hall_id' => 1,
        'user_email' => $faker->name,
        'user_name' => $faker->name,
        'user_name' => $faker->name,
        'user_phone' => $faker->name,
        "user_logo" => $faker->imageUrl($width="100", $height="100", 'cats', true, 'TestImage')
    ];
});
