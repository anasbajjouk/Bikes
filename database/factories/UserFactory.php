<?php

use Faker\Generator as Faker;

use Illuminate\Support\Facades\Request;

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'gender' => "Male",
        'role' => "admin",
        'subscriber' => "1",
        'address' => $faker->address,
        'remember_token' => str_random(10),
    ];
});
