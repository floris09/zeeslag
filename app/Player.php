<?php

namespace App;

class Player
{

    protected $fillable = [
        'score', 'won', 'lost',
    ];

    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function board(){
        return $this->hasOne('App\Board');
    }

}
