<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model 
{

    protected $table = 'heroes';

    protected $fillable = [
        'name', 'latitude', 'longitude', 'ranking_id'
    ];


    public function ranking()
    {
       return $this->belongsTo(Ranking::class, 'ranking_id', 'id');
    }


    

}
