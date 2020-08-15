<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InteractionActor;
use Faker\Generator as Faker;

$factory->define(InteractionActor::class, function (Faker $faker) {
    $faker->addProvider(new xAPISGFaker($faker));

    return [
        'name' =>  $faker->xApiActor
    ];
});
