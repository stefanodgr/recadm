<?php

namespace App\Http\Controllers;
use App\Strengthening;
use App\Estado;                 //IMPORTANTE NOMBRE DE LA CLASE
use App\Municipio;              //IMPORTANTE NOMBRE DE LA CLASE
use App\Parroquia;              //IMPORTANTE NOMBRE DE LA CLASE
use App\Division;
use App\Activitie;
use Illuminate\Http\Request;

class StrengtheningController extends Controller
{
 
     public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {
        $user= auth()->user();
        $strengthenings =Strengthening::orderBy('id' ,'DESC')->get();
        //dd($user->estado_id);

        //$rol = $user->roles();
        //dd($rol);
        //$persons = Person::where('estado_id', $user->estado_id)
                            //->orderBy('id', 'DESC')
                            //->get();
        // dd($persons);
        return view('admin.strengthenings.index',compact('strengthenings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $datetime = date('d/m/Y T08:30');
        $estados            = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $municipios         = Municipio::all();
        $parroquias         = Parroquia::all();
        $divisions          = Division::all();
        $activities         = Activitie::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();   
        return view('admin.strengthenings.create',compact('estados','municipios','parroquias','divisions','activities'));
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
}
