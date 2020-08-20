<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Interaction;

class InteractionAction extends Model
{
    protected $fillable = [
        'name'
    ];



    public function interaction()
    {
        return $this->belongsTo(Interaction::class);
    }
}
