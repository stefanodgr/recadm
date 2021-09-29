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
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <legend> <strong>Datos del CNE</strong></legend>
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xcedula">Cédula:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"  value="{{$test->nacionalidad."-".$test->cedula}}" disabled>
                                </div>
                                <div class="col-sm-2">
                                    <label for="xfecha">Fecha Nacimiento:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"  value="{{ $test->fecha }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xpri_name">Primer Nombre:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"  value="{{ $test->nombre_pr }}" disabled>
                                </div>
                                <div class="col-sm-2">
                                    <label for="xseg_name">Segundo Nombre:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $test->nombre_seg }}" disabled >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xpri_ape">Primer Apellido:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $test->apellido_pr }}" disabled >
                                </div>
                                <div class="col-sm-2">
                                    <label for="seg_ap">Segundo Apellido:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $test->apellido_seg }}" disabled >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xpri_name">Sexo:</label>
                                </div>
                                <div class="col-sm-4">
                                    @if ( $test->sexo  <> 'F')
                                    <input type="text" class="form-control" value="MASCULINO" disabled >
                                    @else
                                    <input type="text" class="form-control" value="FEMENINO" disabled >
                                    @endif
                                    
                                </div>
                                <div class="col-sm-2">
                                    <label for="xpri_name">Estado:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="xnivel" name="Nivel_Academico" readonly>
                                        @foreach($estados as $estado)    
                                            @if ( $test->estado_id == $estado->id   )
                                                <option selected value="{{$test->estado_id}}"><strong>{{ $estado->descripcion }}</strong></option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xmunicipios">Municipio:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" readonly>
                                        @foreach($municipios as $municipio)    
                                            @if ( $test->municipio_id == $municipio->id   )
                                                <option selected value="{{$test->municipio_id}}"><strong>{{ $municipio->descripcion }}</strong></option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="xparroquia">Parroquia:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control"  readonly>
                                        @foreach($parroquias as $parroquia)    
                                            @if ( $test->parroquia_id == $parroquia->id   )
                                                <option selected value="{{$test->parroquia_id}}"><strong>{{ $parroquia->descripcion }}</strong></option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="xcentervotes">Centro Votacion:</label>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control"  readonly>
                                    @foreach($centervotes as $centervote)    
                                        @if ( $test->center_votes_id == $centervote->id   )
                                            <option selected value="{{$test->center_votes_id}}"><strong>{{ $centervote->descripcion }}</strong></option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                          <div class="form-group row">
                              <div class="form-group col-sm-6">
                                  <a href="{{route('persons.create',$test->id) }} " type="button" class="btn btn-success btn-block">Registrar</a>
                              </div>
                              <div class="form-group col-sm-6">
                                <a href="{{route('danger','persons')}}" name="danger" type="button" class="btn btn-danger btn-block">Atras</a>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>            
@endsection
