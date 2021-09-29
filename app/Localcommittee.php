<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localcommittee extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado', 'estado_id');
    }

    public function municipio()
    {
        return $this->belongsTo('App\Municipio', 'municipio_id');
    }

    public function parroquia()
    {
        return $this->belongsTo('App\Parroquia', 'parroquia_id');
    }
}
