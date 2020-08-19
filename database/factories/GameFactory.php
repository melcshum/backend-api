<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [

        'name' => rtrim($faker->sentence(rand(2, 6)), "."),
        'desc' => $faker->paragraphs(rand(1, 3), true),
        'purpose' => $faker->paragraphs(rand(1, 2), true),

    ];
});
