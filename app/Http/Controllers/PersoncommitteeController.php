<?php

namespace App\Http\Controllers;
use App\Personcommittee;            //IMPORTANTE NOMBRE DE LA CLASE 
use App\Person;                     //IMPORTANTE NOMBRE DE LA CLASE 
use App\Position;                   //IMPORTANTE NOMBRE DE LA CLASE 
use App\Localcommittee;             //IMPORTANTE NOMBRE DE LA CLASE

use App\Estado;                 //IMPORTANTE NOMBRE DE LA CLASE
use App\Municipio;              //IMPORTANTE NOMBRE DE LA CLASE
use App\Parroquia;              //IMPORTANTE NOMBRE DE LA CLASE

use Illuminate\Http\Request;

class PersoncommitteeController extends Controller
{

    /* AUTENTICADOR DE SESSION */
    public function __construct(){

    $this->middleware('auth');
    }
    public function indexpersons()
    {
    
        try{
            $persons = Personcommittee::getPeoplesNotCommittee();
            return view('admin.personscommittees.indexpersons',['persons'=> $persons]);
        }catch(\Illuminate\Database\QueryException $qry_ex){//capturar excepciones de consultas en BD
            return view('errors.404');
        }catch(Throwable $th){//Capturar errores en General.
            return view('errors.404');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
      $personcommittees =Personcommittee::orderBy('id', 'desc')->get();
      return view('admin.personscommittees.index',compact('personcommittees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Person $personscommitte)
    {
        $personscommitte    = Person::find($personscommitte->id);
        // $position = Position::select('id','descripcion')->where('id','4')->orderBy('descripcion','asc')->get();
        // $position           = Position::all();
        // dd($position);
        $position          = Position::where('divisions_id','18')->pluck('descripcion','id')->toArray();
        // dd($position);
        $estados           = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        return view('admin.personscommittees.create',compact('personscommitte','estados','position'));
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
            'idperson'          =>'required',
            'Estado'            =>'required|integer|not_in:0',
            'Municipio'         =>'required|integer|not_in:0',
            'Parroquia'         =>'required|integer|not_in:0',
            'Comites'           =>'required|integer|not_in:0',
            'Cargos'             =>'required|integer|not_in:0',
            'Observaciones'     =>'max:200'
            
        ]);

        $user= auth()->user();
        $personscommittees = new Personcommittee();

        $personscommittees->person_id            = request('idperson');
        $personscommittees->localcommitte_id     = request('Comites');
        $personscommittees->position_id          = request('Cargos');
        $personscommittees->observaciones        = request('Observaciones');
        $personscommittees->users_id              = $user->id;
        $personscommittees->status_id           = '1';

// dd($personscommittees);
        $personscommittees->save();

        return redirect('/personscommittees')->withSuccess('Registro Exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Personcommittee  $personcommittee
     * @return \Illuminate\Http\Response
     */
    public function show(Personcommittee $personscommittee)
    {
        $personscommittee   =   Personcommittee::find($personscommittee->id);
        $person             =   Person::find($personscommittee->person_id);
        $localcommittees    =   Localcommittee::find($personscommittee->localcommitte_id);
        $positions          =   Position::find($personscommittee->position_id);

        $localcommiteeData  =   Localcommittee::all();
        $estados            =   Estado::all();
        $municipios         =   Municipio::all();
        $positions          =   Position::all();
        $parroquias         =   Parroquia::all();

        return view('admin.personscommittees.show',compact('personscommittee','person','localcommittees','positions','estados','municipios','parroquias','localcommiteeData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Personcommittee  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Personcommittee $personscommittee)
    {
           
        $personscommittee   =   Personcommittee::find($personscommittee->id);
        $person             =   Person::find($personscommittee->person_id);
        $localcommittees    =   Localcommittee::find($personscommittee->localcommitte_id);


        $localcommiteeData  =   Localcommittee::all();
        $estados            =   Estado::all();
        $municipios         =   Municipio::all();
        $positions         =   Position::all();
        $positiones          =    Position::where('divisions_id','18')->pluck('descripcion','id')->toArray();
        $parroquias         =   Parroquia::all();

        return view('admin.personscommittees.edit',compact('personscommittee','person','localcommittees','positions','positiones','estados','municipios','parroquias','localcommiteeData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Personcommittee  $personscommittee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personcommittee $personscommittee)
    {
        $data = request()->validate([
            'idperson'          =>'required',
            'Estado'            =>'required|integer|not_in:0',
            'Municipio'         =>'required|integer|not_in:0',
            'Parroquia'         =>'required|integer|not_in:0',
            'Comites'           =>'required|integer|not_in:0',
            'Cargos'             =>'required|integer|not_in:0',
            'Observaciones'     =>'max:200'

       ]);
        $user= auth()->user();
        $personscommittees =  Personcommittee::findOrFail($personscommittee->id);
        $personscommittees->person_id            = request('idperson');
        $personscommittees->localcommitte_id     = request('Comites');
        $personscommittees->position_id     = request('Cargos');
        $personscommittees->observaciones        = request('Observaciones');
        $personscommittees->users_id              = $user->id;
        $personscommittees->status_id           = '1';
        // dd($personscommittees);
        $personscommittees->save();

       return redirect('/personscommittees')->withSuccess('Registro Editado Exitoso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Personcommittee  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
     //capturar id
     $personscommittee = Personcommittee::find($request->personscommittee_id);
    

     //delete the personscommittee
     $personscommittee->delete();
     return redirect('/personscommittees')->withDelete('Registro Eliminado Exitoso!');
    }

}
