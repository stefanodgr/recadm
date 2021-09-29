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
        <h2>Consulta de Datos Vista Previa</h2>
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
            <form action="{{ route('role.update', $role->id)}}" method="POST">
              @csrf
              @method('put')
              <form>
                <div class="form-group row">
                    <div class="col-sm-2">
                      <label for="name">Nombre:</label>
                    </div>
                    <div class="col-sm-4">                      
                      <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                       value="{{old('name', $role->name)}}" readonly>
                    </div>

                    <div class="col-sm-2">
                      <label for="slug">Slug:</label>
                    </div>
                  
                    <div class="col-sm-4">                            
                      <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug"
                      value="{{old('slug', $role->slug)}}" readonly>
                    </div>
                  </div>    
                <div class="form-group row">
                    <div class="col-sm-2">
                      <label for="description">Descripción</label> 
                    </div>  

                    <div class="col-sm-4">     
                      <textarea class="form-control" placeholder="Description" name="description" id="description" rows="3"
                      {{old('description', $role->description )}} readonly
                      ></textarea>
                    </div>

                    <div class="col-sm-2">
                      <label for="description">Full Acess:</label> 
                    </div> 

                  <div class="col-sm-4">
                    
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                        value="{{$role['full-access']}}" readonly>
                   
                </div>  
                <hr>
                <legend></legend>
                <legend>Permisos Asignados:</legend>
                <hr>  <br>
              
                <div class="col">
                    <div class="col-sm-6">
                    <ul class="list-group">
                        @foreach($permission_role as $permission)                  
                                           
                        <li class="list-group-item "> {{$permission}}</li>
                        @endforeach
                      </ul>
                    </div>
                  <hr>
                
                  <div class="form-group row">
                    <div class="form-group col-sm-12">
                        <a href="{{route('danger','role.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                    </div>
                </div>
              </div>
            </form>
    </div>
</div>
@endsection
