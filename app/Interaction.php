<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InteractionAction;

class Interaction extends Model
{
    protected $fillable = [
        'title', 'type', 'name', 'game_session_id'
    ];

    protected $appends = [
        'actor_name', 'action_name', 'object_name', 'definition_name', 'short_name', 'result_name', 'result_highlight',
        'result_extensions',
        'select',
        'drag',
        'attempt',
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

    public function getShortNameAttribute()
    {
        return $this->interaction_object->interaction_definition->short_name;
    }


    public function getResultNameAttribute()
    {
        return $this->interaction_result->name;
    }

    public function getResultHighlightAttribute()
    {
        $action = $this->interaction_action->name;
        if ($action == 'completed') {
            return 'bg-success';
        } else if ($action == 'progressing') {
            return 'bg-warning';
        } else if ($action == 'skipped') {
            return 'bg-danger';
        }

        return "";
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


    public function getAttemptAttribute()
    {
        return $this->getDefinitionValue('Attempt');
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
