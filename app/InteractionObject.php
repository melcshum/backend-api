<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteractionObject extends Model
{
    protected $fillable = [
        'name'
    ];

    public function interaction()
    {
        return $this->belongsTo(Interaction::class);
    }

    public function interaction_definition()
    {
        return $this->hasOne(InteractionDefinition::class);
    }

}
