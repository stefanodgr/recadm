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
          <h2>Editar Nivel Académico </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
    <div class="card shadow mb-4">
        <div class="card-body">
            <form  method="POST"   action="/academiclevels/{{ $academiclevel->id }}" >
                @method('PATCH')
                @csrf()
                <div class="container">
                    <fieldset>
                        <div class="row">
                            <label for="Nombre">Nombre :</label>
                            <div class="  form-group col-lg-5 col-md-3 col-xs-12 " >
                                <input type="text" name="Nombre" class="form-control" id="Nombre"  value="{{ $academiclevel->descripcion}}" title="Nombre">
                            </div>
                            <div class="form-group text-left  col-lg-2 col-md-2 col-xs-1 ">
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Modificar</button>
                            </div> 
                            <div class="form-group text-left   col-lg-2 col-md-2 col-xs-5">
                                <a href="{{route('danger','academiclevels.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </form>

    
@endsection