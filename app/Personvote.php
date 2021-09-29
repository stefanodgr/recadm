<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Personvote extends Model
{
       // RELACIONES
       public function person()
       {
           return $this->belongsTo('App\Person','person_id');
       }
       public function estado()
       {
           return $this->belongsTo('App\CenterVote','estado_id');
       }
       public function centervote()
       {
           return $this->belongsTo('App\Centervote','centervote_id');
       }
       public function user()
       {
           return $this->belongsTo('App\User', 'userId');
       }
       public function periodo()
       {
           return $this->belongsTo('App\Electoralcommission', 'periodo_id');
       }
       public function electorallist()
       {
           return $this->belongsTo('App\Electorallist', 'electorallist_id');
       }
    //    public function cne()
    //    {
    //        return $this->belongsTo('App\Electoralcommission', 'periodo_id');
    //    }

       public static function getPeoplesNotVote(){
            return DB::table('people as p')
            ->whereNotExists(function($query){
                $query->from('personvotes as pv')
                ->select('pv.id')
                ->whereRaw('pv.person_id = p.id');
            })->get();
       }
}
