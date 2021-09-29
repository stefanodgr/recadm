<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipio;
class MunicipioController extends Controller
{
    //

    public function list(Request $request, $id_estado = null){
        //validar si la peticion es asincrona
        if($request->ajax()){
            try{
                $municipio = Municipio::select('id','descripcion')->where('estado_id',$id_estado)->orderBy('descripcion','asc')->get();
                return response()->json($municipio,200);
            }catch(Throwable $th){
                return response()->json(false,500);
            }
        }
        
    }
    
}
