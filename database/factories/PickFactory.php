<?php

use Faker\Generator as Faker;
use App\User;
use App\Pick;

$factory->define(App\Pick::class, function (Faker $faker) {
    return [
        'comment'        => $faker->realText(),
        'is_liked_count' => 1,
    ];
});
