<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    public $fillable = ['name', 'runs', 'wins', 'about'];

    public function bidders(){
        return $this->hasMany('App\Bidder');
    }

}
