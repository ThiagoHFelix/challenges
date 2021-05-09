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
        return $this->hasOne(Hero::class, 'id', 'hero_id');
    }

    public function threat()
    {
        return $this->hasOne(Threat::class, 'id', 'threat_id')->with(['level', 'monster']);
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }


}
