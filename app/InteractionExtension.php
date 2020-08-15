<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteractionExtension extends Model
{
    protected $fillable = [
        'name'
    ];

    public function interaction_result()
    {
        return $this->belongsTo(InteractionResult::class);
    }
}
