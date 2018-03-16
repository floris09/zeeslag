<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    public function boardShip()
    {
        return $this->belongsTo('App\Board');
    }
}
