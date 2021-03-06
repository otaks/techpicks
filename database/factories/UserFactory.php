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
        'facebook_id'    => null,
        'first_name'     => $faker->firstName,
        'last_name'      => $faker->lastName,
        'birthday'       => $faker->dateTimeBetween('-80 years', '-20years')->format('Y-m-d'),
        'gender'         => $faker->randomElement(array(0,1)),
        'job_title'      => $faker->jobTitle,
        'email'          => $faker->unique()->safeEmail,
        'password'       => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
