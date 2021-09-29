<?php

namespace App\Http\Controllers;
use App\Cne;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CneController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $persons =Person::orderBy('id' ,'DESC')->get();
        // dd($persons);
        return view('admin.cne.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show( Test $id)
    {
        //
        dd($id);
        $singular = Str::singular($id);

        $personscommittee   =   Test::find($id->id);
        // $person             =   Test::find($personscommittee->person_id);
        // dd($personscommittee);
        // $id          = Test::where('cedula',$id)->get();
        // $id             =   Test::find($id['cedula']);
        // $position          = Test::where('cedula',$id)->pluck('descripcion','id')->toArray();
        // dd($position);
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
