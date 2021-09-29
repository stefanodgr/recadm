<?php

namespace App\Http\Controllers;
use App\Rules\Personstruture\ValidEstado;
use App\Rules\Personstruture\ValidMunicipio;
use App\Rules\Personstruture\ValidParroquia;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Person;                 //IMPORTANTE NOMBRE DE LA CLASE
use App\Personstructure;        //IMPORTANTE NOMBRE DE LA CLASE
use App\Estado;                 //IMPORTANTE NOMBRE DE LA CLASE
use App\Municipio;              //IMPORTANTE NOMBRE DE LA CLASE
use App\Parroquia;              //IMPORTANTE NOMBRE DE LA CLASE
use App\Division;              //IMPORTANTE NOMBRE DE LA CLASE
use App\Position;              //IMPORTANTE NOMBRE DE LA CLASE
use App\User;             //IMPORTANTE NOMBRE DE LA CLASE

class PersonstructureController extends Controller
{
   /* AUTENTICADOR DE SESSION */
    public function __construct(){

        $this->middleware('auth');
    }

    public function indexpersons()
    {

        $user           =   auth()->user();
        $users_role     =   $user->role_id;
        $estado         =   $user->estado_id;
        try{
            if($users_role == '1'){
               $persons = Personstructure::getPeoplesNotStructure();
                return view('admin.personstructure.indexpersons',['persons'=> $persons]);
            }elseif($users_role == '2'){
               // $persons = Personstructure::getPersonStructureCoord();
                $persons = Personstructure::getPersonStructureNotExists($user->person_id);
                if ($persons == null || $persons == " "){
                    return redirect('/personstructure')->withDanger('No tiene militantes para su municipio!');
                }else{
                    return view('admin.personstructure.indexpersons',['persons'=> $persons]);
                }

            }

        }catch(\Illuminate\Database\QueryException $qry_ex){//capturar excepciones de consultas en BD
            return view('errors.404');
        }catch(Throwable $th){//Capturar errores en General.
            return view('errors.404');
        }

        // dd($persons);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $personstructures =Personstructure::orderBy('id', 'desc')->get();
        // dd($personsStructure);
        return view('admin.personstructure.index',['personstructures'=> $personstructures]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Person $personstru)
    {
        $personstru         = Person::find($personstru->id);
        $user           =   auth()->user();
        $users_role     =   $user->role_id;

        if($users_role == '1'){
            $estados            = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
            $municipios         = Municipio::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();

            $divisions       =  Division::orderBy('descripcion', 'asc')->whereNotIn('id', [20])->get();
        }else if($users_role == '2'){
            $estados            = User::userEstado();
            $municipios         = User::userMunicipio();

            $divisions       =  Division::orderBy('descripcion', 'asc')->where('role_id','2')->orwhere('role_id','3')->whereNotIn('id', [20])->get();
        }else{
            $estados            = User::userEstado();
            $municipios         = User::userMunicipio();

            $divisions       =  Division::orderBy('descripcion', 'asc')->whereNotIn('id', [20])->get();
        }


        // dd($person);
        // $estados         =  Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        return view('admin.personstructure.create',compact('personstru','estados','municipios'),['divisions'=> $divisions]);

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
        $data = request()->validate([
            'Division'          =>'required|integer|not_in:0',
            'Cargo'             =>'required|integer|not_in:0',
            'Observaciones'     =>'max:200',
            'Estado'            =>[new ValidEstado],
            'Municipio'         =>[new ValidMunicipio],
            'Parroquia'         =>[new ValidParroquia],
            'idperson'          =>'required'
        ]);


      $Division    = $request->Division;
      $Cargo       = $request->Cargo;
      $Estado      = $request->Estado;

      $personStructureData = Personstructure::getPersonStructureExist($Division,$Cargo,$Estado);
    //   dd($personStructureData);
      if($personStructureData <> null){
          session()->flash('message',"Ya existe la Division para ese Estado ");
          return back();
      }else{
        $user= auth()->user();
        $personstructures = new Personstructure();

        $personstructures->person_id             = request('idperson');
        $personstructures->division_id          = request('Division');
        $personstructures->position_id          = request('Cargo');
        $personstructures->observaciones        = request('Observaciones');
        $personstructures->estado_id            = request('Estado');
        $personstructures->municipio_id         = request('Municipio');
        $personstructures->parroquia_id         = request('Parroquia');
        $personstructures->users_id              = $user->id;
        $personstructures->status_id           = '1';
        // dd($personstructures);
        $personstructures->save();

        return redirect('/personstructure')->withSuccess('Registro Exitoso!');
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Personstructure $personstructure)
    {
        // DATA REPORTE
        $personstructure    =   Personstructure::find($personstructure->id);
        $person             =   Person::find($personstructure->person_id);
        $estados            =   Estado::all();
        $municipios         =   Municipio::all();
        $divisions          =   Division::all();
        $positions          =   Position::all();
        $parroquias         =   Parroquia::all();
        return view('admin.personstructure.show',compact('personstructure','person','estados','municipios','parroquias','divisions','positions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Personstructure  $personsStructure
     * @return \Illuminate\Http\Response
     */
    public function edit(Personstructure $personstructure)
    {
        $personstructure    =   Personstructure::find($personstructure->id);
        $person             =   Person::find($personstructure->person_id);
        $estados       = User::userEstado();
        $estadosData    = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $municipios     = User::userMunicipio();
        $municipioId           = auth()->user()->municipio_id;
        $divisions          =   Division::all();
        $positions          =   Position::all();
        $parroquias         =   Parroquia::all();
        return view('admin.personstructure.edit',compact('municipioId','estadosData','personstructure','person','estados','municipios','parroquias','divisions','positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Personstructure  $personstructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personstructure $personstructure)
    {
        $data = request()->validate([
            'Division'          =>'required|integer|not_in:0',
            'Cargo'             =>'required|integer|not_in:0',
            'Observaciones'     =>'max:200',
            'Estado'            =>[new ValidEstado],
            'Municipio'         =>[new ValidMunicipio],
            'Parroquia'         =>[new ValidParroquia],
            'idperson'          =>'required'

       ]);


       $user= auth()->user();
       $personstructures =  Personstructure::findOrFail($personstructure->id);
       $personstructures->person_id            = request('idperson');
       $personstructures->division_id          = request('Division');
       $personstructures->position_id          = request('Cargo');
       $personstructures->observaciones        = request('Observaciones');
       $personstructures->estado_id            = request('Estado');
       $personstructures->municipio_id         = request('Municipio');
       $personstructures->parroquia_id         = request('Parroquia');
       $personstructures->users_id              = $user->id;
       $personstructures->status_id           = '1';
    //    dd($personstructures);
       $personstructures->save();

       return redirect('/personstructure')->withSuccess('Registro Editado Exitoso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
     //find the post
     $personstructure = Personstructure::find($request->personstructure_id);


     //delete the personstructure
     $personstructure->delete();
     return redirect('/personstructure')->withDelete('Registro Eliminado Exitoso!');
    }


}
