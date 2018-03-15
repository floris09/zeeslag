<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function gameBoard()
    {
        return $this->belongsTo('App\Game');
    }

    public function playerBoard()
    {
        return $this->belongsTo('App\Player');
    }
    
    public function getShips(){
        return $this->hasMany(App/Ship);
    }

}
