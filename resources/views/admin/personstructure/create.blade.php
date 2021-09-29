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
@if (\Session::has('message'))
    <div class="alert alert-warning" role="alert">
      <strong>{{\Session::get('message')}}</strong>
    </div>
@endif
<!-- container-fluid -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Crear Militante-Estructura </h2>
      </div>

    </div>
  </div>
  <!-- /container-fluid -->

<div class="card shadow mb-4">
    <div class="card-body">
        <form  method="POST"  action="/personstructure" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <form>
                                <input type="hidden" class="form-control" name="idperson" value="{{ $personstru->id }}" readonly>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcedula">Cédula:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{ $personstru->nacionalidad.$personstru->cedula }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcedula">Primer Nombre:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"  value="{{ $personstru->nombre_pr }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xfoto">Segundo Nombre:</label>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <input type="text" class="form-control" value="{{ $personstru->nombre_seg }}" readonly >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xpri_name">Primer Apellido:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $personstru->apellido_pr }}" readonly >
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xseg_name">Segundo Apellido:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $personstru->apellido_seg }}" readonly >
                                    </div>
                                </div>
                                <hr>
                                <legend>Datos Obligatorios</legend>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="division">Divisiónes:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="division" name="Division">
                                            <option value="0">Seleccione</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}" {{ old('Division') == $division->id ? 'selected' : '' }}>
                                                    {{ $division->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="cargo">Cargos:</label>
                                    </div>
                                    <div id="select_cargo" class="col-sm-4">
                                        <select  id="cargo"  name="Cargo" class="form-control">
                                            <option value="">Selecciona un Cargo</option>
                                        </select>
                                    </div>
                                    <div id="input_cargo" class="col-sm-4" style="display: none;">
                                        <input type="text" class="form-control" value="No valido la división" disabled >
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="rol" id="rol" value="{{Auth::user()->role_id}}"  >
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="estado">Estado:</label>
                                    </div>
                                    <div id="select_estado" class="col-sm-4">
                                        @if (Auth::user()->role_id  == '1')
                                            <select id="estado"  name="Estado" class="form-control" >
                                                @foreach($estados as $index => $value)
                                                    <option value="{{ $index }}" {{ old('Estado') == $index ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div id="input_estado" class="col-sm-4" style="display: none;">
                                        <input type="text" class="form-control" value="Para todos los Estados" disabled >
                                    </div>
                                      @endif
                                    @if (Auth::user()->role_id  == '2')
                                        <select id="estado"  name="Estado" class="form-control" >
                                            @foreach($estados as $index => $value)
                                                <option value="{{ $index }}" {{ old('Estado') == $index ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                </div>
                                <div id="input_estado" class="col-sm-4" style="display: none;">
                                    <input type="text" class="form-control" value="Para todos los Estados" disabled >
                                </div>
                                @endif

                                    <div class="col-sm-2">
                                        <label for="municipio">Municipio:</label>
                                    </div>
                                    <div id="select_municipio" class="col-sm-4">
                                        @if (Auth::user()->role_id  == '1')
                                            <select id="municipio"  name="Municipio" class="form-control" >
                                            @foreach($municipios as $index => $value)
                                                <option value="{{ $index }}" {{ old('Municipio') == $index ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                            </select>

                                            @if ($errors->has('municipio_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('municipio_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        @endif
                                @if (Auth::user()->role_id  == '2')
                                    <select id="municipio"  name="Municipio" class="form-control" >
                                        @foreach($municipios as $index => $value)
                                            <option value="{{ $index }}" {{ old('Municipio') == $index ? 'selected' : '' }} >
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('municipio_id'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('municipio_id') }}</strong>
                                                </span>
                            @endif
                        </div>
                        @endif

                                    <div id="input_municipio" class="col-sm-4" style="display: none;">
                                        <input type="text" class="form-control" value="Para todos los Municipios" readonly >
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-2">
                                        <label for="parroquia">Parroquia:</label>
                                    </div>
                                    <div id="select_parroquia" class="col-sm-4">
                                    <select class="form-control" id="parroquia"  name="Parroquia" class="form-control"  >
                                        <option value="">Selecciona un Parroquia</option>
                                    </select>


                                    </div>
                                    <div id="input_parroquia" class="col-sm-4" style="display: none;">
                                        <input type="text" class="form-control" value="Para todos los Parroquias" disabled >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="Observaciones">Observaciones:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <textarea name="Observaciones" id="" cols="100" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group  col-sm-6 ">
                                        <button type="submit"  class="btn btn-success btn-block" ><i class="fa fa-send-o"></i>Nuevo</button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <a href="{{route('danger','personstructure.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </form>
@endsection
@section('slct_combo_personstructure')
    <script>

            $("#division").on('change',function(){
                var division_id = $(this).val();
                $("#select_estado").val(" ");
                $("#select_municipio").val(" ");
                $("#select_parroquia").val(" ");
                var role   = document.getElementById("rol").value;


        if(division_id < 10){

            $('#select_estado').show(); //muestro mediante id
            $('#input_estado').hide(); //muestro mediante id
            $('#select_municipio').hide(); //muestro mediante id
            $('#input_municipio').show(); //muestro mediante id
            $('#select_parroquia').hide(); //muestro mediante id
            $('#input_parroquia').show(); //muestro mediante id
            $('#estado').removeAttr("disabled");
            $("municipio").attr('disabled','disabled');
            $("parroquia").attr('disabled','disabled');
            // alert("es menor a 10");
        }
        if(division_id == 10){
            // alert("es  igual 10");
            if(role == '1'){
                $('#select_municipio').show(); //muestro mediante id
            }else{
                $('#select_municipio').show(); //muestro mediante id
                $('#municipio').removeAttr("disabled");
            }
            $('#select_estado').show(); //muestro mediante id
            $('#input_estado').hide(); //muestro mediante id
            $('#select_municipio').show(); //muestro mediante id
            $('#input_municipio').hide(); //muestro mediante id
            $('#select_parroquia').hide(); //muestro mediante id
            $('#input_parroquia').show(); //muestro mediante id
            $('#estado').removeAttr("disabled");
        }
        if(division_id > 10){
            // alert("es mayor a 10");
            $('#select_estado').hide(); //muestro mediante id
            $('#input_estado').show(); //muestro mediante id
            $('#select_municipio').hide(); //muestro mediante id
            $('#input_municipio').show(); //muestro mediante id
            $('#select_parroquia').hide(); //muestro mediante id
            $('#input_parroquia').show(); //muestro mediante id
            $("estado").attr('disabled','disabled');
            $("municipio").attr('disabled','disabled');
            $("parroquia").attr('disabled','disabled');
            if(division_id == 19){         // COMITE EJECUTIVO NACIONAL
                // alert("es 19");
                $('#select_estado').show(); //muestro mediante id
                $('#input_estado').hide(); //muestro mediante id
                $('#select_municipio').show(); //muestro mediante id
                $('#input_municipio').hide(); //muestro mediante id
                $('#select_parroquia').show(); //muestro mediante id
                $('#input_parroquia').hide(); //muestro mediante id
                $('#estado').removeAttr("disabled");
                $('#municipio').removeAttr("disabled");
                $('#parroquia').removeAttr("disabled");

                $('#estado').removeAttr("disabled");
                $('#municipio').removeAttr("disabled");
                $('#parroquia').removeAttr("disabled");

            }
        }
        getPositions(division_id);
    });


            function getPositions(division_id){
            // alert(`../../position/list/${division_id}`);
            $.ajax({
                url:`../../position/list/${division_id}`,
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                    let cargo = $("#cargo");
                    let htmlOptions = `<option value='' >Seleccione..</option>`;
                    // console.clear();
                    if(response.length > 0){
                        response.forEach((item, index, object)=>{
                            let {id,descripcion} = item;
                            htmlOptions += `<option value='${id}' {{ old('Cargo') == '${id}' ? 'selected' : '' }}>${descripcion}</option>`

                        });
                    }
                    //console.clear();
                    // console.log(htmlOptions);
                    cargo.html('');
                    cargo.html(htmlOptions);
                },
                error:(xhr)=>{
                    alert('Presentamos inconvenientes al consultar los datos');
                }
            })
        }
            $("#estado").on('change',function(){
                var estado_id = $(this).val();
                $("#municipio").val("Seleccione un Municipio");
                $("#parroquia").val("Seleccione una Parroquia");
                // alert(estado_id);
                getMunicipios(estado_id);
            });

        function getMunicipios(estado_id){
            // alert(`../../municipio/list/${estado_id}`);
            $.ajax({
                url:`../../municipio/list/${estado_id}`,
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                    let municipio = $("#municipio");
                    let htmlOptions = `<option value='' >Seleccione</option>`;
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

        var municipio_id    = document.getElementById("municipio").value;   // Verificar valor del campo Municipio

            $("#municipio").on('change',function(){
                var municipio_id    = $(this).val();
                var estado_id       = document.getElementById("estado").value;
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
    </script>
@endsection
