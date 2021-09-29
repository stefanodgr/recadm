<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Person;
use App\Estado;
use App\Municipio;
use App\Permission\Models\Role;



use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/';
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function index(){


    }
    public function indexpersons()
    {



        try{
            $persons = Person::getPeoplesNotUser();

            return view('auth.indexpersons',['persons'=> $persons]);

        }catch(\Illuminate\Database\QueryException $qry_ex){//capturar excepciones de consultas en BD

            return view('errors.404');

        }catch(Throwable $th){//Capturar errores en General.

            return view('errors.404');
        }

        // dd($persons);
    }
    public function aftercreate(Person $personregister){

        $personregister         = Person::find($personregister->id);
        $estados                = Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $municipios             = Municipio::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        $roles                  = Role::all();

        return view('auth.registro',compact('personregister','estados', 'municipios','roles'));


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'person_id'     => $data['idperson'],
            'estado_id'     => $data['Estado'],
            'municipio_id'  => $data['Municipio'],
            'role_id'       => $data['Roles'],
        ]);
    }
}
