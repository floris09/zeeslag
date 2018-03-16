<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function getPlayer(){
        return $this->hasMany(App/Player);
    }
    public function getBoard(){
        return $this->hasMany(App/Board);
    }
}
