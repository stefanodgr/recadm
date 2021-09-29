@extends('admin.layouts.dashboard')

@section('content')

<!-- container-fluid -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Consulta de Datos Vista Previa </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  <div class="card shadow mb-4">
    <div class="card-body"> 
                <input type="hidden" name="idperson" value="{{$localcommittee->id}}" readonly>
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <hr>
                            <legend> <strong>Datos del Cómite Local</strong></legend>
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xseg_name">Nombre:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $localcommittee->descripcion }}" disabled >
                                </div>
                                <div class="col-sm-2">
                                    <label for="division">Estado:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $localcommittee->estado['descripcion'] }}" disabled >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="municipio">Municipio:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $localcommittee->municipio['descripcion'] }}" disabled >
                                </div>
                                <div class="col-sm-2">
                                    <label for="parroquia">Parroquia:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $localcommittee->parroquia['descripcion'] }}" disabled >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="Observaciones">Observaciones:</label>
                                </div>
                                <div class="col-sm-4" >
                                    <textarea name="Observaciones" id="" cols="35" rows="3" value="{{$localcommittee->observaciones}}" disabled >{{$localcommittee->observaciones}}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="form-group col-sm-12">
                                    <a href="{{route('danger','localcommittees.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Atras</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
@endsection
