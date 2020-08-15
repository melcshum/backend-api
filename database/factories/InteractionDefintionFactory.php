<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InteractionDefintion;
use Faker\Generator as Faker;

$factory->define(InteractionDefintion::class, function (Faker $faker) {
    $faker->addProvider(new xAPISGFaker($faker));

    return [
        'name' =>  $faker->xApiDefintion,
    ];
});
