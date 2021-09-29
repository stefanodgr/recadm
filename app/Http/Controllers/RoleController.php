<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;
use App\User;
use App\Person;
use App\Estado;                 //IMPORTANTE NOMBRE DE LA CLASE
use App\Municipio;              //IMPORTANTE NOMBRE DE LA CLASE
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /* AUTENTICADOR DE SESSION */
    public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {
       // Gate::authorize('haveaccess','role.index');

        $roles =  Role::all();

        return view('admin.role.index',compact('roles'));
    }


    public function create()
    {
        //Gate::authorize('haveaccess','role.create');
        
        $permissions = Permission::get();

        return view('admin.role.create', compact('permissions'));


    }


    public function store(Request $request)
    {
        //return $request->all(); imprime en pantalla lo que trae el request
        //return $request->all();
        $request->validate([
            'name'          => 'required|max:50|unique:roles,name',
            'slug'          => 'required|max:50|unique:roles,slug',
            'full-access'   => 'required|in:yes,no'
        ]);

        $role = Role::create($request->all());
        
        if ($request->get('permission')) {
            //return $request->all();
            $role->permissions()->sync($request->get('permission'));
        }
        return redirect()->route('role.index')->withSuccess('Registro Exitoso!');
    }


    public function show(Role $role)
    {
        $permission_role=[];

        foreach($role->permissions as $permission) {
            $permission_role[]=$permission->id.'-'.$permission->name; 
        }
        //return   $permission_role;


        //return $role;
        $permissions = Permission::get();




        return view('admin.role.show', compact('permissions','role','permission_role'));
    }

    public function edit(Role $role)
    {
        $permission_role=[];

        foreach($role->permissions as $permission) {
            $permission_role[]=$permission->id; 
        }
        //return   $permission_role;


        //return $role;
        $permissions = Permission::get();




        return view('admin.role.edit', compact('permissions','role','permission_role'));
    }

 
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'          => 'required|max:50|unique:roles,name,'.$role->id,
            'slug'          => 'required|max:50|unique:roles,slug,'.$role->id,
            'full-access'   => 'required|in:yes,no'
        ]);

        $role->update($request->all());
        
        if ($request->get('permission')) {
            //return $request->all();
            $role->permissions()->sync($request->get('permission'));
        }
        return redirect()->route('role.index')->withSuccess('Registro Editado Exitoso!');
    }


    public function destroy(Request $request)
    {
                //find the post
                $role = role::find($request->role_id);

                //delete the role
                $role->delete();
                return redirect('/role')->withDelete('Registro Eliminado Exitoso!');
    }


    public function editRolUsuario($user_id)
    {
    
       //return ('llego');
       //dd($user_id);
        $user = User::find($user_id);

        $role_user= $user->roles[0];
        $permissions = Permission::get();
        $roles= Role::get();
        $person = Person::find($user->person_id);


            $estado = Estado::find($user->estado_id);

            $user_estado =  $estado->descripcion;

            $municipio = Municipio::find($user->municipio_id);

            if ($user->municipio_id == null){
                $user_municipio =  "Todos los Municipios";
            }else{

                $user_municipio =  $municipio->descripcion;
            }            



        
        //return $role_user[0];
        return view('admin.role.editRolUsuario', compact('permissions','roles','user', 'person','role_user','user_municipio','user_estado'));
    }



    public function updateRolUsuario(Request $request,$user_id)
    {
    
        //dd($request);

        // return ($request);
        $user = User::find($user_id);

        //Asignar el Rol al usuario
         $user->roles()->sync([request('role')]);

        //return $role;
        $permissions = Permission::get();


        return redirect('/users')->withSuccess('Registro Editado Exitoso!');
    }




}
