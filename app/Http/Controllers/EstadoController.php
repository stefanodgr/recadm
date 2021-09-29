<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados =Estado::orderBy('id', 'asc')->get();

        return view('admin.estados.index',['estados'=> $estados]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.estados.create');
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
         // dd($request);
         $data = request()->validate([
            'nombre'         =>'required|max:255'
        ]);


        $estados = new Estado();
        $estados->descripcion    = request('nombre');
        $estados->save();
        return redirect('/estados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function show(Estados $estados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        // get the post with the id $post->idata
        $estado = Estado::find($estado->id);
        // dd($estado);
        return view('admin/estados/edit', ['estado' =>$estado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
        // dd($request);
        $data = request()->validate([
            'nombre'         =>'required|max:255',
        ]);
        $estado =  Estado::findOrFail($estado->id);
        $estado->descripcion    = request('nombre');
        // dd($estado);
        $estado->save();
        return redirect('/estados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        //find the Estado
        $estado = Estado::find($request->estado_id);

        //Elimina el Estado
        $estado->delete();
        return redirect('/estados');
    }
}
