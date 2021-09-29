<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //
    public function parroquia()
    {
        return $this->hasMany('App\Parroquia');
    }

}
