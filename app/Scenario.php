<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Prefab;

class Scenario extends Model
{
    //
    protected $fillable = [
        'name',
        'difficulty_rate',
        'uncertainty',
        'k_factor',
        'time_limit',

    ];


    public function prefabs()
    {
        return $this->belongsToMany(Prefab::class)->withTimeStamps();
    }
}
