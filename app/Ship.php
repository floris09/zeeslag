<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    public function board()
    {
        return $this->belongsTo('App\Board');
    }
}
