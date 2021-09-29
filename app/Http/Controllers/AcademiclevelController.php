<?php

namespace App\Http\Controllers;
use App\Academiclevel;
use Illuminate\Http\Request;

class AcademiclevelController extends Controller
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
        //
        $academiclevels =Academiclevel::orderBy('id', 'asc')->get();
        // dd($academiclevels);
        return view('admin.academiclevels.index',['academiclevels'=> $academiclevels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.academiclevels.create');
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
            'Nombre'         =>'required|max:255|unique:academiclevels,descripcion'
        ]);

        $academiclevels = new Academiclevel();
        $academiclevels->descripcion    = request('Nombre');
        $academiclevels->save();
        return redirect('/academiclevels')->withSuccess('Registro Exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Academiclevel  $academiclevels
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Academiclevel  $academiclevels
     * @return \Illuminate\Http\Response
     */
    public function edit(Academiclevel $academiclevel)
    {

        // get the academiclevels with the id $variable->idata
        $academiclevel = Academiclevel::find($academiclevel->id);
        return view('admin/academiclevels/edit', ['academiclevel' =>$academiclevel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Academiclevel  $academiclevels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academiclevel $academiclevel)
    {
        $validar =  Academiclevel::findOrFail($academiclevel->id);
        $data =  request()->validate([
            'Nombre'         =>'required|max:255|unique:academiclevels,descripcion,'.$validar->id
        ]);
        $academiclevel =  Academiclevel::findOrFail($academiclevel->id);
        $academiclevel->descripcion    = request('Nombre');
        $academiclevel->save();
        return redirect('/academiclevels')->withSuccess('Registro Editado Exitoso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Academiclevel  $academiclevels
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //find the Academiclevel
        $academiclevel = Academiclevel::find($request->academiclevel_id);

        //Elimina el Academiclevel
        $academiclevel->delete();
        return redirect('/academiclevels')->withDelete('Registro Eliminado Exitoso!');
    }
}
