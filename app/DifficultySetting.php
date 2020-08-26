<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DifficultySetting extends Model
{
    protected $fillable = [
        'rating', 'uncertainty', 'k_factor', 'play_count', 'type'
    ];

    public function interaction_object()
    {
        return $this->belongsTo(InteractionObject::class);
    }
}
