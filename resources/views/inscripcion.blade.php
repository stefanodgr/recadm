@extends('layouts.app')

@section('content')



<div class="divPerson " >
</div>
<br>
<!-- container-fluid -->
<div class="container-fluid " style="text-align: center">

  <!-- Page Heading -->
  <div class="row py-lg-2">
    <div class="col-md-12">
        <h3>Buscar Persona</h3>
    </div>
  </div>
</div>

  @include('layouts.success')   {{-- SAVE --}}
  @include('layouts.danger')    {{-- EDITAR --}}
  @include('layouts.delete')    {{-- DELELTE --}}
      {{-- VALIDACIONES-RESPUESTA --}}
  @if (\Session::has('message'))
      <div class="alert alert-warning" role="alert">
        <strong>{{\Session::get('message')}}</strong>
      </div>
  @endif
  <div class="card shadow mb-4">
    <div class="card-body"> 
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <form  method="POST"  action="{{ route('persons.validateCne') }}" >
                              {{ csrf_field() }}
                            <div class="form-group row">
                              <div class="col-md-8 offset-md-2">
                                <div class="card">
                                  <div class="card-body">
                                    <label for="exampleInputPassword1">Nro Documento:</label>
                                    <div class="row">
                                      <div class="col-md-3">
                                        <select name="nacionalidad" id="nacionalidad" class="form-control">
                                          <option value="V" selected>V</option>
                                          <option value="E">E</option>
                                        </select>
                                      </div>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control" id="cedula" name="cedula" maxlength="8">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="form-group  col-sm-12 ">
                                  <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Consultar</button>
                              </div> 
                              {{-- <div class="form-group col-sm-6">
                                  <a href="" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                              </div> --}}
                          
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
  @endsection