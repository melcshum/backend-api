<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteractionDefinition extends Model
{
    protected $fillable = [
        'name', 'game_session_id'
    ];

    public function interaction_object()
    {
        return $this->belongsTo(InteractionObject::class);
    }
}
