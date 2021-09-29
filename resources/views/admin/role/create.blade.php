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

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row py-lg-2">
    <div class="col-md-6">
        <h2>Crear Roles</h2>
    </div>
  </div>
</div>
<div class="card shadow mb-4">

    <div class="card-body">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
      <div class="container py-2">
        <div class="row">
          <div class="col-12 ">
            <form action="{{ route('role.store')}}" method="POST">
              @csrf
              <form>
                <div class="form-group row">
                    <div class="col-sm-2">
                      <label for="name">Nombre:</label>
                    </div>
                    <div class="col-sm-4">                      
                      <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                    </div>

                    <div class="col-sm-2">
                      <label for="slug">Slug:</label>
                    </div>
                  
                    <div class="col-sm-4">                            
                      <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug">
                    </div>
                  </div>    
                <div class="form-group row">
                    <div class="col-sm-2">
                      <label for="description">Descripción</label> 
                    </div>  

                    <div class="col-sm-10">     
                      <textarea class="form-control" placeholder="Description" name="description" id="description" rows="3"></textarea>
                    </div>

                    <div class="col-sm-2" style="display: none;">
                      <label for="description">Full Acess:</label> 
                    </div> 

                  <div class="col-sm-4" style="display: none;">
                    <div class="col">
                      <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes">
                      <label class="custom-control-label" for="fullaccessyes">Yes</label>
                    </div>  
                    <div class="col">
                      <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" checked>
                      <label class="custom-control-label" for="fullaccessno">No</label>
                    </div>
                  </div> 
                </div>  
                <hr>
                <legend>Lista de Permisos</legend>
                <hr>
              
                <div class="col">
                 
                  @foreach($permissions as $permission)                  
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" 
                      class="custom-control-input" 
                      id="permission_{{$permission->id}}"
                      value="{{$permission->id}}"
                      name="permission[]" >
                      <label class="custom-control-label" 
                          for="permission_{{$permission->id}}">
                          {{ $permission->id }}
                          - 
                          {{ $permission->name }} 
                          <em>( {{ $permission->description }} )</em>
                      
                      </label>
                    </div>
                  @endforeach
                
                  <hr>

                  <div class="form-group row">
                    <div class="form-group col-sm-6">
                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Guardar</button>
                    </div> 
                    <div class="form-group col-sm-6">
                        <a href="{{route('danger','role.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                    </div>
                </div>
              </div>
            </form>
    </div>
</div>
@endsection
