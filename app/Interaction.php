<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InteractionAction;

class Interaction extends Model
{
    protected $fillable = [
        'title', 'type', 'name'
    ];

    protected $appends = [
        'actor_name', 'action_name', 'object_name', 'definition_name', 'result_name',
        'result_extensions',
        'select',
        'drag',
        'click',
        'time_taken',
    ];

    //Attriubtes
    public function getActorNameAttribute()
    {
        return $this->interaction_actor->name;
    }

    public function getActionNameAttribute()
    {
        return $this->interaction_action->name;
    }

    public function getObjectNameAttribute()
    {
        return $this->interaction_object->name;
    }

    public function getDefinitionNameAttribute()
    {
        return $this->interaction_object->interaction_definition->name;
    }

    public function getResultNameAttribute()
    {
        return $this->interaction_result->name;
    }


    public function getResultExtensionsAttribute()
    {
        return $this->interaction_result->interaction_extensions;
    }

    public function getSessionAttribute()
    {
        return $this->game_session->session;
    }

    private function getDefinitionValue($def)
    {
        foreach ($this->interaction_result->interaction_extensions as $extension) {
            if ($extension->name == $def) {
                return $extension->value;
            }
        }
        return 0;
    }

    public function getTimeTakenAttribute()
    {
        return $this->getDefinitionValue('TimeTaken');
    }

    public function getSelectAttribute()
    {
        return $this->getDefinitionValue('Select');
    }

    public function getDragAttribute()
    {
        return $this->getDefinitionValue('Drag');
    }


    public function getClickAttribute()
    {
        return $this->getDefinitionValue('Click');
    }
    // relationship

    public function game_session()
    {
        return $this->belongsTo(GameSession::class);
    }

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
