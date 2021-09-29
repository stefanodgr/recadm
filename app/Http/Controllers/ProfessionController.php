<?php

namespace App\Http\Controllers;
use App\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
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
        $professions =Profession::orderBy('id', 'asc')->get();
        return view('admin.professions.index',['professions'=> $professions]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.professions.create');
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
            'Nombre'         =>'required|max:255|unique:professions,descripcion'
        ]);

        $professions = new Profession();
        $professions->descripcion    = request('Nombre');
        $professions->save();

        return redirect('/professions')->withSuccess('Registro Exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Profession  profession
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Profession  profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        // get the post with the id $post->idata
        $profession = Profession::find($profession->id);
        // dd($profession);
        return view('admin/professions/edit', ['profession' =>$profession]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profession $profession)
    {
        $validar =  Profession::findOrFail($profession->id);
        $data = request()->validate([
            'Nombre'         =>'required|max:255|unique:professions,descripcion,'.$validar->id
        ]);

        $profession =  Profession::findOrFail($profession->id);
        $profession->descripcion    = request('Nombre');
        $profession->save();

        return redirect('/professions')->withSuccess('Registro Editado Exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //find the pr
        $profession = Profession::find($request->profession_id);

        //Elimina el Profession
        $profession->delete();
        return redirect('/professions')->withDelete('Registro Eliminado Exitoso!');
    }
}
