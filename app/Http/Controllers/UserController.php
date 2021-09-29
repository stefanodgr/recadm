<?php

namespace App\Http\Controllers;

use App\Academiclevel;
use App\Cne;
use App\Parroquia;
use App\Person;
use App\Profession;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Estado;                 //IMPORTANTE NOMBRE DE LA CLASE
use App\Municipio;              //IMPORTANTE NOMBRE DE LA CLASE

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Permission\Models\Role;



class UserController extends Controller
{
    //
    public function index()
    {
        $user       =   auth()->user();
        $users_role =   $user->role_id;
        if($users_role == '1'){
            $users      =   User::orderBy('id', 'asc')->get();
        }elseif($users_role == '2'){
            $users      =   User::orderBy('id', 'asc')->where('estado_id',$user->estado_id)->get();
        }

        //return($users_roles);
        return view('admin.users.index',compact('users'));

    }

    public function indexpersons()
    {


        try{
            $persons = Person::getPeoplesNotUser();

            return view('admin.users.indexpersons',['persons'=> $persons]);

        }catch(\Illuminate\Database\QueryException $qry_ex){//capturar excepciones de consultas en BD

            return view('errors.404');

        }catch(Throwable $th){//Capturar errores en General.

            return view('errors.404');
        }

        // dd($persons);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $personregister         = Person::find($id);
        $estados                = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $municipios             = Municipio::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $roles                  = Role::all();

        return view('admin.users.create',compact('personregister','estados','municipios','roles'));
    }


    public function store(Request $request)
    {
        //
        $data = request()->validate([
            'email'         =>'required|max:255|unique:users,email',
            'name'         =>'required|max:160',
            'password'         =>'required|max:255',
            'idperson'         =>'required',
            'Estado'         =>'required|max:160',
            'Municipio'         =>'required|max:160',
            'Roles'         =>'required|max:2',
        ]);

        $users = new User();

        $users->name = request('name');
        $users->email = request('email');
        $users->password = Hash::make(request('password'));
        $users->person_id = request('idperson');
        $users->estado_id = request('Estado');
        $users->municipio_id = request('Municipio');
        $users->role_id = request('Roles');

        $users->save();
        return redirect('/users')->withSuccess('Registro Exitoso!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        $user                   = User::find($id);
        $personregister         = Person::find($user->person_id);
        $estados                = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $municipios             = Municipio::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $roles                  = Role::all();

        return view('admin.users.edit',compact('user','estados','municipios','roles','personregister'));
    }


    public function update(Request $request,$id)
    {

        $users =  User::find($id);

        $request->validate([
            'name'      =>'string|max:255',
            'password'  =>'string|min:8|max:20,confirmed',
            'email'     =>'max:120|unique:users,email,'.$users->id,
            'Estado'    =>'max:160',
            'Municipio' =>'max:160',
            'Roles'     =>'max:2',
        ]);

        $password           = request('password');
        if($password <> '' || $password <> null ||$password <> ' '){
            $password = Hash::make(request('password'));
        }else{
            $password = $users->password;
        }
        $user          = User::findOrFail($id);
        $user->name         = request('name');
        $user->email        = request('email');
        $user->password     = $password;
        $user->estado_id    = request('Estado');
        $user->municipio_id = request('Municipio');
        $user->role_id      = request('Roles');

        $user->save();

        return redirect('/users')->withSuccess('Registro Guardado Exitoso!');

    }


    public function destroy(Request $request)
    {
        //find the Division
        $user = User::find($request->user_id);

        //Elimina el Division
        $user->delete();
        return redirect('/users')->withDelete('Registro Eliminado Exitoso!');
    }
}
