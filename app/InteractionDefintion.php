<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteractionDefintion extends Model
{
    protected $fillable = [
        'name'
    ];

    public function interaction_Object()
    {
        return $this->belongsTo(InteractionObject::class);
    }
}
