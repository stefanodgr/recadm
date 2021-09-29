<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    //

    //   // Filtro Pdf List 
    //   public static function getPersonsEstados(){
    //     $resultado = \DB::table('personstructures')->select(function($query){
    //         $query->select('person_id','estado_id');
    //     })
    //     ->get();
        
    //     return $resultado;
    // }

    
    // public static function getPersonPdfDivisions($division){
    //     $resultado = \DB::table('personstructures')->where(function($query) use($division){
    //         $query->where('division_id',$division);
    //     })->select('person_id')->first();
        
    //     return $resultado;
    // }
}
