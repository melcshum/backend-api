<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Interaction;
use Faker\Generator as Faker;

$factory->define(Interaction::class, function (Faker $faker) {
    $type = collect(['Accessible', 'Alternative', 'Completable', 'GameObject'])->random();

    return [
        'name' => App\Profile::all()->random()->name,
        'type' => $type,
        'game_session_id' => App\GameSession::all('id')->random()->id,
    ];
});
