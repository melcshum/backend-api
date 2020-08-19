<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute()
    {
        return route('profiles.show', $this->id);
    }
}
