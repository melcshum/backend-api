<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteractionActor extends Model
{
    protected $fillable = [
        'name'
    ];


    public function interaction()
    {

        return $this->belongsTo(Interaction::class);
    }
}
