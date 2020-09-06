<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Prefab;
use App\Game;

class Scenario extends Model
{
    //
    protected $fillable = [
        'name',
        'difficulty_rate',
        'uncertainty',
        'k_factor',
        'time_limit',
        'time_taken',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }


    public function prefabs()
    {
        return $this->belongsToMany(Prefab::class)->withTimeStamps();
    }
}
