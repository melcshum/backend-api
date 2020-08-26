<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteractionObject extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $appends = [
        'player_difficulty', 'scenario_difficulty'
    ];

    public function interaction()
    {
        return $this->belongsTo(Interaction::class);
    }

    public function interaction_definition()
    {
        return $this->hasOne(InteractionDefinition::class);
    }

    public function difficulty_settings()
    {
        return $this->hasMany(DifficultySetting::class);
    }

    private function getDifficultySetting($type)
    {

        foreach ($this->difficulty_settings as $difficulty_setting) {
            if ($difficulty_setting->type == $type) {
                return $difficulty_setting;
            }
        }
        return null;
    }

    public function getScenarioDifficultyAttribute()
    {
        return $this->getDifficultySetting('scenario_difficulty');
    }



    public function getPlayerDifficultyAttribute()
    {
        return $this->getDifficultySetting('player_difficulty');
    }
}
