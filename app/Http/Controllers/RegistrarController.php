<?php



use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profession;            //IMPORTANTE NOMBRE DE LA CLASE
use App\Academiclevel;          //IMPORTANTE NOMBRE DE LA CLASE
use App\Estado;                 //IMPORTANTE NOMBRE DE LA CLASE
use App\Municipio;              //IMPORTANTE NOMBRE DE LA CLASE
use App\Parroquia;              //IMPORTANTE NOMBRE DE LA CLASE
use App\User;             //IMPORTANTE NOMBRE DE LA CLASE




class RegistrarController extends Controller
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


    //protected $redirectTo = '/admin';

/*
    public function __construct()
    {
      //  $this->middleware('guest');
    }
/*
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

*/
    public function create(array $data)
    {

        //dd(data[]);
        /*
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        */
      //   dd('aqui');
        $estados= Estado::orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
        return view('auth.register',compact('estados'));
    }
}
