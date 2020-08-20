<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InteractionDefinition;
use Faker\Generator as Faker;

$factory->define(InteractionDefinition::class, function (Faker $faker) {
    $faker->addProvider(new xAPISGFaker($faker));

    return [
        'name' =>  $faker->xApiDefinition,
    ];
});
