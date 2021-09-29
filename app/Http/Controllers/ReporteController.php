<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Arr;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Estado;               //IMPORTANTE NOMBRE DE LA CLASE
use App\Person;               //IMPORTANTE NOMBRE DE LA CLASE
use App\Municipio;               //IMPORTANTE NOMBRE DE LA CLASE
use App\Parroquia;               //IMPORTANTE NOMBRE DE LA CLASE
use App\Centervote;               //IMPORTANTE NOMBRE DE LA CLASE
use App\Division;
use App\Position;
use App\Personvote;
use App\Personstructure;






class ReporteController extends Controller
{


    /* AUTENTICADOR DE SESSION */
        public function __construct(){

        $this->middleware('auth');
    }

    /**
     * MUESTRA LA VISTA DE EL LISTADO DE MILITANTES
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados           = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $divisions         = Division::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $centervotes       = Centervote::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();     
        return view('admin.reportes.reporteListPerson',compact('estados','divisions','centervotes'));
    }
    /**
     * MUESTRA LA VISTA DE EL LISTADO DE CENTRO DE VOTACION
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCenter()
    {
        $estados           = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $centervotes       = Centervote::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();     
        return view('admin.reportes.reporteListCenter',compact('estados','centervotes'));
    }

    /**
     * MUESTRA LA VISTA DE EL LISTADO DE CENTRO DE VOTACION
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPerson()
    {
        // $estados           = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        // $centervotes       = Centervote::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();     
        return view('admin.reportes.reportePerson');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validateFiltro(Request $request){
        
        // dd("llego Controller");
        $estado    =  $request->Estado;
      
        $municipio =  $request->Municipio;
        $parroquia =  $request->Parroquia;
        $division  =  $request->Division;
        $position  =  $request->Position;
        $centervote  =  $request->CenterVote;

   

        if($estado == '' & $municipio == '' & $parroquia == ''  & $position == ''  & $division == '' & $centervote == ''  ){
            $estado  == null;
            $municipio  == null;
            $parroquia  == null;
            $division  == null;
            $position  == null;
            $centervote  == null;
        }
        // DD($centervote);
        // dd($municipio );
        // dd($municipio);
        // dd($centervote);
        if ($centervote <> null ||  $centervote <> ''  ){

        // dd($division);
            $estados                = Estado::all();
            $municipios             = Municipio::all();
            $parroquias             = Parroquia::all();
            $divisions              = Division::all();
            $positions              = Position::all();
            $personstructures       = Personstructure::all();
            $personsvotes           = Personvote::all();
            $persons                =Person::all();
            $personsCenterVotes     = Person::getPersonCenterVote($centervote);

            $ldate             = date('d-m-Y H:i:s');

        
            
           
            //retun view(,compact($person));
            // return view('admin.reportes.showListPersonCenter',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions','personsCenterVotes'));
            // return \response()->json($person,200);
            $pdf = \PDF::loadView('admin.reportes.showListPersonCenter',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions','personsCenterVotes','ldate'));
            // If you want to store the generated pdf to the server then you can use the store function
            $pdf->save(storage_path().'_filename.pdf');
            // // Finally, you can download the file using download function
            return $pdf->download("Centro_Votacion_militante.pdf");
            // return $pdf->stream();
            
        }
     
        if ($position <> null ){

            // dd($division);
                $estados                = Estado::all();
                $municipios             = Municipio::all();
                $parroquias             = Parroquia::all();
                $divisions              = Division::all();
                $positions              = Position::all();
                $personstructures       = Personstructure::all();
                $personsvotes           = Personvote::all();
    
                // $persons                =Personstructure::where('division_id',$division)->get();
                // $personsDivisions                = :getPersonDivisions($division);
                $personsPositions = Person::getPersonPositions($position);
                // $datos = Arr::collapse([$personsDivisions->id]);
                // dd($personsPositions);
                 $persons                =Person::all();
                //  $persons                = Person::getPersonPdf($personsDivision->person_id);

                // dd($personsPositions);
               
                if(!is_null($persons)){
                    //retun view(,compact($person));
                    // return view('admin.reportes.showListPerson',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions','personsPositions'));
                    $pdf = \PDF::loadView('admin.reportes.showListPerson',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions','personsPositions','ldate'));
                    // If you want to store the generated pdf to the server then you can use the store function
                    $pdf->save(storage_path().'_filename.pdf');
                    // // Finally, you can download the file using download function
                    return $pdf->download("Division_Listado_militante.pdf");
                    // return $pdf->stream();
                }
            }
   
        if ($division <> null ){

            // dd($division);
                $estados                = Estado::all();
                $municipios             = Municipio::all();
                $parroquias             = Parroquia::all();
                $divisions              = Division::all();
                $positions              = Position::all();
                $personstructures       = Personstructure::all();
                $personsvotes           = Personvote::all();
    
                // $persons                =Personstructure::where('division_id',$division)->get();
                // $personsDivisions                = :getPersonDivisions($division);
                $personsDivisions = Person::getPersonDivisions($division);

                 $persons                =Person::all();
                 $ldate                  = date('d-m-Y H:i:s');
                //  $persons                = Person::getPersonPdf($personsDivision->person_id);
               
                if(!is_null($persons)){
                    //retun view(,compact($person));
                    // return view('admin.reportes.showListPerson',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions','personsDivisions'));
                    $pdf = \PDF::loadView('admin.reportes.showListPerson',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions','personsDivisions','ldate'));
                    // If you want to store the generated pdf to the server then you can use the store function
                    $pdf->save(storage_path().'_filename.pdf');
                    // // Finally, you can download the file using download function
                    return $pdf->download("Division_Listado_militante.pdf");
                    // return $pdf->stream();
                }
            }
          
        if($estado == null && $municipio == null && $parroquia == null && $division == null && $position == null   ){
            $estados                = Estado::all();
            $municipios             = Municipio::all();
            $parroquias             = Parroquia::all();
            $divisions              = Division::all();
            $positions              = Position::all();
            $personstructures       = Personstructure::all();
            $personsvotes           = Personvote::all();
            $persons                = Person::all();
            $ldate                  = date('d-m-Y H:i:s');
            // return view('admin.reportes.showListPerson',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions','ldate'));
            $pdf = \PDF::loadView('admin.reportes.showListPerson',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions','ldate'));
            // If you want to store the generated pdf to the server then you can use the store function
            $pdf->save(storage_path().'_filename.pdf');
            // // Finally, you can download the file using download function
            return $pdf->download("Todos_Listado_militante.pdf");
            // return $pdf->stream();

        }else if ($municipio == null){
            $estados                = Estado::all();
            $municipios             = Municipio::all();
            $parroquias             = Parroquia::all();
            $personstructures       = Personstructure::all();
            $personsvotes           = Personvote::all();
            $persons                = Person::getPersonPdfEstado($estado);
            foreach ($estados as $estado){
                if($estado->id == $estado->id){
                    $name_estado=$estado->descripcion;
                }
            }
            $ldate                  = date('d-m-Y H:i:s');

            // dd($nombre);
            if(!is_null($persons)){
                //retun view(,compact($person));
                // return view('admin.reportes.showListPerson',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions'));
                $pdf = \PDF::loadView('admin.reportes.showListPerson',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','ldate'));
                // If you want to store the generated pdf to the server then you can use the store function
                $pdf->save(storage_path().'_filename.pdf');
                // // Finally, you can download the file using download function
                return $pdf->download($name_estado."_Listado_militante.pdf");
                // return $pdf->stream();
    
            }
        }else if($parroquia == null){
            $estados                = Estado::all();
            $municipios             = Municipio::all();
            $parroquias             = Parroquia::all();
            $personstructures       = Personstructure::all();
            $personsvotes           = Personvote::all();
            $divisions              = Division::all();
            $positions              = Position::all();
            $persons                = Person::getPersonPdfMunicipio($estado,$municipio);

            foreach ($estados as $estado){
                if($estado->id == $estado->id){
                    $name_estado=$estado->descripcion;
                }
            }

            foreach ($municipios as $municipio){
                if($municipio->id == $municipio->id){
                    $name_municipio=$municipio->descripcion;
                }
            }
            $ldate                  = date('d-m-Y H:i:s');
            
            // dd($persons);
            if(!is_null($persons)){
                //retun view(,compact($person));
                // return view('admin.reportes.showListPerson',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions'));
                // return \response()->json($person,200);
                $pdf = \PDF::loadView('admin.reportes.showListPerson',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions','ldate'));
                // If you want to store the generated pdf to the server then you can use the store function
                $pdf->save(storage_path().'_filename.pdf');
                // // Finally, you can download the file using download function
                return $pdf->download($name_estado."-".$name_municipio."_Listado_militante.pdf");
                // return $pdf->stream();
            }
        }else if ($parroquia <> null){
            $estados                = Estado::all();
            $municipios             = Municipio::all();
            $parroquias             = Parroquia::all();
            $divisions              = Division::all();
            $positions              = Position::all();
            $personstructures       = Personstructure::all();
            $personsvotes           = Personvote::all();
            $persons                = Person::getPersonPdfParroquia($estado,$municipio,$parroquia);

            foreach ($estados as $estado){
                if($estado->id == $estado->id){
                    $name_estado=$estado->descripcion;
                }
            }

            foreach ($municipios as $municipio){
                if($municipio->id == $municipio->id){
                    $name_municipio=$municipio->descripcion;
                }
            }
            

            foreach($persons as $person){
                foreach ($parroquias as $parroquia){
                    if($person->parroquia_id == $parroquia->id){
                        $name_parroquia=$parroquia->descripcion;
                    }
                }
            }
            

            $ldate                  = date('d-m-Y H:i:s');
            // dd($persons);
            if(!is_null($persons)){
                //retun view(,compact($person));
                // return view('admin.reportes.showListPerson',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions'));
                $pdf = \PDF::loadView('admin.reportes.showListPerson',compact('persons','personstructures','personsvotes','estados','municipios','parroquias','divisions','positions','ldate'));
                // If you want to store the generated pdf to the server then you can use the store function
                $pdf->save(storage_path().'_filename.pdf');
                // // Finally, you can download the file using download function
                return $pdf->download($name_estado."-".$name_municipio."-".$name_parroquia."_Listado_militante.pdf");
                // return $pdf->stream();
            }
        } 
    }
       
    public function validateFiltroCentro(Request $request){

        // dd("llego Controller");
        $estado_filtro         =  $request->Estado;
        $municipio_filtro      =  $request->Municipio;
        $parroquia_filtro      =  $request->Parroquia;

        if($estado_filtro == '' ){
            $estado_filtro  == null;
        }
        if($municipio_filtro == ''){
            $municipio_filtro  == null;
        }
        if($parroquia_filtro == ''){
            $parroquia_filtro  == null;
        }


        if($estado_filtro == null && $municipio_filtro == null && $parroquia_filtro == null ){
            $estados                = Estado::all();
            $centervotes            = Centervote::all();
            $municipios             = Municipio::all();
            $parroquias             = Parroquia::all();
            $ldate                  = date('d-m-Y H:i:s');
           
            // dd($persons);
            $pdf = \PDF::loadView('admin.reportes.showListCenter',compact('centervotes','municipios','parroquias','estados','parroquia_filtro','estado_filtro','municipio_filtro','ldate'));
            // If you want to store the generated pdf to the server then you can use the store function
            $pdf->save(storage_path().'_filename.pdf');
            // // Finally, you can download the file using download function
            return $pdf->download("Centro_Votacion_Todos.pdf");
            // return $pdf->stream();

        }else if($estado_filtro <> null && $municipio_filtro == null && $parroquia_filtro == null){
            $estados                = Estado::all();
            $centervotes            = Centervote::all();
            $municipios             = Municipio::all();
            $parroquias             = Parroquia::all();
            $ldate                  = date('d-m-Y H:i:s');

            $centro_estados                = Centervote::getCenterVotesEstado($estado_filtro);

         $estadoID= Estado::find($estado_filtro);

           
            
            $pdf = \PDF::loadView('admin.reportes.showListCenter',compact('centervotes','municipios','parroquias','estados','parroquia_filtro','estado_filtro','municipio_filtro','centro_estados','ldate'));
            // return view
            // If you want to store the generated pdf to the server then you can use the store function
            $pdf->save(storage_path().'_filename.pdf');
            // // Finally, you can download the file using download function
            return $pdf->download("Centro_Votacion_".$estadoID->descripcion.".pdf");
            // return $pdf->stream();
        }else if($estado_filtro <> null && $municipio_filtro <> null && $parroquia_filtro == null){
            $estados                = Estado::all();
            $centervotes            = Centervote::all();
            $municipios             = Municipio::all();
            $parroquias             = Parroquia::all();

            $centro_municipios      = Centervote::getCenterVotesMunicipio($estado_filtro,$municipio_filtro);
            $estadoID               = Estado::find($estado_filtro);
            $municipioID            = Municipio::find($municipio_filtro);

            $ldate                  = date('d-m-Y H:i:s');
        
            $pdf = \PDF::loadView('admin.reportes.showListCenter',compact('centervotes','municipios','parroquias','estados','parroquia_filtro','estado_filtro','municipio_filtro','centro_municipios','ldate'));
            // return view('admin.reportes.showListCenter',compact('centervotes','municipios','parroquias','estados','parroquia_filtro','estado_filtro','municipio_filtro','centro_municipios'));
            $pdf->save(storage_path().'_filename.pdf');
            // // Finally, you can download the file using download function
            return $pdf->download("Centro_Votacion_".$estadoID->descripcion."_".$municipioID->descripcion.".pdf");
            // return $pdf->stream();
        }else if($estado_filtro <> null && $municipio_filtro <> null && $parroquia_filtro <> null){
            $estados                = Estado::all();
            $centervotes            = Centervote::all();
            $municipios             = Municipio::all();
            $parroquias             = Parroquia::all();
          

            $centro_parroquias      = Centervote::getCenterVotesParroquia($estado_filtro,$municipio_filtro,$parroquia_filtro);
            $estadoID               = Estado::find($estado_filtro);
            $municipioID            = Municipio::find($municipio_filtro);
            $parroquiaID            = Parroquia::find($parroquia_filtro);
            $ldate                  = date('d-m-Y H:i:s');
        
            // return view('admin.reportes.showListCenter',compact('centervotes','municipios','parroquias','estados','parroquia_filtro','estado_filtro','municipio_filtro','centro_parroquias'));
            $pdf = \PDF::loadView('admin.reportes.showListCenter',compact('centervotes','municipios','parroquias','estados','parroquia_filtro','estado_filtro','municipio_filtro','centro_parroquias','ldate'));
            $pdf->save(storage_path().'_filename.pdf');
            // // Finally, you can download the file using download function
            return $pdf->download("Centro_Votacion_".$estadoID->descripcion."_".$municipioID->descripcion."_".$parroquiaID->descripcion.".pdf");
            // return $pdf->stream();
        }
    }

    public function validatePersonFiltro(Request $request){
        
        
        $cedula            = $request->cedula;
        $nacionalidad      = $request->nacionalidad;
        $documento         = $nacionalidad."-".$cedula;
        $ldate             = date('d-m-Y H:i:s');
        $personstrus       = Personstructure::all();
        $divisions         = Division::all();
        $positions         = Position::all();
        $personData = Person::getPersonExist($cedula,$nacionalidad);

        $person            = Person::find($personData->id);
        if(!is_null($person)){
            $pdf = \PDF::loadView('admin.reportes.showPerson', compact('person','personstrus','divisions','positions','ldate'));
            // If you want to store the generated pdf to the server then you can use the store function
            $pdf->save(storage_path().'_filename.pdf');
            // // Finally, you can download the file using download function
            return $pdf->download($documento."_militante.pdf");
            // return $pdf->stream();
        }else{
            session()->flash('message',"Disculpe no hemos encontrado a la persona");
            return back();
        }
    }

    
}
