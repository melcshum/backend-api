<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Interaction;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Interaction::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
