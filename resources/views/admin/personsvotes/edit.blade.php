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
          <h2>Editar Militante-Electoral </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body"> 
        <form  method="POST"   action="/personsvotes/{{ $personsvote->id }}" enctype="multipart/form-data"> 
                @method('PATCH')
                @csrf()
               <input type="hidden" name="idperson" value="{{$personsvote->person_id}}" readonly> 
               <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xcedula">Cédula:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  value="{{$person->nacionalidad."-".$person->cedula}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xcedula">Primer Nombre:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"  value="{{ $person->nombre_pr }}" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <label for="xfoto">Segundo Nombre:</label>
                                </div>
                                <div class="col-sm-4 ">
                                    <input type="text" class="form-control" value="{{ $person->nombre_seg }}" readonly >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xpri_name">Primer Apellido:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->apellido_pr }}" readonly >
                                </div>
                                <div class="col-sm-2">
                                    <label for="xseg_name">Segundo Apellido:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $person->apellido_seg }}" readonly >
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
                                        @foreach($estados as $estado)
                                            @if ( $centervotes->estado_id == $estado->id)
                                                <option selected style="backgroud-color:blue;" value="{{$centervotes->estado_id}}"><strong>{{ $estado->descripcion }}</strong></option>
                                            @endif
                                        @endforeach
                                        <option class="hidden" disabled data-color="#A0522D" >Seleccione un Estado</option>
                                        @foreach($estados as $estado)
                                            <option value="{{ $estado['id'] }}" >
                                                {{ $estado['descripcion'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                             <div class="col-sm-2">
                                    <label for="municipio">Municipio:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select  id="municipio"  name="Municipio" class="form-control" readonly>
                                        @foreach($municipios as $municipio)
                                        @if ( $centervotes->municipio_id == $municipio->id)
                                            <option selected style="backgroud-color:blue;" value="{{$centervotes->municipio_id}}"><strong>{{ $municipio->descripcion }}</strong></option>
                                        @endif
                                        @endforeach
                                        <option class="hidden" disabled data-color="#A0522D" >Seleccione un Municipio</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="parroquia">Parroquia:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="parroquia"  name="Parroquia" class="form-control" readonly >
                                        @foreach($parroquias as $parroquia)
                                            @if ( $centervotes->parroquia_id == $parroquia->id)
                                                <option selected style="backgroud-color:blue;" value="{{$centervotes->parroquia_id}}"><strong>{{ $parroquia->descripcion }}</strong></option>
                                            @endif
                                        @endforeach
                                        <option class="hidden" disabled data-color="#A0522D" >Seleccione un Parroquia</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="center_vote">Centro Votación:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="center_vote"  name="Centro_Votacion" class="form-control" readonly>
                                            <option selected style="backgroud-color:blue;" value="{{$centervotes->id}}"><strong>{{ $centervotes->descripcion }}</strong></option>
                                    <option class="hidden" disabled data-color="#A0522D" >Seleccione un Centro Votación</option>
                                
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="cargo">Período Electoral:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select id="cargo"  name="Periodo" class="form-control">
                                        @foreach($electoralcommissions as $electoralcommission)
                                            @if ( $personsvote->periodo_id == $electoralcommission->id)
                                                <option selected style="backgroud-color:blue;" value="{{$personsvote->periodo_id}}"><strong>{{ $electoralcommission->descripcion }}</strong></option>
                                            @endif
                                        @endforeach
                                        <option class="hidden" disabled data-color="#A0522D" >Seleccione un Período Electoral</option>
                                        @foreach($electoralcommissions as $electoralcommission)
                                            <option value="{{ $electoralcommission['id'] }}" >
                                                {{ $electoralcommission['descripcion'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="cargo">Cargo Electoral:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select id="cargo"  name="Cargo_Electoral" class="form-control">
                                        @foreach($electorallists as $electorallist)
                                            @if ( $personsvote->electorallist_id == $electorallist->id)
                                                <option selected style="backgroud-color:blue;" value="{{$personsvote->electorallist_id}}"><strong>{{ $electorallist->descripcion }}</strong></option>
                                            @endif
                                        @endforeach
                                        <option class="hidden" disabled data-color="#A0522D" >Seleccione un Cargo Electoral</option>
                                        @foreach($electorallists as $electorallist)
                                            <option value="{{ $electorallist['id'] }}" >
                                                {{ $electorallist['descripcion'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="Observaciones">Observaciones:</label>
                                </div>
                                <div class="col-sm-4">
                                    <textarea name="Observaciones" id="" cols="35" rows="3" value="{{$personsvote->observaciones}}" >{{$personsvote->observaciones}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group  col-sm-6 ">
                                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Modificar</button>
                                </div> 
                                <div class="form-group col-sm-6">
                                    <a href="{{route('danger','personsvotes.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
        </form>
@endsection
@section('slct_combo_personsvotes')
    <script>

          
            $("#estado").on('change',function(){
                var estado_id = $(this).val();
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