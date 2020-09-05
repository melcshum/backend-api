<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteractionObject extends Model
{
    protected $fillable = [
        'name', 'game_session_id'
    ];

    protected $appends = [
        'scenario_name', 'player_difficulty_rating', 'scenario_difficulty_rating'
    ];

    public function interaction()
    {
        return $this->belongsTo(Interaction::class);
    }

    public function game_session()
    {
        return $this->belongsTo(GameSession::class);
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

    public function getScenarioDifficultyRatingAttribute()
    {
        return $this->getDifficultySetting('scenario_difficulty')->rating;
    }



    public function getPlayerDifficultyRatingAttribute()
    {
        return $this->getDifficultySetting('player_difficulty')->rating;
    }

    public function getScenarioNameAttribute()
    {
        return $this->interaction_definition->short_name;
    }
}
