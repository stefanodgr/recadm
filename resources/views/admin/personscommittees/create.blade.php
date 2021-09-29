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
          <h2>Crear Militante-Comites </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body"> 
        <form  method="POST"  action="/personscommittees" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <form>
                                <input type="hidden" class="form-control" name="idperson" value="{{ $personscommitte->id }}" readonly>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcedula">Cédula:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{ $personscommitte->nacionalidad.$personscommitte->cedula }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcedula">Primer Nombre:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"  value="{{ $personscommitte->nombre_pr }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xfoto">Segundo Nombre:</label>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <input type="text" class="form-control" value="{{ $personscommitte->nombre_seg }}" readonly >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xpri_name">Primer Apellido:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $personscommitte->apellido_pr }}" readonly >
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xseg_name">Segundo Apellido:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $personscommitte->apellido_seg }}" readonly >
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
                                        <option value="">Seleccione un Estado</option>
                                        @foreach($estados as $index => $value)
                                            <option value="{{ $index }}" {{ old('Estado') == $index ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="municipio">Municipio:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select  id="municipio"  name="Municipio" class="form-control">
                                            <option value="">Selecciona un Municipio</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                   
                                    <div class="col-sm-2">
                                        <label for="parroquia">Parroquia:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="parroquia"  name="Parroquia" class="form-control" >
                                            <option value="">Selecciona un Parroquia</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="committee">Comités:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="committee"  name="Comites" class="form-control" >
                                            <option value="">Seleccione un Comité</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="Observaciones">Observaciones:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <textarea name="Observaciones" id="" cols="35" rows="3"></textarea>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="Observaciones">Cargos:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select id="cargos"  name="Cargos" class="form-control" >
                                        @foreach($position as $index => $value)
                                            <option value="{{ $index }}" {{ old('Cargos') == $index ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                        
                                <div class="form-group row">
                                    <div class="form-group  col-sm-6 ">
                                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Nuevo</button>
                                    </div> 
                                    <div class="form-group col-sm-6">
                                        <a href="{{route('danger','personscommittees.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>       
        </form>
@endsection
@section('slct_combo_personcommittees')
    <script>
            $("#estado").on('change',function(){
                var estado_id = $(this).val();
                $("#municipio").val("");
                $("#parroquia").val("");
                $("#localcommittee").val("");
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