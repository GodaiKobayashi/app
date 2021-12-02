<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'short',
        'id',
        'device_id',
    ];
    
    public function devices()
    {
    
        return $this->belongsToMany(Device::class);
    }
    
        
    public function ranks()
    {
    
        return $this->belongsToMany(Rank::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 3)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

}