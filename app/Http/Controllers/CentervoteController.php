<?php

namespace App\Http\Controllers;
use App\Centervote;
use App\Estado;
use App\Municipio;
use App\Parroquia;
use Illuminate\Http\Request;

class CentervoteController extends Controller
{

    /* AUTENTICADOR DE SESSION */
    public function __construct(){

        $this->middleware('auth');
    }

    public function list(Request $request, $id_parroquia = null){
        //validar si la peticion es asincrona
        if($request->ajax()){
            try{
                $centervote = Centervote::select('id','descripcion')->where('parroquia_id',$id_parroquia)->orderBy('descripcion','asc')->get();
                return response()->json($centervote,200);
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
        //PATALLA QUE CARGA DATA INDEX
        $centervotes   =  Centervote::orderBy('id', 'asc')->get();
        // dd($centervotes);
        return view('admin.centervotes.index',['centervotes'=> $centervotes]);
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
        return view('admin.centervotes.create',compact('estados'));
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
            'Codigo'            =>'required|max:30|unique:centervotes,codigo',
            'Nombre'            =>'required|max:200|unique:centervotes,descripcion',
            'Estado'            =>'required|integer|not_in:0',
            'Municipio'         =>'required|integer|not_in:0',
            'Parroquia'         =>'required|integer|not_in:0',
            'Circuito_Municipio'=>'required|max:200',
            'Direccion'         =>'required|max:200',
            'Nr_Mesas'          =>'required|not_in:0',
            'Centro_Acopio'     =>'required|not_in:0',
            'Remoto'            =>'required|not_in:0',
            'Tecnologia'        =>'required|max:100',
            'Estrato'           =>'required|max:100',
            'Muestra'           =>'required|max:100'
        ]);
        $user= auth()->user();
        $centervotes = new Centervote();

        $centervotes->codigo                = request('Codigo');
        $centervotes->descripcion           = request('Nombre');
        $centervotes->estado_id             = request('Estado');
        $centervotes->municipio_id          = request('Municipio');
        $centervotes->parroquia_id          = request('Parroquia');
        $centervotes->circuito_municipio    = request('Circuito_Municipio');
        $centervotes->direccion             = request('Direccion');
        $centervotes->num_mesas             = request('Nr_Mesas');
        $centervotes->centro_acopio         = request('Centro_Acopio');
        $centervotes->remoto                = request('Remoto');
        $centervotes->tecnologia            = request('Tecnologia');
        $centervotes->estrato               = request('Estrato');
        $centervotes->muestra               = request('Muestra');
        $centervotes->users_id              = $user->id;
        $centervotes->status_id           = '1';
        $centervotes->save();
        return redirect('/centervotes')->withSuccess('Registro Exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Centervote  $centervote
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Centervote  centervote
     * @return \Illuminate\Http\Response
     */
    public function edit(Centervote $centervote = null)
    {
        // get the post with the id $post->idata
        $centervote = Centervote::find($centervote->id);
        
        $estados    =   Estado::all();
        $municipios =   Municipio::all();
        $parroquias =   Parroquia::all();
        
        // return  view
        return view('admin.centervotes.edit',compact('centervote','estados','municipios','parroquias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Centervote  $centervote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Centervote $centervote)
    {
        $validar =  Centervote::findOrFail($centervote->id);
        $data = request()->validate([
            'Codigo'            =>'required|max:30|unique:centervotes,codigo,'.$validar->id,
            'Nombre'            =>'required|max:200|unique:centervotes,descripcion,'.$validar->id,
            'Estado'            =>'required|integer|not_in:0',
            'Municipio'         =>'required|integer|not_in:0',
            'Parroquia'         =>'required|integer|not_in:0',
            'Circuito_Municipio'=>'required|max:200',
            'Direccion'         =>'required|max:200',
            'Nr_Mesas'          =>'required',
            'Centro_Acopio'     =>'required',
            'Remoto'            =>'required',
            'Tecnologia'        =>'required|max:100',
            'Estrato'           =>'required|max:100',
            'Muestra'           =>'required|max:100'
        ]);
        $user= auth()->user();
        $centervotes =  Centervote::findOrFail($centervote->id);

        $centervotes->codigo                = request('Codigo');
        $centervotes->descripcion           = request('Nombre');
        $centervotes->estado_id             = request('Estado');
        $centervotes->municipio_id          = request('Municipio');
        $centervotes->parroquia_id          = request('Parroquia');
        $centervotes->circuito_municipio    = request('Circuito_Municipio');
        $centervotes->direccion             = request('Direccion');
        $centervotes->num_mesas             = request('Nr_Mesas');
        $centervotes->centro_acopio         = request('Centro_Acopio');
        $centervotes->remoto                = request('Remoto');
        $centervotes->tecnologia            = request('Tecnologia');
        $centervotes->estrato               = request('Estrato');
        $centervotes->muestra               = request('Muestra');
        $centervotes->users_id              = $user->id;
        $centervotes->status_id             = '1';
        $centervotes->save();
        return redirect('/centervotes')->withSuccess('Registro Editado Exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Centervote  $centervote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $centervote = Centervote::find($request->centervote_id);
        //delete the post
        $centervote->delete();
        return redirect('/centervotes')->withDelete('Registro Eliminado Exitoso!');
    }
    
}
