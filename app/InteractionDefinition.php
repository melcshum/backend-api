<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteractionDefinition extends Model
{
    protected $fillable = [
        'name', 'game_session_id'
    ];

    protected $appends = [
        'short_name'
    ];


    public function interaction_object()
    {
        return $this->belongsTo(InteractionObject::class);
    }
    public function getShortNameAttribute()
    {

        $array = explode('/', $this->name);
        return  end($array);

    }
}
