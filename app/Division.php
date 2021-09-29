<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
    public function position()
    {
        return $this->hasMany('App\Position');
    }
}
