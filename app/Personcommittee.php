<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Personcommittee extends Model
{
    public function person()
    {
        return $this->belongsTo('App\Person','person_id');
    }
    public function localcommittee()
    {
        return $this->belongsTo('App\Localcommittee','localcommitte_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }

    public static function getPeoplesNotCommittee(){
        return DB::table('people as p')
        ->whereNotExists(function($query){
            $query->from('personcommittees as pc')
            ->select('pc.id')
            ->whereRaw('pc.person_id = p.id');
        })->get();
   }
}
