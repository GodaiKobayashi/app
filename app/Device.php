<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'id',
        'device_name',
        'profile_id',
    ];
    
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}