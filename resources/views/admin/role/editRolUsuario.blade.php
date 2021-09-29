@extends('admin.layouts.dashboard')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>         
@endif  
<!-- container-fluid -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Asignar Rol al Usuario {{$person->nombre_pr}} {{$person->apellido_pr}}</h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body">
      <input type="hidden" class="form-control" name="idperson" value="{{ $person->id }}" readonly>
    
        <form action="{{ route('roleusuario.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
        
        <div class="container py-2">
          <div class="row">
            <div class="col-12 ">
              <form>

                <input type="hidden" class="form-control" name="idperson" value="{{ $person->id }}" readonly>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="xcedula">Cédula:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="{{ $person->nacionalidad.$person->cedula }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="xcedula">Primer Nombre:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  value="{{ $person->nombre_pr }}" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="xfoto">Segundo Nombre:</label>
                    </div>
                    <div class="col-sm-4 ">
                        <input type="text" class="form-control" value="{{ $person->nombre_seg }}" readonly >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="xpri_name">Primer Apellido:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{ $person->apellido_pr }}" readonly >
                    </div>
                    <div class="col-sm-2">
                        <label for="xseg_name">Segundo Apellido:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{ $person->apellido_seg }}" readonly >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="xpri_name">Estado:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{ $user_estado }}" readonly >
                    </div>
                    <div class="col-sm-2">
                        <label for="xseg_name">Municipio:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{ $user_municipio }}" readonly >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="xpri_name">Usuario:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{ $user->name }}" readonly >
                    </div>
                    <div class="col-sm-2">
                        <label for="xseg_name">Email:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{ $user->email }}" readonly >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="xpri_name">Rol: </label>
                    </div>
                    <div class="col-sm-10">
                        <select id="role"  name="role" class="form-control">
                         
                        @foreach($roles as $key => $role)
                       {{ $selected = ''}}
                            @if ($role_user->id == $role->id)                           
                                {{$selected = 'selected'}}                       
                            @endif
                            <option value="{{$role->id}}" {{$selected}}  ><strong> {{ $role->id }}- {{ $role->name }} </strong></option>                   
                        @endforeach
                        
                    </select> 

                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-sm-6">
                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Asignar</button>
                    </div> 
                    <div class="form-group col-sm-6">
                        <a href="{{route('danger','users.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                    </div>
                </div>
        
      </form>
    </div>
  </div>

  @endsection

