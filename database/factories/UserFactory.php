<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'password' => '$2y$10$tHx5Ubxmap52ZoRHF0MBKOAgT8YTsU6IO2QVvRytx/xWdR9TmF2ra', // secret
        'remember_token' => str_random(10),
        'yetki'=>'admin,'
    ];
});
