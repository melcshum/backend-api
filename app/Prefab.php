<?php

namespace App;

use App\Scenario;
use Illuminate\Database\Eloquent\Model;

class Prefab extends Model
{
    protected $fillable = [
        'name',  'boss_can_use', 'is_enabled'
    ];


    public function scenarios()
    {
        return $this->belongsToMany(Scenario::class)->withTimeStamps();
    }


}
