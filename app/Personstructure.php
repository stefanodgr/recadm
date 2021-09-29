<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Personstructure extends Model
{
    protected $fillable = ['person_id'];
        // RELACIONES
        public function person()
        {
            return $this->belongsTo('App\Person','person_id');
        }
        public function estado()
        {
            return $this->belongsTo('App\Estado','estado_id');
        }
        public function division()
        {
            return $this->belongsTo('App\Division','division_id');
        }
        public function position()
        {
            return $this->belongsTo('App\Position','position_id');
        }
        public function user()
        {
            return $this->belongsTo('App\User', 'userId');
        }

        public static function getPeoplesNotStructure(){
            return DB::table('people as p')
            ->whereNotExists(function($query){
                $query->from('personstructures as pv')
                ->select('pv.id')
                ->whereRaw('pv.person_id = p.id');
            })->get();
       }


           // Filtro Pdf List
      public static function getPersonStrutures($estados){
        $resultado = \DB::table('personstructures')->where(function($query) use($estados){
            $query->where('estado_id',$estados);
        })->select('person_id','estado_id')
        ->get();

        return $resultado;
    }

    public static function getPersonStructureNotExists($person){
            $sql= "SELECT p.id, person_id FROM people as p LEFT JOIN personstructures as pe on p.id = pe.person_id
                    WHERE pe.person_id =  $person
                    and pe.estado_id = p.estado_id
                    GROUP BY p.id,person_id HAVING person_id is null ";

        $resultado = DB::select($sql);

        if($resultado == " " ||  $resultado == null){
            $resultado = null;
        }
        return $resultado;
    }


    public static function getPersonStructureExist($Division,$Cargo,$Estado){
        $resultado = \DB::table('personstructures')->where(function($query) use($Division,$Cargo,$Estado){
            $query->where('division_id',$Division)
                ->where('position_id',$Cargo)
                ->where('estado_id',$Estado);
        })->select('id','division_id','position_id','estado_id')
        ->first();

        return $resultado;
    }



}
