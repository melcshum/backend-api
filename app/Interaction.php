<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InteractionAction;

class Interaction extends Model
{
    protected $fillable = [
        'verb'
    ];
    public function interaction_actor()
    {
        return $this->hasOne(InteractionActor::class);
    }

    public function interaction_action()
    {
        return $this->hasOne(InteractionAction::class);
    }

    public function interaction_object()
    {
        return $this->hasOne(InteractionObject::class);
    }


    public function interaction_result()
    {
        return $this->hasOne(InteractionResult::class);
    }


}
