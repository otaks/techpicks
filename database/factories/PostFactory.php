<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'url'             => $faker->url,
        'title'           => $faker->sentence,
        'description'     => $faker->paragraph,
        'is_picked_count' => 1,
        'image'           => $faker->imageUrl(),
    ];
});
