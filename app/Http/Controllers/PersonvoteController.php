<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Centervote;            //IMPORTANTE NOMBRE DE LA CLASE
use App\Personvote;            //IMPORTANTE NOMBRE DE LA CLASE
use App\Position;              //IMPORTANTE NOMBRE DE LA CLASE
use App\Estado;                 //IMPORTANTE NOMBRE DE LA CLASE
use App\Municipio;              //IMPORTANTE NOMBRE DE LA CLASE
use App\Parroquia;              //IMPORTANTE NOMBRE DE LA CLASE
use App\Person;                 //IMPORTANTE NOMBRE DE LA CLASE 
use App\Electorallist;         //IMPORTANTE NOMBRE DE LA CLASE
use App\Electoralcommission;         //IMPORTANTE NOMBRE DE LA CLASE
use App\Cne;         //IMPORTANTE NOMBRE DE LA CLASE


class PersonvoteController extends Controller
{

    /* AUTENTICADOR DE SESSION */
    public function __construct(){

        $this->middleware('auth');
    }
    public function indexpersons()
    {
    
        try{
            $persons = Personvote::getPeoplesNotVote();
            return view('admin.personsvotes.indexpersons',['persons'=> $persons]);
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
        $personvotes =Personvote::orderBy('id', 'desc')->get();
        // $centervotes =Centervote::all();
        // dd($personvotes);
        return view('admin.personsvotes.index',compact('personvotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Person $personvot)
    {
            $personvot          = Person::find($personvot->id);
            // dd($personvot);
            // $persons            = Person::find($personvot->id);
            $cedula             = $personvot->cedula;
            // $cnes               = Cne::all();
            
            
            // $filterPerson    = DB::table('cnes')->where('descripcion','LIKE','%'.$nombreEstado.'%')->get();
            $filterPersons       = DB::table('cnes')->where('cedula',$cedula)->get();
            // dd($filterPersons);

            foreach($filterPersons as $filterPerson){
                $center_cne_id = $filterPerson->center_cne_id;

            }
            $filterCenters       = DB::table('centervotes')->where('codigo',$center_cne_id)->get();

            // dd($filterCenters);

            // foreach($filterCenters as $filterCenter){
            //     $id_estado = $filterCenter->estado_id

            // }
            $electorallist      = Electorallist::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
            $estados            = Estado::all();
            $municipios         = Municipio::all();
            $parroquias         = Parroquia::all();
            $centervotes         = Centervote::all();
            
            $periodo            = Electoralcommission::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
            return view('admin.personsvotes.create',compact('personvot','estados','municipios','parroquias','electorallist','periodo','filterCenters','centervotes'));
        
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
       //
       $data = request()->validate([
        'Centro_Votacion'   =>'required|integer|not_in:0',
        'Estado'            =>'required|integer|not_in:0',
        'Municipio'         =>'required|integer|not_in:0',
        'Parroquia'         =>'required|integer|not_in:0',
        'Observaciones'     =>'max:200',
        'Cargo_Electoral'   =>'required|integer|not_in:0',
        'Periodo'           =>'required|integer|not_in:0',
        'idperson'          =>'required'
    ]);

    $user= auth()->user();
    $personsvotes = new Personvote();

    $personsvotes->person_id            = request('idperson');
    $personsvotes->centervote_id        = request('Centro_Votacion');
    $personsvotes->observaciones        = request('Observaciones');
    $personsvotes->electorallist_id     = request('Cargo_Electoral');
    $personsvotes->periodo_id           = request('Periodo');
    $personsvotes->users_id             = $user->id;
    $personsvotes->status_id            = '1';

    // dd($personsvotes);
    $personsvotes->save();

    return redirect('/personsvotes')->withSuccess('Registro Exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Personvote $personsvote)
    {
        // DATA REPORTE
        $personsvote                =   Personvote::find($personsvote->id);
        $person                     =   Person::find($personsvote->person_id);
        $centervotes                =   Centervote::find($personsvote->centervote_id);
        $estados                    =   Estado::all();
        $municipios                 =   Municipio::all();
        $parroquias                 =   Parroquia::all();
        $electoralcommissions       =   Electoralcommission::all();
        $electorallists             =   Electorallist::all();

        return view('admin.personsvotes.show',compact('personsvote','person','estados','municipios','parroquias','centervotes','electoralcommissions','electorallists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Personvote $personsvote)
    {
        //

        $personsvote                =   Personvote::find($personsvote->id);
        $centervotes                =   Centervote::find($personsvote->centervote_id);
        $person                     =   Person::find($personsvote->person_id);
        $electorallists             =   Electorallist::all();
        // dd($electorallist);
        $estados                    =   Estado::all();
        $municipios                 =   Municipio::all();
        $parroquias                 =   Parroquia::all();
        $electoralcommissions       =   Electoralcommission::all();

        return view('admin.personsvotes.edit',compact('person','personsvote','estados','municipios','parroquias','centervotes','electorallists','electoralcommissions'));
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personvote $personsvote)
    {
        //
            $data = request()->validate([
                'Centro_Votacion'   =>'required|integer|not_in:0',
                'Estado'            =>'required|integer|not_in:0',
                'Municipio'         =>'required|integer|not_in:0',
                'Parroquia'         =>'required|integer|not_in:0',
                'Observaciones'     =>'max:200',
                'Cargo_Electoral'   =>'required|integer|not_in:0',
                'Periodo'           =>'required|integer|not_in:0',
                'idperson'          =>'required'

       ]);
       
       $user= auth()->user();
       $personsvotes =  Personvote::findOrFail($personsvote->id);
       $personsvotes->person_id            = request('idperson');
       $personsvotes->observaciones        = request('Observaciones');
       $personsvotes->centervote_id        = request('Centro_Votacion');
       $personsvotes->electorallist_id     = request('Cargo_Electoral');
       $personsvotes->periodo_id           = request('Periodo');
       $personsvotes->users_id             = $user->id;
       $personsvotes->status_id            = '1';
    //    dd($personsvotes);
       $personsvotes->save();

       return redirect('/personsvotes')->withSuccess('Registro Editado Exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
             //find the post
     $personsvote = Personvote::find($request->personsvote_id);
    

     //delete the personstructure
     $personsvote->delete();
     return redirect('/personsvotes')->withDelete('Registro Eliminado Exitoso!');
    }
}
