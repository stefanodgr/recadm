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
          <h2>Crear Cargo </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body">
        <form  method="POST"   action="/positions">
            {{ csrf_field() }}
            <div class="container">
                <fieldset>
                    <div class="row">
                        <div class="form-group row">
                            <div class="col-sm-1">
                                <label for="Division">Divisíon:</label>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" id="Division" name="Division">
                                    <option value="0">Seleccione</option>
                                    @foreach($divisions as $index => $value)
                                        <option value="{{ $index }}" {{ old('Divisions') == $index ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <label for="Nombre">Nombre:</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre..." value="{{ old('Nombre')}}">
                            </div>
                            <div class="form-group  col-sm-2 ">
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Nuevo</button>
                            </div> 
                            <div class="form-group col-sm-2">
                                <a href="{{route('danger','positions.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                            </div>
                        <div>
                        
                    </div>
                </fieldset>
            
            </div>
                
            
            
        </form>
@endsection