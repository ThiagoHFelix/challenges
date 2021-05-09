<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Threat extends Model 
{

    protected $fillable = [
        'title', 'level_id', 'monster_id', 'latitude', 'longitude'
    ];

    public function level()
    {
        return $this->hasOne(ThreatLevel::class, 'id', 'level_id');
    }
    
    public function monster()
    {
        return $this->hasOne(Monster::class, 'id', 'monster_id');
    }

}
