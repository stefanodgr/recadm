@extends('admin.layouts.dashboard')

@section('content')
    {{-- @inject('nivelesAcas', 'App\Services\NivelesServices') --}}

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
          <h2>Crear Militante </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body"> 
        <form  method="POST"  action="{{ route('persons.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <form>
                                
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcedula">Cédula:</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="xnaci" name="Nacionalidad" value="{{ old('Nacionalidad')}}" readonly>
                                            <option value="">Seleccione</option>
                                            <option value="V" {{ $test->nacionalidad == 'V' ? 'selected' : '' }} >Venezolano</option>
                                            <option value="E" {{ $test->nacionalidad == 'E' ? 'selected' : '' }} >Extrajero</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="xcedula" name="Cedula" value="{{ $test->cedula}}" placeholder="Ej.00000000" maxlength="8" readonly>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="xfoto">Foto:</label>
                                    </div>
                                    <div class="col-sm-5 ">
                                        <input type="file" class="form-control-file" id="xfoto" name="Foto" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xpri_name">Primer Nombre:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input type="text" class="form-control" id="xpri_name" name="Primer_Nombre" value="{{$test->nombre_pr}}"  placeholder="Ej.Jose" readonly>
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
                                        
                                        <input type="text" class="form-control" id="segundo nombre" name="Segundo_Nombre" value="{{$test->nombre_seg}}" placeholder="Ej.Manuel" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xpri_ape">Primer Apellido:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input type="text" class="form-control" id="xpri_ape" name="Primer_Apellido" value="{{$test->apellido_pr}}" placeholder="Ej.Fernandez"  readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xseg_ape">Segundo Apellido:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input type="text" class="form-control" id="xseg_ape" name="Segundo_Apellido" value="{{$test->apellido_seg}}" placeholder="Ej.Perez" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xfecha_nace">Fecha Nacimiento:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="xfecha_nace" name="Fecha_Nacimiento" value="{{$test->fecha}}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xgenero">Genero:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        @if ($test->apellido_seg <> 'F')
                                            <input type="text" class="form-control" id="xseg_ape" name="Genero" value="{{$test->sexo}}" placeholder="Ej.Perez" readonly>
                                        @else
                                            <input type="text" class="form-control" id="xseg_ape" name="Genero" value="{{$test->sexo}}" placeholder="Ej.Perez" readonly>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xemail">Email:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="xemail" name="Email" value="{{ old('Email')}}" placeholder="Ej.xxx@gmail.com">
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
                                        <input type="text" class="form-control" id="xtelf_cel" name="Telefono_Celular" value="{{ old('Telefono_Celular')}}" placeholder="Ej.04145555555" maxlength="11">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xprofe">Profesión:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="xprofe" name="Profesion">
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
                                        <select class="form-control" id="xnivel" name="Nivel_Academico">
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
                                        
                                        <input type="text" class="form-control" id="xdire" name="Direccion" value="{{ old('Direccion')}}" placeholder="Ej.Frente de una estación">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xaveni">Avenida:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xaveni" name="Avenida" value="{{ old('Avenida')}}" placeholder="Ej.Av San Martin">
                                    </div>
                                </div>
                        
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcalle">Calle:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xcalle" name="Calle" value="{{ old('Calle')}}" placeholder="Ej.Calle San Juan">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="estado">Estado:</label>
                                    </div>
                            
                                    <div class="col-sm-4">
                                        <select id="estado"  name="Estado" class="form-control">
                                        <option value="">Seleccione un Estado</option>
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
                                        <select  id="municipio"  name="Municipio" class="form-control">
                                            <option value="">Selecciona un Municipio</option>
                                        </select>

                                        @if ($errors->has('municpio_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('municpio_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="parroquia">Parroquia:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="parroquia"  name="Parroquia" class="form-control" value="{{ old('Parroquia')}}" >
                                            <option value="">Selecciona un Parroquia</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <legend>Redes Sociales</legend>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xtwitter">Twitter:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xtwitter"  name="Twitter"  value="{{ old('Twitter')}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xinstagram">Instagram:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xinstagram" name="Instagram"  value="{{ old('Instagram')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xfacebook">Facebook:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xfacebook" name="Facebook"  value="{{ old('Facebook')}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xpaginaweb">Pagina Web:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xpaginaweb" name="Pagina_Web" value="{{ old('Pagina_Web')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group  col-sm-6 ">
                                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Nuevo</button>
                                    </div> 
                                    <div class="form-group col-sm-6">
                                        <a href="{{route('danger','persons')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                    </div>
                                 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>       
        </form>
@endsection
@section('javascript')
    <script>
            
            $("#estado").on('change',function(){
                var estado_id = $(this).val();
                $("#municipio").val("");
                $("#parroquia").val("");
                // alert(estado_id);
                getMunicipios(estado_id);
            });

        function getMunicipios(estado_id){
            // alert(`../municipio/list/${estado_id}`);
            $.ajax({
                url:`../../municipio/list/${estado_id}`,
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
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
                    // console.log(htmlOptions);
                    municipio.html('');
                    municipio.html(htmlOptions);
                
                    
                
                },
                error:(xhr)=>{
                    alert('Presentamos inconvenientes al consultar los datos');
                }
            })
        }

        $("#municipio").on('change',function(){
                var municipio_id = $(this).val();
                var estado_id    = document.getElementById("estado").value;
                getParroquias(municipio_id,estado_id);
            });

        function getParroquias(municipio_id,estado_id){
            // alert(`../parroquia/list/${municipio_id}/${estado_id}`);
            $.ajax({
                url:`../../parroquia/list/${municipio_id}/${estado_id}`,
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