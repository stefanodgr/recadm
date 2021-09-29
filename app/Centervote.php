<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centervote extends Model
{
    public function personvote()
    {
        return $this->hasMany('App\Personvote');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado','estado_id');
    }
    public function municipio()
    {
        return $this->belongsTo('App\Municipio','municipio_id');
    }
    public function parroquia()
    {
        return $this->belongsTo('App\Parroquia','parroquia_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }

    public static function getCenterVotesEstado($estado_filtro){
        $resultado = \DB::table('centervotes')->where(function($query) use($estado_filtro){
            $query->where('estado_id',$estado_filtro);
        })->select('id','estado_id')->get();
        
        return $resultado;
    }
    public static function getCenterVotesMunicipio($estado_filtro,$municipio_filtro){
        $resultado = \DB::table('centervotes')->where(function($query) use($estado_filtro,$municipio_filtro){
            $query->where('estado_id',$estado_filtro)
            ->where('municipio_id',$municipio_filtro);
        })->select('id')->get();
        
        return $resultado;
    }
    public static function getCenterVotesParroquia($estado_filtro,$municipio_filtro,$parroquia_filtro){
        $resultado = \DB::table('centervotes')->where(function($query) use($estado_filtro,$municipio_filtro,$parroquia_filtro){
            $query->where('estado_id',$estado_filtro)
            ->where('municipio_id',$municipio_filtro)
            ->where('parroquia_id',$parroquia_filtro);
        })->select('id')->get();
        
        return $resultado;
    }

}
