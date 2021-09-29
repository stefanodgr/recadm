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
                <input type="hidden" name="idperson" value="{{$person->id}}" readonly>
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <hr>
                            <legend> <strong>Datos del Militante</strong></legend>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                  <div class="">
                                    <div class="">
                                        @if ($person->foto_img == null || $person->foto_img == ''  )
                                        <img src="{{ asset('/storage/images/persons_foto/sin_foto.png') }}" class="Rounded Corners: mx-auto"  width="200">
                                        @else
                                        <img src="{{ asset('/storage/images/persons_foto/'.$person->foto_img) }}" class="Rounded Corners: mx-auto" alt="{{ $person->foto_img }}" width="200">
                                        @endif
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="">
                                    <div class="">
                                        <div class="col-sm-4">
                                            <label for="xcedula">Cédula:</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  value="{{$person->nacionalidad."-".$person->cedula}}" disabled>
                                        </div>
                                        <div class="col-sm-8">
                                            <label for="xcedula">Primer Nombre:</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  value="{{ $person->nombre_pr }}" disabled>
                                        </div>
                                        <div class="col-sm-7">
                                            <label for="xpri_name">Primer Apellido:</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" value="{{ $person->apellido_pr }}" disabled >
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="">
                                      <div class="">
                                        <div class="col-sm-7">
                                            <label for="xfoto">Fecha Nacimiento:</label>
                                        </div>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" value="{{ $person->fecha_nac }}" disabled >
                                        </div>
                                
                                        <div class="col-sm-7">
                                            <label for="xfoto">Segundo Nombre:</label>
                                        </div>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" value="{{ $person->nombre_seg }}" disabled >
                                        </div>
                                        <div class="col-sm-7">
                                            <label for="xfoto">Segundo Apellido:</label>
                                        </div>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" value="{{ $person->apellido_seg }}" disabled >
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <br>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xpri_name">Genero:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="xgenero" name="Genero"  disabled>
                                        <option value="FEMENINO" {{ $person->genero        == 'FEMENINO' ? 'selected' : '' }} >Femenino</option>
                                        <option value="MASUCULINO" {{ $person->genero      == 'MASUCULINO' ? 'selected' : '' }} >Masculino</option>
                                        <option value="OTROS" {{ $person->Genero           == 'OTROS' ? 'selected' : '' }} >Otros</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="xseg_name">Email:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->email }}" disabled >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xpri_name">Telefono Local:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->telf_local }}" disabled >
                                </div>
                                <div class="col-sm-2">
                                    <label for="xseg_name">Telefono Celular:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->telf_celular }}" disabled >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xseg_name">Nivel Académico:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->academiclevel['descripcion'] }}" disabled >
                                </div>
                                <div class="col-sm-2">
                                    <label for="xpri_name">Profesión:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->profesion['descripcion'] }}" disabled >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xpri_name">Dirección:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->direccion }}" disabled >
                                </div>
                                <div class="col-sm-2">
                                    <label for="xseg_name">Avenida:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->avenida }}" disabled >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xpri_name">Calle:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->calle }}" disabled >
                                </div>
                                <div class="col-sm-2">
                                    <label for="estado">Estado:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->estado['descripcion'] }}" disabled >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="municipio">Municipio:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->municipio['descripcion'] }}" disabled >
                                </div>
                                <div class="col-sm-2">
                                    <label for="parroquia">Parroquia:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->parroquia['descripcion'] }}" disabled >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-sm-12">
                                    <a href="{{route('danger','persons.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Atras</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
@endsection
