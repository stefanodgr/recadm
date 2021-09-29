<?php

namespace App\Http\Controllers;
use App\Position;
use App\Division;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    
    /* AUTENTICADOR DE SESSION */
    public function __construct(){

        $this->middleware('auth');
    }

    public function list(Request $request, $id_division = null){
        //validar si la peticion es asincrona
        if($request->ajax()){
            try{
                $position = Position::select('id','descripcion')->where('divisions_id',$id_division)->orderBy('descripcion','asc')->get();
                return response()->json($position,200);
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
        $positions   =  Position::orderBy('id', 'asc')->get();
       
        return view('admin.positions.index',['positions'=> $positions]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CARGA LA PANTALLA /admin/positions/create
        $divisions =  Division::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        return view('admin.positions.create',compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $data = request()->validate([
        'Division'   =>'required|integer|not_in:0',
        'Nombre'     =>'required|max:255|unique:positions,descripcion'
        ]);

        $positions = new Position();
        $positions->descripcion    = request('Nombre');
        $positions->divisions_id    = request('Division');
        $positions->status_id      = '1';
        $positions->save();
  
        return redirect('/positions')->withSuccess('Registro Exitoso!');
    
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
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position )
    {
        // EXTRAE DEL LA DATA DEL  id $position->idata
        $position       = Position::find($position->id);
        $divisions     = Division::all();
        // dd($position);
        return view('admin/positions/edit',compact('position','divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Position $position )
    {
        $validar =  Position::findOrFail($position->id);
        $data = request()->validate([
            'Division'   =>'required|integer|not_in:0',
            'Nombre'     =>'required|max:255|unique:positions,descripcion,'.$validar->id
            ]);

        $positions =  Position::findOrFail($position->id);
        $positions->descripcion    = request('Nombre');
        $positions->divisions_id    = request('Division');
        $positions->status_id      = '1';
        $positions->save();
        return redirect('/positions')->withSuccess('Registro Editado Exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $position = Position::find($request->position_id);

        //Elimina el position
        $position->delete();
        return redirect('/positions')->withDelete('Registro Eliminado Exitoso!');
    }
}
