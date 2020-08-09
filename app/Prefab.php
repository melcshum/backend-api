<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefab extends Model
{
    protected $fillable = [
        'card_prefab_name', 'boss_can_use'
    ];
}
