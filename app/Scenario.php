<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    //
    protected $fillable = [
        'scenario_name',
        'card_prefab_name',
        'difficulty_rate',
        'uncertainty',
        'k_factor',
        'time_limit',
        'boss_can_use',
    ];
}
