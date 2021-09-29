<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Electoralcommission extends Model
{
    //
  public function user()
  {
      return $this->belongsTo('App\User', 'users_id');
  }
    
}
