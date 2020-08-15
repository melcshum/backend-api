<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InteractionAction;
use Faker\Generator as Faker;

$factory->define(InteractionAction::class, function (Faker $faker) {
    $faker->addProvider(new xAPISGFaker($faker));

    return [
        'name' =>  $faker->xApiVerb
    ];
});
