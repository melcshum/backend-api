<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Game extends Model
{
    protected $fillable = [
      'name', 'desc', 'purpose'
    ];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] =   $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute()
    {
        //   return route("questions.show", $this->id);
        return route("games.show", $this->slug);
    }
}
