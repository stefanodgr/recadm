<?php

namespace App\Http\Controllers;
use App\Estado;
use App\Municipio;
use App\Parroquia;
use App\Localcommittee;
use Illuminate\Http\Request;

class LocalcommitteeController extends Controller
{

    /* AUTENTICADOR DE SESSION */
    public function __construct(){

    $this->middleware('auth');
    }

    public function list(Request $request, $id_parroquia = null){
        //validar si la peticion es asincrona
        if($request->ajax()){
            try{
                $committee = Localcommittee::select('id','descripcion')->where('parroquia_id',$id_parroquia)->orderBy('descripcion','asc')->get();
                return response()->json($committee,200);
            }catch(Throwable $th){
                return response()->json(false,500);
            }
        }
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{
           //PATALLA QUE CARGA DATA INDEX
           $localcommittees   =  Localcommittee::orderBy('id', 'asc')->get();
           return view('admin.localcommittees.index',['localcommittees'=> $localcommittees]);
        }catch(\Illuminate\Database\QueryException $qry_ex){//capturar excepciones de consultas en BD
            return view('errors.404');
        }catch(Throwable $th){//Capturar errores en General.
            return view('errors.404');
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $estados        = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        return view('admin.localcommittees.create',compact('estados'));
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
            'Nombre'            =>'required|max:120|unique:localcommittees,descripcion',
            'Estado'            =>'required|integer|not_in:0',
            'Municipio'         =>'required|integer|not_in:0',
            'Parroquia'         =>'required|integer|not_in:0',
            'Observaciones'     =>'max:200'
        ]);
        $user= auth()->user();
        $localcommittees = new Localcommittee();

        $localcommittees->descripcion           = request('Nombre');
        $localcommittees->estado_id             = request('Estado');
        $localcommittees->municipio_id          = request('Municipio');
        $localcommittees->parroquia_id          = request('Parroquia');
        $localcommittees->observaciones         = request('Observaciones');
        $localcommittees->users_id              = $user->id;
        $localcommittees->status_id           = '1';
        $localcommittees->save();
        return redirect('/localcommittees')->withSuccess('Registro Exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Localcommittee  $localcommitte
     * @return \Illuminate\Http\Response
     */
    public function show(Localcommittee $localcommittee)
    {
        //
        $localcommittee             =   Localcommittee::find($localcommittee->id);
        return view('admin.localcommittees.show',compact('localcommittee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Localcommittee  $localcommittee
     * @return \Illuminate\Http\Response
     */
    public function edit(Localcommittee $localcommittee=null)
    {

      // get the post with the id $post->idata
      $localcommittee   =   Localcommittee::find($localcommittee->id);
    //   dd($localcommittee);
        
      $estados          =   Estado::all();
      $municipios       =   Municipio::all();
      $parroquias       =   Parroquia::all();
      
      // return  view
      return view('admin.localcommittees.edit',compact('localcommittee','estados','municipios','parroquias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Localcommittee  $localcommittee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Localcommittee $localcommittee)
    {
        //
        $validar =  Localcommittee::findOrFail($localcommittee->id);
        $data = request()->validate([
            'Nombre'            =>'required|max:120|unique:centervotes,descripcion,'.$validar->id,
            'Estado'            =>'required|integer|not_in:0',
            'Municipio'         =>'required|integer|not_in:0',
            'Parroquia'         =>'required|integer|not_in:0',
            'Observaciones'     =>'max:200'

        ]);
        $user= auth()->user();
        $localcommittees =  Localcommittee::findOrFail($localcommittee->id);

        $localcommittees->descripcion           = request('Nombre');
        $localcommittees->estado_id             = request('Estado');
        $localcommittees->municipio_id          = request('Municipio');
        $localcommittees->parroquia_id          = request('Parroquia');
        $localcommittees->observaciones         = request('Observaciones');
        $localcommittees->users_id              = $user->id;
        $localcommittees->status_id             = '1';
        $localcommittees->save();
        return redirect('/localcommittees')->withSuccess('Registro Editado Exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Localcommitte  $localcommitte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

        $localcommittee = Localcommittee::find($request->localcommittee_id);
        //delete the Localcommittee
        $localcommittee->delete();
        return redirect('/localcommittees')->withDelete('Registro Eliminado Exitoso!');
    }
}
