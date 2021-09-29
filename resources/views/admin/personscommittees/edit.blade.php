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
          <h2>Editar Militante-Comité </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body"> 
        <form  method="POST"   action="/personscommittees/{{ $personscommittee->id }}" enctype="multipart/form-data"> 
                @method('PATCH')
                @csrf()
               <input type="hidden" name="idperson" value="{{$personscommittee->person_id}}" readonly> 
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
                                    <select id="estado"  name="Estado" class="form-control">
                                        @foreach($estados as $estado)
                                            @if ( $localcommittees->estado_id == $estado->id)
                                                <option selected style="backgroud-color:blue;" value="{{$localcommittees->estado_id}}"><strong>{{ $estado->descripcion }}</strong></option>
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
                                    <select  id="municipio"  name="Municipio" class="form-control">
                                        @foreach($municipios as $municipio)
                                        @if ( $localcommittees->municipio_id == $municipio->id)
                                            <option selected style="backgroud-color:blue;" value="{{$localcommittees->municipio_id}}"><strong>{{ $municipio->descripcion }}</strong></option>
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
                                    <select class="form-control" id="parroquia"  name="Parroquia" class="form-control" >
                                        @foreach($parroquias as $parroquia)
                                            @if ( $localcommittees->parroquia_id == $parroquia->id)
                                                <option selected style="backgroud-color:blue;" value="{{$localcommittees->parroquia_id}}"><strong>{{ $parroquia->descripcion }}</strong></option>
                                            @endif
                                        @endforeach
                                        <option class="hidden" disabled data-color="#A0522D" >Seleccione un Parroquia</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="committee">Comites:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="committee"  name="Comites" class="form-control" >
                                        <option selected style="backgroud-color:blue;" value="{{$localcommittees->id}}" ><strong>{{ $localcommittees->descripcion }}</strong></option>
                                        <option class="hidden" disabled data-color="#A0522D" >Seleccione un Comite</option>
                                    </select>
                                </div>

                             
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="Observaciones">Observaciones:</label>
                                </div>
                                <div class="col-sm-4">
                                    <textarea name="Observaciones" id="" cols="35" rows="3" value="{{$personscommittee->observaciones}}" >{{$personscommittee->observaciones}}</textarea>
                                </div>
                                <div class="col-sm-2">
                                    <label for="cargos">Cargos:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="cargos"  name="Cargos" class="form-control"  >
                                        @foreach($positions as $position)
                                            @if ( $personscommittee->position_id == $position->id)
                                                <option selected style="backgroud-color:blue;" value="{{$position->id}}" selected><strong>{{ $position->descripcion }}</strong></option>
                                            @endif
                                        @endforeach
                                        <option class="hidden" disabled data-color="#A0522D" >Seleccione un Cargo</option>
                                        @foreach($positiones as $index => $value)
                                        <option value="{{ $index }}" {{ old('Cargos') == $index ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach

                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="form-group  col-sm-6 ">
                                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Modificar</button>
                                </div> 
                                <div class="form-group col-sm-6">
                                    <a href="{{route('danger','personscommittees.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
        </form>
@endsection
@section('slct_combo_personcommittees')
    <script>
        $("#estado").on('change',function(){
            var estado_id = $(this).val();
            $("#municipio").val("Seleccione un Municipio");
            $("#parroquia").val("Seleccione un Parroquia");
            $("#committee").val("Seleccione un Comite");
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
            getCommite(parroquia_id);
        });

        function getCommite(parroquia_id){
        // alert(`../../../../committee/list/${parroquia_id}`);
        $.ajax({
            url:`../../committee/list/${parroquia_id}`,
            beforSend:()=>{
                alert('consultando datos');
            },
            success:(response)=>{
                let committee = $("#committee");
                let htmlOptions = `<option value='' >Seleccione..</option>`;
                // console.clear();
                if(response.length > 0){
                    response.forEach((item, index, object)=>{
                        let {id,descripcion} = item;
                        htmlOptions += `<option value='${id}' {{ old('Comites') == '${id}' ? 'selected' : '' }}>${descripcion}</option>`

                    });
                }
                //console.clear();
                // console.log(htmlOptions);
                committee.html('');
                committee.html(htmlOptions);
            },
            error:(xhr)=>{
                alert('Presentamos inconvenientes al consultar los datos');
            }
        })
    }
    </script>
@endsection