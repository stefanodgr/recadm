<?php

namespace App\Http\Controllers;

use App\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
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
        try{
            $divisions =Division::orderBy('id', 'asc')->get();
              return view('admin.divisions.index',['divisions'=> $divisions]);
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
        return view('admin.divisions.create');
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
            'Nombre'         =>'required|max:255|unique:divisions,descripcion'
        ]);


        $divisions = new Division();

        $divisions->descripcion = request('Nombre');
        $divisions->status_id   = '1';

        $divisions->save();
        return redirect('/divisions')->withSuccess('Registro Exitoso!');
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
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        // get the post with the id $post->idata
        $divisions = Division::find($division->id);
        // dd($estado);
        return view('admin/divisions/edit', ['division' =>$divisions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        // dd($request);
        $validar =  Division::findOrFail($division->id);
        $data = request()->validate([
            'Nombre'         =>'required|max:255|unique:divisions,descripcion,'.$validar->id,
        ]);
        $division =  Division::findOrFail($division->id);
        $division->descripcion    = request('Nombre');
        // dd($division);
        $division->save();
        return redirect('/divisions')->withSuccess('Registro Editado Exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //find the Division
        $division = Division::find($request->division_id);

        //Elimina el Division
        $division->delete();
        return redirect('/divisions')->withDelete('Registro Eliminado Exitoso!');
    }
}