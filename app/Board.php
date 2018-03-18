<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function player()
    {
        return $this->belongsTo('App\Player');
    }

    public function ships(){
        return $this->hasMany('App\Ship');
    }

}
