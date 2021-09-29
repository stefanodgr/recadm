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
          <h2>Editar División </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body"> 
        <form  method="POST"   action="/electoralcommissions/{{ $electoralcommission->id }}" >
            @method('PATCH')
            @csrf()
            <div class="container">
                <fieldset>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label for="nombre">Nombre:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nombre" name="Nombre" value="{{ $electoralcommission->descripcion}}" title="Nombre" >
                        </div>
                        <div class="col-sm-2">
                            <label for="fecha">Fecha Período:</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="fecha" name="Fecha" value="{{ $electoralcommission->fecha}}" title="Nombre" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text-left  col-lg-6 col-md-6 col-xs-6 ">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Modificar</button>
                        </div> 
                        <div class="form-group text-left   col-lg-6 col-md-6 col-xs-6">
                            <a href="{{route('danger','electoralcommissions.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>  
@endsection