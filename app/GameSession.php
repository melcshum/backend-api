<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameSession extends Model
{
    protected $fillable = [
        'session'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
