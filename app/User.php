<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'person_id','estado_id','municipio_id','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsTo('App\Permission\Models\Role','role_id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado','estado_id');
    }
    public function municipio()
    {
        return $this->belongsTo('App\Municipio','municipio_id');
    }

    public function person()
    {
        return $this->belongsTo('App\Person','person_id');
    }




    public function havePermission($permission){

        foreach ($this->roles as $role ) {


            if ($role['full-access'] =='yes' ) {
                return true;
            }

            foreach ($role->permissions as $perm) {

                if ($perm->slug == $permission ) {
                    return true;
                }
            }
        }

        return false;

    }

    public static function  userEstado(){
        $full= auth()->user()->roles[0]['full-access'];
        if($full == 'no'){
         $estados = null;
        }else{

            $estadoId           = auth()->user()->estado['id'];
            $estados            = Estado::where('id',$estadoId)->orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
            // $municipios         = Municipio::all();
        }
        return $estados;
    }


    public static function  userMunicipio(){
        // dd(auth()->user()->municipio_id);
        $full= auth()->user()->roles[0]['full-access'];
        if($full == 'no'){

        }else{

            $municipioId           = auth()->user()->municipio_id;
            $municipios            = Municipio::where('id',$municipioId)->orderBY('descripcion','asc')->pluck('descripcion','id')->toArray();
            // $municipios         = Municipio::all();
        }
        return $municipios;
    }
}
