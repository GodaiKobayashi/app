<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'tweet',
        
        ];
}
