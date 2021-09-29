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
          <h2>Editar Cargo </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body"> 
        <form  method="POST"   action="/positions/{{ $position->id }}" >
            @method('PATCH')
            @csrf()
            <div class="container">
                <fieldset>
                    <div class="row">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="Division">Divisíon:</label>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" id="Division" name="Division">
                                <option class="hidden" disabled >Seleccione Divisíon</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division['id'] }}" >
                                        {{ $division['descripcion'] }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="Nombre">Nombre:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="Nombre" class="form-control" id="Nombre"  value="{{ $position->descripcion}}" title="Nombre">
                            </div>
                            <div class="form-group col-sm-4">
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Modificar</button>
                            </div> 
                            <div class="form-group col-sm-4">
                                <a href="{{route('danger','positions.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>  
@endsection