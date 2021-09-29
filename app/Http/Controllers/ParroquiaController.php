<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parroquia;
class ParroquiaController extends Controller
{
    //
    public function list(Request $request, $id_municipio = null ,$id_estado = null)
    {
        //validar si la peticion es asincrona
        if($request->ajax()){
            try{

                $parroquia = Parroquia::select('id','descripcion')->where('municipio_id',$id_municipio)->where('estado_id',$id_estado)->orderBy('descripcion','asc')->get();
                return response()->json($parroquia,200);
            }catch(Throwable $th){
                return response()->json(false,500);
            }
        }
    }
}
