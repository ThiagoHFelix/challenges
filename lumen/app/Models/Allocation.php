<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model 
{

    protected $fillable = [
        'hero_id', 'threat_id', 'status_id'
    ];

    public function hero()
    {
        return $this->hasOne(Hero::class, 'hero_id', 'id');
    }

    public function threat()
    {
        return $this->hasOne(Threat::class, 'threat_id', 'id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'status_id', 'id');
    }


}
