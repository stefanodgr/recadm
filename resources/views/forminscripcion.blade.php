@extends('layouts.app')

@section('content')



<div class="divPerson " >
</div>

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
@include('layouts.success')   {{-- SAVE --}}
@include('layouts.danger')    {{-- EDITAR --}}
@include('layouts.delete')    {{-- DELELTE --}}
    {{-- VALIDACIONES-RESPUESTA --}}

  @if (\Session::has('message'))
    <div class="alert alert-warning" role="alert">
      <strong>{{\Session::get('message')}}</strong>
    </div>
@endif
  <!-- /container-fluid -->

<div class="card shadow mb-4">
    <div class="card-body">
        <form  method="POST"  action="{{ route('persons.registerCne') }}" >
            {{ csrf_field() }}
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                                <div class="col-md-12">
                                    <h3>Formulario de Inscripción</h3>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcedula">Cédula:</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="xnaci" name="Nacionalidad" value="{{ old('Nacionalidad')}}" readonly>
                                            <option value="">Seleccione</option>
                                            <option value="V" {{ $person->nacionalidad == 'V' ? 'selected' : '' }} ><strong>Venezolano</strong> </option>
                                            <option value="E" {{ $person->nacionalidad == 'E' ? 'selected' : '' }} >Extrajero</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="xcedula" name="Cedula" value="{{ $person->cedula}}" placeholder="Ej.00000000" maxlength="8" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xpri_name">Primer Nombre:</label>
                                    </div>
                                    <div class="col-sm-4">

                                        <input type="text" class="form-control" id="xpri_name" name="Primer_Nombre" value="{{$person->nombre_pr}}"  placeholder="Ej.Jose" readonly>
                                        @if ($errors->has('xpri_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('xpri_name') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xseg_name">Segundo Nombre:</label>
                                    </div>
                                    <div class="col-sm-4">

                                        <input type="text" class="form-control" id="segundo nombre" name="Segundo_Nombre" value="{{$person->nombre_seg}}" placeholder="Ej.Manuel" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xpri_ape">Primer Apellido:</label>
                                    </div>
                                    <div class="col-sm-4">

                                        <input type="text" class="form-control" id="xpri_ape" name="Primer_Apellido" value="{{$person->apellido_pr}}" placeholder="Ej.Fernandez"  readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xseg_ape">Segundo Apellido:</label>
                                    </div>
                                    <div class="col-sm-4">

                                        <input type="text" class="form-control" id="xseg_ape" name="Segundo_Apellido" value="{{$person->apellido_seg}}" placeholder="Ej.Perez" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xfecha_nace">Fecha Nacimiento:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xfecha_nace" name="Fecha_Nacimiento" value="{{$person->fecha}}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xgenero">Genero:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        @if ($person->apellido_seg <> 'F')
                                            <input type="text" class="form-control"  value="MASCULINO" placeholder="Ej.Perez" readonly>
                                            <input type="hidden" class="form-control" id="xseg_ape" name="Genero" value="{{$person->sexo}}" placeholder="Ej.Perez" readonly>
                                        @else
                                            <input type="text" class="form-control"  value="FEMENINO" placeholder="Ej.Perez" readonly>
                                            <input type="hidden" class="form-control" id="xseg_ape" name="Genero" value="{{$person->sexo}}" placeholder="Ej.Perez" readonly>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xemail">Email:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="xemail" name="Email" value="{{ old('Email')}}" placeholder="Ej.xxx@gmail.com" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 ">
                                        <label for="xtelf_local">Télefono Local:</label>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <input type="text" class="form-control" id="xtelf_local" name="Telefono_Local" value="{{ old('Telefono_Local')}}" placeholder="Ej.02125555555"  maxlength="11">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xtelf_cel">Télefono Célular:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xtelf_cel" name="Telefono_Celular" value="{{ old('Telefono_Celular')}}" placeholder="Ej.04145555555" maxlength="11" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xprofe">Profesión:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="xprofe" name="Profesion" required>
                                            <option value="0">Seleccione</option>
                                            @foreach($profesiones as $index => $value)
                                                <option value="{{ $index }}" {{ old('Profesion') == $index ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xnivel">Nivel Académico:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="xnivel" name="Nivel_Academico" required>
                                            <option value="0">Seleccione</option>
                                            @foreach($nivelAcademicos as $index => $value)
                                            <option value="{{ $index }} " {{ old('Nivel_Academico') == $index ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('xnivel'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('xnivel') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <legend>Dirección</legend>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xdire">Dirección pto-ref:</label>
                                    </div>
                                    <div class="col-sm-4">

                                        <input type="text" class="form-control" id="xdire" name="Direccion" value="{{ old('Direccion')}}" placeholder="Ej.Frente de una estación" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xaveni">Avenida:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xaveni" name="Avenida" value="{{ old('Avenida')}}" placeholder="Ej.Av San Martin" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcalle">Calle:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xcalle" name="Calle" value="{{ old('Calle')}}" placeholder="Ej.Calle San Juan" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="estado">Estado:</label>
                                    </div>

                                    <div class="col-sm-4">
                                    <select id="estado"  name="Estado" class="form-control" data-ajax="{{$rutaMunicipio}}" required>
                                        @foreach($estados as $index => $value)
                                            <option value="{{ $index }}" {{ old('Estado') == $index ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                        </select>

                                        @if ($errors->has('estado_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('estado_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="municipio">Municipio:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select  id="municipio"  name="Municipio" class="form-control" data-ajax="{{$rutaParroquia}}" required>
                                            <option value="">Selecciona un Municipio</option>
                                        </select>

                                        @if ($errors->has('municipio'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('municipio') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-sm-2">
                                        <label for="parroquia">Parroquia:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="parroquia"  name="Parroquia" class="form-control" value="{{ old('Parroquia')}}" required>
                                            <option value="">Selecciona un Parroquia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group  col-sm-6 ">
                                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Registrarse</button>
                                    </div>
                                    {{-- <div class="form-group col-sm-6">
                                        <a href="{{route('danger','persons')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                    </div> --}}

                                </div>
                        </div>
                    </div>
                </div>
        </form>
@endsection
@section('javascript_inscripcion')
    <script>

        // $(document).ready(()=>{
            $("#estado").on('change',function(){
                var estado_id=$("#estado").val();
                var rutaMunicipio = $(this).attr('data-ajax');

                var Ruta = rutaMunicipio+"/"+estado_id;
                $("#municipio").val("");
                $("#parroquia").val("");
                getMunicipios(Ruta);
            });


        function getMunicipios(Ruta){
            $.ajax({
                url:`${Ruta}`,
                beforSend:()=>{
                    // $.blockUI();
                },
                success:(response)=>{
                    // $.unblockUI();
                    let municipio = $("#municipio");
                    let htmlOptions = `<option value='' >Seleccione..</option>`;
                    // console.clear();
                    if(response.length > 0){
                        response.forEach((item, index, object)=>{
                            let {id,descripcion} = item;
                            htmlOptions += `<option value='${id}' {{ old('Municipio') == '${id}' ? 'selected' : '' }}>${descripcion}</option>`

                        });
                    }
                    //console.clear();
                    console.log(htmlOptions);
                    municipio.html('');
                    municipio.html(htmlOptions);
                },
                error:(xhr)=>{
                    // $.unblockUI();
                    alert('Presentamos inconvenientes al consultar los datos');
                }
            })
        }

        $("#municipio").on('change',function(){
            var estado_id       =$("#estado").val();
            var municipio_id    =$("#municipio").val();
            var rutaParroquia   = $(this).attr('data-ajax');

                var RutaPa = rutaParroquia+"/"+municipio_id+"/"+estado_id;
            getParroquias(RutaPa);
        });

        function getParroquias(RutaPa){
            // alert(`../parroquia/list/${municipio_id}/${estado_id}`);
            $.ajax({
                url:`${RutaPa}`,
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                    let parroquia = $("#parroquia");
                    let htmlOptions = `<option value='' >Seleccione..</option>`;
                    // console.clear();
                    if(response.length > 0){
                        response.forEach((item, index, object)=>{
                            let {id,descripcion} = item;
                            htmlOptions += `<option value='${id}' {{ old('Parroquia') == '${descripcion}' ? 'selected' : '' }} >${descripcion}</option>`

                        });
                    }
                    // console.clear();
                    // console.log(htmlOptions);
                    parroquia.html('');
                    parroquia.html(htmlOptions);
                },
                error:(xhr)=>{
                    alert('Presentamos inconvenientes al consultar los datos');
                }
            })
        }
	$(function(){
        soloNumeros('xtelf_local');
        soloNumeros('xtelf_cel');
    });





    </script>
@endsection
