<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\InteractionResult;

$factory->define(InteractionResult::class, function (Faker $faker) {
    $faker->addProvider(new xAPISGFaker($faker));

    return [
        'name' =>  $faker->xApiResult
    ];
});
