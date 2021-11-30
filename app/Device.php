<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'id',
        'device_name',
    ];
    
    public function profiles()
    {
        return $this->belongsToMany('App\Profile');
    }
}