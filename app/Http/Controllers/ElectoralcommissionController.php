<?php

namespace App\Http\Controllers;

use App\Electoralcommission;
use Illuminate\Http\Request;

class ElectoralcommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{
            // dd("hola llego");
            $electoralcommissions =Electoralcommission::orderBy('id', 'asc')->get();
            return view('admin.electoralcommissions.index',['electoralcommissions'=> $electoralcommissions]);
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
        return view('admin.electoralcommissions.create');
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
            'Nombre'    =>'required|max:100|unique:electoralcommissions,descripcion',
            'Fecha'     =>'required'
        ]);

        $user= auth()->user();
        $electoralcommission = new Electoralcommission();

        $electoralcommission->descripcion       = request('Nombre');
        $electoralcommission->fecha             = request('Fecha');
        $electoralcommission->users_id            = $user->id;
        $electoralcommission->status_id         = '1';
        

        $electoralcommission->save();
        return redirect('/electoralcommissions')->withSuccess('Registro Exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Electoralcommission  $electoralcommission
     * @return \Illuminate\Http\Response
     */
    public function show(Electoralcommission $electoralcommission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Electoralcommission  $electoralcommission
     * @return \Illuminate\Http\Response
     */
    public function edit(Electoralcommission $electoralcommission)
    {
      // get the electoralcommission with the id $electoralcommission->idata
      $electoralcommission = Electoralcommission::find($electoralcommission->id);
 
      return view('admin/electoralcommissions/edit', ['electoralcommission' =>$electoralcommission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Electoralcommission  $electoralcommission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Electoralcommission $electoralcommission)
    {
     // dd($request);
     $validar =  Electoralcommission::findOrFail($electoralcommission->id);
     $data = request()->validate([
         'Nombre'         =>'required|max:100|unique:electoralcommissions,descripcion,'.$validar->id,
         'Fecha'          =>'required'
     ]);
     $electoralcommission =  Electoralcommission::findOrFail($electoralcommission->id);
     $electoralcommission->descripcion    = request('Nombre');
     $electoralcommission->fecha          = request('Fecha');

     $electoralcommission->save();
     return redirect('/electoralcommissions')->withSuccess('Registro Editado Exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Electoralcommission  $electoralcommission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //find the electoralcommission
        $electoralcommission = Electoralcommission::find($request->electoralcommission_id);

        //Elimina el electoralcommission
        $electoralcommission->delete();
        return redirect('/electoralcommissions')->withDelete('Registro Eliminado Exitoso!');
    }
}
