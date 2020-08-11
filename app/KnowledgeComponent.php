<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnowledgeComponent extends Model
{
    protected $fillable = [
        'name',
        'purpose',
        'level'
    ];

}
