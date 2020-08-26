<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameSession extends Model
{
    protected $fillable = [
        'session', 'profile_id', 'game_id'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function interactions()
    {
        return $this->hasMany(App\Interaction::class);
    }
}
