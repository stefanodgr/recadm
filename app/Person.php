<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Person extends Model
{
    //

   
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function profesion()
    {
        return $this->belongsTo('App\Profession', 'profession_id');
    }

    public function academiclevel()
    {
        return $this->belongsTo('App\Academiclevel', 'academiclevel_id');
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

    public function cne()
    {
        return $this->belongsTo('App\Cne', 'cedula');
    }

    public function personstructure()
    {
        return $this->belongsTo('App\Personstructure', 'person_id');
    }
    // public function personstru()
    // {
    //     return $this->belongsTo('App\Personstructure', 'division_id');
    // }


    public static function getPersonByDocument($cedula,$nacionalidad){
        $resultado = \DB::table('cnes')->where(function($query) use($cedula,$nacionalidad){
            $query->where('cedula',$cedula)
                ->where('nacionalidad',$nacionalidad);
        })->select('id','nacionalidad','cedula',
        'fecha','nombre_pr','nombre_seg','apellido_pr','apellido_seg','cod_estado','cod_municipio','cod_parroquia','center_cne_id',
        'sexo')->first();
        
        return $resultado;
    }


    public static function getPersonExist($cedula,$nacionalidad){
        $resultado = \DB::table('people')->where(function($query) use($cedula,$nacionalidad){
            $query->where('cedula',$cedula)
                ->where('nacionalidad',$nacionalidad);
        })->select('id','nacionalidad','cedula')
        ->first();
        
        return $resultado;
    }

    public static function getPersonExistInscrip($cedula,$nacionalidad){
        $resultado = \DB::table('people_temps')->where(function($query) use($cedula,$nacionalidad){
            $query->where('cedula',$cedula)
                ->where('nacionalidad',$nacionalidad);
        })->select('id','nacionalidad','cedula')
        ->first();
        
        return $resultado;
    }


    //Funcion que verifica que la persona no tenga usuario asignado 
    public static function getPeoplesNotUser(){
        return DB::table('people as p')
                    ->whereNotExists(function($query){
                        $query->from('users as pv')
                        ->select('pv.id')
                        ->whereRaw('pv.person_id = p.id');
                    })->get();
                    
    }



    //   INICIO CONSULTAR REPORTE LISTA MILITANTE
    public static function getPersonPdfEstado($estado){
        $resultado = \DB::table('people')->where(function($query) use($estado){
            $query->where('estado_id',$estado);
        })->select('id','nacionalidad','cedula','nombre_pr','nombre_seg','apellido_pr','apellido_seg','telf_celular','email','direccion','estado_id',
        'municipio_id','parroquia_id','twitter','facebook','instagram','pagina_web')
        ->get();
        
        return $resultado;
    }


    public static function getPersonPdfMunicipio($estado,$municipio){
        $resultado = \DB::table('people')->where(function($query) use($estado,$municipio){
            $query->where('estado_id',$estado)
                ->where('municipio_id',$municipio);
        })->select('id','nacionalidad','cedula','nombre_pr','nombre_seg','apellido_pr','apellido_seg','telf_celular','email','direccion','estado_id',
        'municipio_id','parroquia_id','twitter','facebook','instagram','pagina_web')
        ->get();
        
        return $resultado;
    }

    public static function getPersonPdfParroquia($estado,$municipio,$parroquia){
        $resultado = \DB::table('people')->where(function($query) use($estado,$municipio,$parroquia){
            $query->where('estado_id',$estado)
                ->where('municipio_id',$municipio)
                ->where('parroquia_id',$parroquia);
        })->select('id','nacionalidad','cedula','nombre_pr','nombre_seg','apellido_pr','apellido_seg','telf_celular','email','direccion','estado_id',
        'municipio_id','parroquia_id','twitter','facebook','instagram','pagina_web')
        ->get();
        
        return $resultado;
    }



    public static function getPersonDivisions($division){
        $resultado = \DB::table('personstructures')->where(function($query) use($division){
            $query->where('division_id',$division);
        })->select('id','person_id')->get();
        
        return $resultado;
    }

    public static function getPersonPositions($position){
        $resultado = \DB::table('personstructures')->where(function($query) use($position){
            $query->where('position_id',$position);
        })->select('id','person_id')->get();
        
        return $resultado;
    }

    public static function getPersonCenterVote($centervote){
        $resultado = \DB::table('personvotes')->where(function($query) use($centervote){
            $query->where('centervote_id',$centervote);
        })->select('id','person_id')->get();
        
        return $resultado;
    }
//   FIN DE CONSULTAR REPORTE LISTA MILITANTE
  
  


    


}
