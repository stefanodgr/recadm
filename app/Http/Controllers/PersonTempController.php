<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\PDF;
use Faker\Provider\DateTime;

use Illuminate\Http\Request;
use App\Rules\Person\ValidNumber;
use Illuminate\Support\Facades\DB;
use App\Academiclevel;        //IMPORTANTE NOMBRE DE LA CLASE
use App\Division;             //IMPORTANTE NOMBRE DE LA CLASE
use App\Estado;               //IMPORTANTE NOMBRE DE LA CLASE
use App\Municipio;            //IMPORTANTE NOMBRE DE LA CLASE
use App\Parroquia;            //IMPORTANTE NOMBRE DE LA CLASE
use App\Profession;           //IMPORTANTE NOMBRE DE LA CLASE
use App\Centervote;           //IMPORTANTE NOMBRE DE LA CLASE 
use App\Cne;                  //IMPORTANTE NOMBRE DE LA CLASE 
use App\Person;               //IMPORTANTE NOMBRE DE LA CLASE 
use App\Personstructure;      //IMPORTANTE NOMBRE DE LA CLASE 
use App\Position;             //IMPORTANTE NOMBRE DE LA CLASE 
use App\People_temps;             //IMPORTANTE NOMBRE DE LA CLASE 




class PersonTempController extends Controller
{

    public function validatePersonCne(Request $request){


        // dd("llego");
          
        $cedula = $request->cedula;
        
        $nacionalidad = $request->nacionalidad;

        $personInscrip = Person::getPersonExistInscrip($cedula,$nacionalidad);
        // dd($person);
        if(!is_null($personInscrip)){
            session()->flash('message',"La Persona ya esta registrada.");
            return back();
        }

        $personData = Person::getPersonExist($cedula,$nacionalidad);
        // dd($person);
        if(!is_null($personData)){
            session()->flash('message',"Persona ya es un militante.");
            return back();
        }
        
        $person = Person::getPersonByDocument($cedula,$nacionalidad);
        // dd($person);


        
        
        // dd($filterCenters);
        if(!is_null($person)){
            $profesiones    = Profession::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
            $nivelAcademicos= Academiclevel::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
            $estados        = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
            // $municipios     = Municipio::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
            $parroquias     = Parroquia::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
            $rutaMunicipio = route('municipio.list');
            $rutaParroquia = route('parroquia.list');


        
            return view('forminscripcion',compact('rutaMunicipio','rutaParroquia','person','estados','profesiones','nivelAcademicos'));
            // return view('forminscripcion');
            
            
            // return \redirect()->route('persons.showcne',$person->id);
            //return \response()->json($person,200);
        }else{
            session()->flash('message',"Disculpe no hemos encontrado a la persona");
            return back();
        }
    }


        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function PersonRegister(Request $request)
        {
    


        //     dd("llego");
            $data = request()->validate([


                'Nacionalidad'      =>'required',
                'Cedula'            =>'required|max:8|unique:people_temps,cedula',
                'Primer_Nombre'     =>'required|max:150',
                'Primer_Apellido'   =>'required|max:150',
                'Fecha_Nacimiento'  =>'required',
                'Genero'            =>'required',
                'Telefono_Local'    =>['max:11',new ValidNumber],
                'Telefono_Celular'  =>'required|max:11|min:11|unique:people_temps,telf_celular',
                'Profesion'         =>'required|integer|not_in:0',
                'Nivel_Academico'   =>'required|integer|not_in:0',
                'Direccion'         =>'required|max:180',
                'Avenida'           =>'required|max:180',
                'Calle'             =>'required|max:180',
                'Estado'            =>'required|integer|not_in:0',
                'Municipio'         =>'required|integer|not_in:0',
                'Parroquia'         =>'required|integer|not_in:0'
        ]);

        $fecha          = request('Fecha_Nacimiento');
        $fechaData      = str_replace("/","-",$fecha);
        $fechaano       = substr($fechaData,6);
        $fechamm       = substr($fechaData,3,2);
        $fechadd       = substr($fechaData,0,2);
        $fecha_name    = $fechaano."-".$fechamm."-".$fechadd;
        $personas = New People_temps();
        // dd($personas);




        $personas->nacionalidad         = request('Nacionalidad');
        $personas->cedula               = request('Cedula');
        $personas->nombre_pr            = request('Primer_Nombre');
        $personas->nombre_seg           = request('Segundo_Nombre');
        $personas->apellido_pr          = request('Primer_Apellido');
        $personas->apellido_seg         = request('Segundo_Nombre');
        $personas->fecha_nac            = $fecha_name;
        $personas->genero               = request('Genero');
        $personas->email                = request('Email');
        $personas->telf_local           = request('Telefono_Local');
        $personas->telf_celular         = request('Telefono_Celular');
        $personas->profession_id        = request('Profesion');
        $personas->academiclevel_id     = request('Nivel_Academico');
        $personas->direccion            = request('Direccion');
        $personas->avenida              = request('Avenida');
        $personas->calle                = request('Calle');
        $personas->estado_id            = request('Estado');
        $personas->municipio_id         = request('Municipio');
        $personas->parroquia_id         = request('Parroquia');
        $personas->estatus              = '1';
        // dd($personas);
        $personas->save();

        return redirect('/inscripcion')->withSuccess('Registro ya estas inscrito Exitoso!');
    }


}


?>