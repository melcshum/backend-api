<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefab extends Model
{
    protected $fillable = [
        'name',  'boss_can_use', 'is_enabled'
    ];


    public function scenarios()
    {
        return $this->belongsToMany('App\Scenario')->withTimeStamps();
    }

}
