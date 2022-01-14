<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = [
        'id',
        'rank_name',
        'profile_id',
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
