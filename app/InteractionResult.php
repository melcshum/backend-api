<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteractionResult extends Model
{
    protected $fillable = [
        'name'
    ];

    public function interaction()
    {
        return $this->belongsTo(Interaction::class);
    }

    public function interaction_extensions()
    {
        return $this->hasMany(InteractionExtension::class);
    }


}
