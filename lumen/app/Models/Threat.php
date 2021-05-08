<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Threat extends Model 
{

    protected $fillable = [
        'title', 'level_id'
    ];

    public function level()
    {
        return $this->hasOne(ThreatLevel::class, 'level_id', 'id');
    }
    

}
