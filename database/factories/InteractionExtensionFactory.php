<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InteractionExtension;
use Faker\Generator as Faker;

$factory->define(InteractionExtension::class, function (Faker $faker) {
    $faker->addProvider(new xAPISGFaker($faker));

    return [
        'name' =>  $faker->xApiProgressObject,
        'value' =>  $faker->randomDigit(),
    ];
});
