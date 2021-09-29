<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    public function municipio()
    {
        return $this->hasMany('App\Municipio');
    }
}
