<?php

namespace App;

class Player
{

    protected $fillable = [
        'score', 'won', 'lost',
    ];
        
    public function gamePlayer()
    {
        return $this->belongsTo('App\Game');
    }
    
    public function getPlayerBoard(){
        return $this->hasOne(App/Board);
    }
    
}
