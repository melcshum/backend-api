<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GameSession;
use Faker\Generator as Faker;

$factory->define(GameSession::class, function (Faker $faker) {
    return [
        'session' => $faker->uuid,
    ];
});
