<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'short',
    ];
    
    public function devices()
    {
    
        return $this->belongsToMany('App\Device');
    }
    
}
