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
use App\User;             //IMPORTANTE NOMBRE DE LA CLASE
use App\People_temps;             //IMPORTANTE NOMBRE DE LA CLASE




class PersonController extends Controller
{
     /* AUTENTICADOR DE SESSION */
    public function __construct(){

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons =Person::orderBy('id' ,'DESC')->get();
        // dd($persons);
        return view('admin.persons.index',compact('persons'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $test           =   Cne::find($id);
        $user           =   auth()->user();
        $users_role     =   $user->role_id;
        $users_estado   =   $user->estado_id;

        $militantes =Cne::where('id',$test->id)->get();

        foreach($militantes as $militante){
            $nombreEstado    = $militante->cod_estado;
            $nombreMunicipio = $militante->cod_municipio;
            $nombreParroquia = $militante->cod_parroquia;
        }

            $sWhere              =substr_replace( $nombreEstado,"",0,4);
            $nombreEstado		=trim(strtoupper($sWhere));

        $estadosNombres            = Estado::where('descripcion',$nombreEstado)->get();
        foreach ($estadosNombres as $estadosNombre){
            $id_estado              = $estadosNombre->id;
        }

        $sWhereMuni              =substr_replace( $nombreMunicipio,"",0,4);
        $nombreMunicipio		=trim(strtoupper($sWhereMuni));

        $muniNombre            = Municipio::where('estado_id',$id_estado)->where('descripcion',$nombreMunicipio)->first();
        $id_municipio           = $muniNombre->id;

        $sWhereParro              =substr_replace( $nombreParroquia,"",0,3);
        $nombreParroquia		=trim(strtoupper($sWhereParro));

        $parroquia            = Parroquia::where('municipio_id',$id_municipio)->where('descripcion',$nombreParroquia)->first();
        $id_parroquia           = $parroquia->id;
        if($users_role == '1'){
            $estados            = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
            $municipios           = Municipio::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();

            $estadosData        = Estado::where('id',$id_estado)->first();
            $municipiosData     = Municipio::where('id',$id_municipio)->first();
            $parroquiaData     = Parroquia::where('id',$id_parroquia)->first();

        }elseif($users_role == '2'){
            if($users_estado == $id_estado){
                $estados    = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
            }else{
                dd("Este Militante no esta en su Estado");
                return view('/');
            }
        }else{
            dd("no-tienes permiso");
            return view('/');
        }








        // $estados     = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $profesiones    = Profession::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $nivelAcademicos= Academiclevel::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        // $municipios         = Municipio::all();
        return view('admin.persons.create',compact('estados','estadosData','profesiones','nivelAcademicos','municipios','municipiosData','parroquiaData',
            'test','users_role'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $data = request()->validate([
                 'Nacionalidad'      =>'required',
            'Cedula'            =>'required|unique:people,cedula',
            'Foto'              =>'image',
            'Primer_Nombre'     =>'required|max:60',
            'Segundo_Nombre'    =>'max:60',
            'Primer_Apellido'   =>'required|max:60',
            'Segundo_Apellido'  =>'max:60',
            'Fecha_Nacimiento'  =>'required',
            'Genero'            =>'required',
            'Email'             =>'required|max:120|unique:people,email',
            'Telefono_Local'    =>['max:11',new ValidNumber],
            'Telefono_Celular'  =>'required|max:11|min:11|unique:people,telf_celular',
            'Profesion'         =>'required|integer|not_in:0',
            'Nivel_Academico'   =>'required|integer|not_in:0',
            'Direccion'         =>'required|max:200',
            'Avenida'           =>'required|max:200',
            'Calle'             =>'required|max:200',
            'Estado'            =>'required|integer|not_in:0',
            'Municipio'         =>'required|integer|not_in:0',
            'Parroquia'         =>'required|integer|not_in:0',
            'Twitter'           =>'max:200',
            'Facebook'          =>'max:200',
            'Instagram'         =>'max:200',
            'Pagina_Web'        =>'max:200'

            ]);

            $fecha          = request('Fecha_Nacimiento');
            $fechaData      = str_replace("/","-",$fecha);
            $fechaano       = substr($fechaData,6);
            $fechamm       = substr($fechaData,3,2);
            $fechadd       = substr($fechaData,0,2);
            $fecha_name    = $fechaano."-".$fechamm."-".$fechadd;

            $segundo_nombre     = request('Segundo_Nombre');        //SEGUNDO NOMBRE
            $segundo_apellido   = request('Segundo_Apellido');      //SEGUNDO APELLIDO


            $Foto = request('Foto');
            // dd($Foto);
             if($Foto == ''){
            $Foto ='sin_foto.png';
            }else{
                $fileNameWithTheExtension  = request('Foto')->getClientOriginalName();
                //get el nombre de la imagen
                $fileName = pathinfo($fileNameWithTheExtension,PATHINFO_FILENAME);
                // dd($fileName);

                //get extension de la imagen
                $extension = request('Foto')->getClientOriginalExtension();
                //create nuevo nombre de la imagen
                $newfileName = $fileName . '_' . time() . '.' . $extension;

                // guardar la imagen en una carpeta public
                $path = request('Foto')->storeAs('public/images/persons_foto/',$newfileName);

                // dd($extension);
            }

            $user= auth()->user();
            // $= auth()->user();
            $personas = new Person();

            $personas->nacionalidad         = request('Nacionalidad');
            $personas->cedula               = request('Cedula');
            $personas->nombre_pr            = request('Primer_Nombre');
            if($segundo_nombre == null){            //VALIDADOR DE SEGUNDO NOMBRE
                $segundo_nombre ='';
                $personas->nombre_seg       = $segundo_nombre;
            }else{
                $personas->nombre_seg       = request('Segundo_Nombre');
            }

            $personas->apellido_pr          = request('Primer_Apellido');

            if($segundo_apellido == null){          //VALIDADOR DE SEGUNDO APELLIDO
                $segundo_apellido ='';
                $personas->apellido_seg     = $segundo_apellido;
            }else{
                $personas->apellido_seg     = request('Segundo_Nombre');
            }

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
            if($Foto == 'sin_foto.png'){
                $personas->foto_img             = $Foto;
            }else{
                $personas->foto_img             = $newfileName;
            }

            $personas->twitter              = request('Twitter');
            $personas->facebook             = request('Facebook');
            $personas->instagram            = request('Instagram');
            $personas->pagina_web           = request('Pagina_Web');
            $personas->users_id              = $user->id;
            $personas->status_id           = '1';
            $personas->save();

            return redirect('/persons')->withSuccess('Registro Exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // dd($person);
        $person     = Person::find($id);
        return view('admin.persons.show',compact('person'));

    }

     /**
     * Display the specified resource.
     *
     * @param  Person  $person
     * @return \Illuminate\Http\Response
     */
    public function showcne($id)
    {
        //$personstructure->id
        // dd($person);
        $test           = Cne::find($id);
        $estados        = Estado::all();
        $municipios     = Municipio::all();
        $parroquias     = Parroquia::all();
        $centervotes    = Centervote::all();
        return view('admin.persons.showcne',compact('test','estados','municipios','parroquias','centervotes'));

    }

        /**
     * Display the specified resource.
     *
     * @param  Person  $person
     * @return \Illuminate\Http\Response
     */
    public function showpdf($id){


        $person            = Person::find($id);
        $persons           = Person::all();
        foreach ($persons as $pesona){
            if($person->id == $pesona->id){
                $nacionalidad   = $pesona->nacionalidad;
                $cedula         = $pesona->cedula;
                $documento      =$nacionalidad."-".$cedula;
            }
        }
        $personstrus       = Personstructure::all();
        $divisions         = Division::all();
        $positions         = Position::all();
        $ldate = date('d-m-Y H:i:s');

        $pdf = \PDF::loadView('admin.persons.showpdf', compact('person','personstrus','divisions','positions','ldate'));
        // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(storage_path().'_filename.pdf');
        // // Finally, you can download the file using download function
        return $pdf->download($documento."_militante.pdf");
        // return $pdf->stream();

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  Person  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
            // get the post with the id $post->idata
            $person = Person::find($id);
            foreach($person as $pp){
                $municipioData = $person->municipio_id;
            }
            // dd($municipioData);
            $estados            =   Estado::all();
            $municipios         =   Municipio::all();
            $nivel_Academico    =   Academiclevel::all();
            $profesiones        =   Profession::all();
            $parroquias         =   Parroquia::all();

            // return  view
            return view('admin.persons.edit',compact('municipioData','person','nivel_Academico','profesiones','estados','municipios','parroquias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Person  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validar_pers =  Person::find($id);
         $request->validate([
            'Nacionalidad'      =>'required',
            'Cedula'            =>'required|unique:people,cedula,'.$validar_pers->id,
            'Foto'              =>'image',
            'Primer_Nombre'     =>'required|max:60',
            'Segundo_Nombre'    =>'max:60',
            'Primer_Apellido'   =>'required|max:60',
            'Segundo_Apellido'  =>'max:60',
            'Fecha_Nacimiento'  =>'required',
            'Genero'            =>'required',
            'Email'             =>'required|max:120|unique:people,email,'.$validar_pers->id,
            'Telefono_Celular'  =>'required|max:11|min:11|unique:people,telf_celular,'.$validar_pers->id,
            'Telefono_Local'    =>['max:11',new ValidNumber],
            'Profesion'         =>'required|integer|not_in:0',
            'Nivel_Academico'   =>'required|integer|not_in:0',
            'Direccion'         =>'required|max:200',
            'Avenida'           =>'required|max:200',
            'Calle'             =>'required|max:200',
            'Estado'            =>'required|integer|not_in:0',
            'Municipio'         =>'required|integer|not_in:0',
            'Parroquia'         =>'required|integer|not_in:0',
            'Twitter'           =>'max:200',
            'Facebook'          =>'max:200',
            'Instagram'         =>'max:200',
            'Pagina_Web'        =>'max:200'
        ]);
            $segundo_nombre     = request('Segundo_Nombre');        //SEGUNDO NOMBRE
            $segundo_apellido   = request('Segundo_Apellido');      //SEGUNDO APELLIDO


            $Foto = request('Foto');
            // dd($Foto);
            if($Foto == '' || $Foto == null){
            $Foto ='sin_foto.png';
            }else{
                $fileNameWithTheExtension  = request('Foto')->getClientOriginalName();
                //get el nombre de la imagen
                $fileName = pathinfo($fileNameWithTheExtension,PATHINFO_FILENAME);
                // dd($fileName);

                //get extension de la imagen
                $extension = request('Foto')->getClientOriginalExtension();
                //create nuevo nombre de la imagen
                $newfileName = $fileName . '_' . time() . '.' . $extension;

                // guardar la imagen en una carpeta public
                $path = request('Foto')->storeAs('public/images/persons_foto/',$newfileName);

                // dd($extension);
            }



        $user= auth()->user();
        $personas =  Person::findOrFail($id);
        $personas->nacionalidad         = request('Nacionalidad');
        $personas->cedula               = request('Cedula');
        $personas->nombre_pr            = request('Primer_Nombre');
        if($segundo_nombre == null){            //VALIDADOR DE SEGUNDO NOMBRE
            $segundo_nombre ='';
            $personas->nombre_seg       = $segundo_nombre;
        }else{
            $personas->nombre_seg       = request('Segundo_Nombre');
        }

        $personas->apellido_pr          = request('Primer_Apellido');

        if($segundo_apellido == null){          //VALIDADOR DE SEGUNDO APELLIDO
            $segundo_apellido ='';
            $personas->apellido_seg     = $segundo_apellido;
        }else{
            $personas->apellido_seg     = request('Segundo_Nombre');
        }

        $personas->fecha_nac            = request('Fecha_Nacimiento');
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
        if($Foto == 'sin_foto.png'){
            $personas->foto_img             = $Foto;
        }else{
            $personas->foto_img             = $newfileName;
        }

        $personas->twitter              = request('Twitter');
        $personas->facebook             = request('Facebook');
        $personas->instagram            = request('Instagram');
        $personas->pagina_web           = request('Pagina_Web');
        $personas->users_id              = $user->id;
        $personas->status_id           = '1';
        $personas->save();

        return redirect('/persons')->withSuccess('Registro Editado Exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Person  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        //find the post
        $person = Person::find($request->person_id);

        if($person->foto_img == 'sin_foto.png'){
        }else{
            $oldImage = public_path() .'/storage/images/persons_foto/'.$person->foto_img;
            if(file_exists($oldImage)){
                //delte the image
                unlink($oldImage);
            }
        }
        //delete the person
        $person->delete();
        return redirect('/persons')->withDelete('Registro Eliminado Exitoso!');
    }


    public function validatePerson(Request $request){


        $cedula = $request->cedula;

        $nacionalidad = $request->nacionalidad;

        $personData = Person::getPersonExist($cedula,$nacionalidad);
        // dd($person);
        if(!is_null($personData)){
            session()->flash('message',"Persona ya es un militante");
            return back();
        }

        $person = Person::getPersonByDocument($cedula,$nacionalidad);
        // dd($person);
         //retun view(,compact($person));
         $nombreEstado    = $person->cod_estado;
         $nombreMunicipio = $person->cod_municipio;
         $nombreParroquia = $person->cod_parroquia;
         $center_cne_id   = $person->center_cne_id;


        // dd($filterCenters);
        if(!is_null($person)){




            if($nombreEstado == 'DTTO. CAPITAL'){
                $nombreEstado = 'CAPITAL';
            }else{
                $sWhere     =substr_replace( $nombreEstado,"",0,4);
                $nombreEstado		=trim(strtoupper($sWhere));
            }

            $filterEstados    = DB::table('estados')->where('descripcion','LIKE','%'.$nombreEstado.'%')->get();


            foreach($filterEstados as $filterEstado  ){
                $id_estado     = $filterEstado->id;
            }

            if($nombreMunicipio == 'MP. BLVNO LIBERTADOR' ){
                $nombreMunicipio = 'MP. LIBERTADOR';
            }

                $sWhereMuni     =substr_replace( $nombreMunicipio,"",0,4);
                $nombreMunicipio		=trim(strtoupper($sWhereMuni));


            $filterMunicipios = DB::table('municipios')->where('estado_id',$id_estado)->where('descripcion','LIKE','%'.$nombreMunicipio.'%')->get();
            foreach($filterMunicipios as $filterMunicipio  ){
                $id_municipio     = $filterMunicipio->id;
            }


            $sWhereParro     =substr_replace( $nombreParroquia,"",0,4);
            $nombreParroquia		=trim(strtoupper($sWhereParro));

            $filterParroquias = DB::table('parroquias')->where('municipio_id',$id_municipio)->where('descripcion','LIKE','%'.$nombreParroquia.'%')->get();

            foreach($filterParroquias as $filterParroquia){
                $id_parroquia     = $filterParroquia->id;
            }


            $filterCenters = DB::table('centercnes')->where('codigo',$center_cne_id)->get();

            foreach($filterCenters as $filterCenter){
                $codigo_viejo   = $filterCenter->codigo_viejo;
                $codigo         = $filterCenter->codigo;
                $condicion      = $filterCenter->condicion;
                $descripcion    = $filterCenter->descripcion;
                $direccion      = $filterCenter->direccion;
            }


            $CentroVotes = DB::table('centervotes')->where('codigo',$codigo)->get();


            if($CentroVotes == '' || $CentroVotes == null){
                $user= auth()->user();
                $centrovotes = new Centervote();

                $centrovotes->codigo_viejo         = $codigo_viejo;
                $centrovotes->codigo               = $codigo;
                $centrovotes->estado_id            = $id_estado;
                $centrovotes->municipio_id         = $id_municipio;
                $centrovotes->parroquia_id         = $id_parroquia;
                $centrovotes->condicion            = $condicion;
                $centrovotes->descripcion          = $descripcion;
                $centrovotes->direccion            = $direccion;
                $centrovotes->users_id             = $user->id;
                $centrovotes->status_id            = '1';

                $centrovotes->save();

            }else{

                return view('admin.persons.showcne',compact('person','filterEstados','filterMunicipios','filterParroquias','filterCenters'));
            }

            // return \redirect()->route('persons.showcne',$person->id);
            //return \response()->json($person,200);
        }else{
            session()->flash('message',"Disculpe no hemos encontrado a la persona");
            return back();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexinscrip()
    {

        $persons =People_temps::where('estatus','1')->orderBy('id' ,'DESC')->get();
        // dd($persons);
        return view('admin.persons.indexinscrip',compact('persons'));

    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Statusinscripciones($id)
    {
        // dd("llego");
        // $validar_pers =  People_temps::find($id);
        $personas                          =  People_temps::findOrFail($id);
        $personas->estatus                 = '2';
        $personas->save();

        $cnes =Cne::where('cedula',$personas->cedula)->get();

        foreach($cnes as $cne){
            $nombreEstado    = $cne->cod_estado;
            $nombreMunicipio = $cne->cod_municipio;
            $nombreParroquia = $cne->cod_parroquia;
            $center_cne_id   = $cne->center_cne_id;
        }

        if($nombreEstado == 'DTTO. CAPITAL'){
            $nombreEstado = 'CAPITAL';
        }else{
            $sWhere              =substr_replace( $nombreEstado,"",0,4);
            $nombreEstado		=trim(strtoupper($sWhere));
        }

        $filterEstados    = DB::table('estados')->where('descripcion','LIKE','%'.$nombreEstado.'%')->get();


        foreach($filterEstados as $filterEstado  ){
            $id_estado     = $filterEstado->id;
        }

        if($nombreMunicipio == 'MP. BLVNO LIBERTADOR' ){
            $nombreMunicipio = 'MP. LIBERTADOR';
        }

            $sWhereMuni         =substr_replace( $nombreMunicipio,"",0,4);
            $nombreMunicipio    =trim(strtoupper($sWhereMuni));


        $filterMunicipios = DB::table('municipios')->where('estado_id',$id_estado)->where('descripcion','LIKE','%'.$nombreMunicipio.'%')->get();
        foreach($filterMunicipios as $filterMunicipio  ){
            $id_municipio     = $filterMunicipio->id;
        }


        $sWhereParro     =substr_replace( $nombreParroquia,"",0,4);
        $nombreParroquia		=trim(strtoupper($sWhereParro));

        $filterParroquias = DB::table('parroquias')->where('municipio_id',$id_municipio)->where('descripcion','LIKE','%'.$nombreParroquia.'%')->get();

        foreach($filterParroquias as $filterParroquia){
            $id_parroquia     = $filterParroquia->id;
        }


        $filterCenters = DB::table('centercnes')->where('codigo',$center_cne_id)->get();

        // dd($filterCenters);

        foreach($filterCenters as $filterCenter){
            $codigo_viejo   = $filterCenter->codigo_viejo;
            $codigo         = $filterCenter->codigo;
            $condicion      = $filterCenter->condicion;
            $descripcion    = $filterCenter->descripcion;
            $direccion      = $filterCenter->direccion;
        }

        $CentroVotes = DB::table('centervotes')->where('codigo',$codigo)->get();

        foreach($CentroVotes as $CentroVote){
            $codigocenter = $CentroVote->codigo;
            // dd($codigocenter);
        }



        if(empty($codigocenter)){
            $user= auth()->user();
            $centrovotes = new Centervote();

            $centrovotes->codigo_viejo         = $codigo_viejo;
            $centrovotes->codigo               = $codigo;
            $centrovotes->estado_id            = $id_estado;
            $centrovotes->municipio_id         = $id_municipio;
            $centrovotes->parroquia_id         = $id_parroquia;
            $centrovotes->condicion            = $condicion;
            $centrovotes->descripcion          = $descripcion;
            $centrovotes->direccion            = $direccion;
            $centrovotes->users_id             = $user->id;
            $centrovotes->status_id            = '1';
            // dd($centrovotes);



            $centrovotes->save();
        }

        $segundo_nombre                   = $personas->nombre_seg;
        $segundo_apellido                 = $personas->apellido_seg;
        $user= auth()->user();

        $militantes = new Person();

        $militantes->nacionalidad         = $personas->nacionalidad;
        $militantes->cedula               = $personas->cedula;
        $militantes->nombre_pr            = $personas->nombre_pr;
        if($segundo_nombre == null){            //VALIDADOR DE SEGUNDO NOMBRE
            $segundo_nombre ='';
            $militantes->nombre_seg       = $segundo_nombre;
        }else{
            $militantes->nombre_seg       = $personas->nombre_seg;
        }

        $militantes->apellido_pr          = $personas->nombre_pr;

        if($segundo_apellido == null){          //VALIDADOR DE SEGUNDO APELLIDO
            $segundo_apellido ='';
            $militantes->apellido_seg     = $segundo_apellido;
        }else{
            $militantes->apellido_seg     = $personas->apellidos_seg;
        }

        $militantes->fecha_nac            = $personas->fecha_nac;
        $militantes->genero               = $personas->genero;
        $militantes->email                = $personas->email;
        $militantes->telf_local           = $personas->telf_local;
        $militantes->telf_celular         = $personas->telf_celular;
        $militantes->profession_id        = $personas->profession_id;
        $militantes->academiclevel_id     = $personas->academiclevel_id;
        $militantes->direccion            = $personas->direccion;
        $militantes->avenida              = $personas->avenida;
        $militantes->calle                = $personas->calle;
        $militantes->estado_id            = $personas->estado_id;
        $militantes->municipio_id         = $personas->municipio_id;
        $militantes->parroquia_id         = $personas->parroquia_id;
        $militantes->foto_img             = 'sin_foto.png';
        $militantes->users_id              = $user->id;
        $militantes->status_id           = '1';
        // dd($militantes);
        $militantes->save();


        return redirect('/persons')->withSuccess('Registro Exitoso!');



        // $validar_pers =  Person::find($id);
        // $persons =People_temps::orderBy('id' ,'DESC')->get();
        // return view('admin.persons.indexinscrip',compact('persons'));

    }
}
