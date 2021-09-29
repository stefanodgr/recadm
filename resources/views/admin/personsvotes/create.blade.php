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
          <h2>Crear Militante-Electoral </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body"> 
        <form  method="POST"  action="/personsvotes" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <form>
                                <input type="hidden" class="form-control" name="idperson" value="{{ $personvot->id }}" readonly>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcedula">Cédula:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{ $personvot->nacionalidad.$personvot->cedula }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcedula">Primer Nombre:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"  value="{{ $personvot->nombre_pr }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xfoto">Segundo Nombre:</label>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <input type="text" class="form-control" value="{{ $personvot->nombre_seg }}" readonly >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xpri_name">Primer Apellido:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $personvot->apellido_pr }}" readonly >
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xseg_name">Segundo Apellido:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $personvot->apellido_seg }}" readonly >
                                    </div>
                                </div>
                                <hr>
                                <legend>Datos Obligatorios</legend>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="estado">Estado:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select id="estado"  name="Estado" class="form-control" readonly>
                                            {{-- @foreach($persons as $person) --}}
                                            {{-- @if ( $personvot->id == $person->id) --}}

                                                @foreach ($filterCenters as $filterCenter)
                                                    {{-- @if ($person->cedula == $cne->cedula) --}}
                                                        @foreach ($estados as $estado)
                                                            @if ($filterCenter->estado_id == $estado->id)
                                                            <option value="{{$filterCenter->estado_id}}"><strong>{{ $estado->descripcion }}</strong></option>
                                                            @endif
                                                        @endforeach 
                                                    {{-- @endif  --}}
                                                @endforeach

                                            {{-- @endif --}}
                                        {{-- @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="municipio">Municipio:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select id="municipio"  name="Municipio" class="form-control" readonly>
        

                                                @foreach ($filterCenters as $filterCenter)
                                                        @foreach ($municipios as $municipio)
                                                            @if ($filterCenter->municipio_id == $municipio->id)
                                                            <option value="{{$filterCenter->municipio_id}}"><strong>{{ $municipio->descripcion }}</strong></option>
                                                            @endif
                                                        @endforeach 
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                   
                                    <div class="col-sm-2">
                                        <label for="parroquia">Parroquia:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select id="parroquia"  name="Parroquia" class="form-control" readonly>
                                        

                                                @foreach ($filterCenters as $filterCenter)
                                                        @foreach ($parroquias as $parroquia)
                                                            @if ($filterCenter->parroquia_id == $parroquia->id)
                                                            <option value="{{$filterCenter->parroquia_id}}"><strong>{{ $parroquia->descripcion }}</strong></option>
                                                            @endif
                                                        @endforeach 
                                                @endforeach

                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="center_vote">Centro Votación:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select id="center_vote"  name="Centro_Votacion" class="form-control" readonly>

                                                @foreach ($filterCenters as $filterCenter)
                                                        @foreach ($centervotes as $centervote)
                                                            @if ($filterCenter->codigo == $centervote->codigo)
                                                            <option value="{{$filterCenter->id}}"><strong>{{ $centervote->descripcion }}</strong></option>
                                                            @endif
                                                        @endforeach 
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="periodo">Periodo:</label>
                                    </div>
                                     <div class="col-sm-4">
                                        <select id="periodo"  name="Periodo" class="form-control">
                                        <option value="">Seleccione un Período Electoral</option>
                                        @foreach($periodo as $index => $value)
                                            <option value="{{ $index }}" {{ old('Periodo') == $index ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="electoral">Cargo Electoral:</label>
                                    </div>
                                     <div class="col-sm-4">
                                        <select id="electoral"  name="Cargo_Electoral" class="form-control">
                                        <option value="">Seleccione un Cargo Electoral</option>
                                        @foreach($electorallist as $index => $value)
                                            <option value="{{ $index }}" {{ old('Cargo_Electoral') == $index ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="Observaciones">Observaciones:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="Observaciones" id=""  rows="3"></textarea>
                                    </div>
                                </div>
                        
                                <div class="form-group row">
                                    <div class="form-group  col-sm-6 ">
                                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Nuevo</button>
                                    </div> 
                                    <div class="form-group col-sm-6">
                                        <a href="{{route('danger','personsvotes.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>       
        </form>
@endsection
@section('slct_combo_personsvotes')
    <script>
            $("#estado").on('change',function(){
                var estado_id = $(this).val();
                $("#municipio").val("");
                $("#parroquia").val("");
                $("#center_vote").val("");
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

        $("#parroquia").on('change',function(){
                var parroquia_id = $(this).val();
                // alert(parroquia_id);
                getCenterVotes(parroquia_id);
            });

            function getCenterVotes(parroquia_id){
            // alert(`../../centervote/list/${parroquia_id}`);
            $.ajax({
                url:`../../centervote/list/${parroquia_id}`,
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                    let center_vote = $("#center_vote");
                    let htmlOptions = `<option value='' >Seleccione..</option>`;
                    // console.clear();
                    if(response.length > 0){
                        response.forEach((item, index, object)=>{
                            let {id,descripcion} = item;
                            htmlOptions += `<option value='${id}' {{ old('Centro_Votacion') == '${id}' ? 'selected' : '' }}>${descripcion}</option>`

                        });
                    }
                    //console.clear();
                    // console.log(htmlOptions);
                    center_vote.html('');
                    center_vote.html(htmlOptions);
                },
                error:(xhr)=>{
                    alert('Presentamos inconvenientes al consultar los datos');
                }
            })
        }
    </script>
@endsection