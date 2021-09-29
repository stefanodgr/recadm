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
          <h2>Registro Actividad - FORTALECIMIENTO -  </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body"> 
        <form  method="POST"  action="/strengthenings" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <form>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xpri_name">Nombre Actividad:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input type="text" class="form-control" id="xpri_name" name="nombre_actividad" required value="{{ old('nombre_actividad')}}" placeholder="Ej; Actividad 5 de Fortalecimiento">
                                        @if ($errors->has('nombre_actividad'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nombre_actividad') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="datatime">Fecha y Hora:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input id="datatime" class="form-control"  type="datetime-local" name="datatime" required value="{{ old('datatime')}}" > 
                                        
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="estado">Estado:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select id="estado"  name="estado" class="form-control" required>
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
                                    <div class="col-sm-2">
                                        <label for="municipio">Municipio:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select  id="municipio"  name="Municipio" class="form-control" required>
                                            <option value="">Selecciona un Municipio</option>
                                        </select>

                                        @if ($errors->has('municpio_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('municpio_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>  

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="parroquia">Parroquia:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="parroquia"  name="Parroquia" required class="form-control" value="{{ old('Parroquia')}}" >
                                            <option value="">Selecciona un Parroquia</option>
                                        </select>
                                    </div>
                                
                                    <div class="col-sm-2">
                                        <label for="sector">Sector-Localidad:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input type="text" class="form-control" id="sector" name="sector" required value="{{ old('sector')}}" placeholder="Ej: La Paz">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="asunto">Asunto Actividad:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input type="text" class="form-control" id="xpri_name" name="asunto" required value="{{ old('asunto')}}" placeholder="Ej; Actividad 5 de Fortalecimiento">
                                        @if ($errors->has('asunto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('asunto') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xseg_name">Tipo de Actividad:</label>
                                    </div>
                                    <div class="col-sm-4">
                                         <select id="exercise" required name="exercise" class="form-control">
                                            <option value="">Seleccione una Actividad</option>
                                            @foreach($activities as $index => $value)
                                                <option value="{{ $index }}" {{ old('Activitie') == $index ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                            </select>
    
                                            @if ($errors->has('activitie_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('activitie_id') }}</strong>
                                                </span>
                                            @endif                                        
                                    </div>
                                </div>    

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="objetivo_cumplir">Objetivos a Cumplir:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <textarea name="objetivo_cumplir" id="objetivo_cumplir" cols="110" rows="3" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="contenido">Contenido:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <textarea name="contenido" id="contenido" cols="110" rows="5" required></textarea>
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="objetivos-alcanzados">Objetivos Alcanzados:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <textarea name="objetivos-alcanzados" id="objetivos-alcanzados" cols="110" rows="3" required
                                        ></textarea>
                                    </div>
                                </div> 
                               
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xpri_name">Nivel de Logro %:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input type="text" class="form-control" id="porcentaje_logrado" name="porcentaje_logrado" value="{{ old('porcentaje_logrado')}}" placeholder="Ej; 100">
                                        @if ($errors->has('porcentaje_logrado'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('porcentaje_logrado') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xseg_name">Aporte Asignado Bs:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="aporte_asignado" name="aporte_asignado" value="{{ old('aporte_asignado')}}" placeholder="Ej; 1.500.000">
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xpri_name">Número de Personas Impactadas:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input type="text" class="form-control" id="porcentaje_logrado" name="porcentaje_logrado" value="{{ old('porcentaje_logrado')}}" placeholder="Ej; 100">
                                        @if ($errors->has('porcentaje_logrado'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('porcentaje_logrado') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xseg_name">Rendición Cuentas:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="rendicion_cuentas" name="rendicion_cuentas" value="{{ old('rendicion_cuentas')}}" placeholder="Ej; ">
                                        
                                    </div>
                                </div>
                                
                                <legend>Estructura Responsable de la Actividad</legend>
                                <hr>
                              
                                <div class="col">
                                    <select id="division"  name="division" class="form-control">
                                        <option value="">Seleccione Estructura Responsable</option>
                                        @foreach($divisions as $division)
                                            <option value="{{ $division->id }}" {{ old('Division') == $index ? 'selected' : '' }}>
                                                {{ $division->descripcion }}
                                            </option>
                                        @endforeach
                                        </select>

                                        @if ($errors->has('division_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('division_id') }}</strong>
                                            </span>
                                        @endif 
                                </div>    
                                <hr>
                                <legend>Estructuras Asistentes en la Actividad</legend>
                                <hr>
                              
                                <div class="col">
                
                                  @foreach($divisions as $division)                  
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" 
                                      class="custom-control-input" 
                                      id="division_{{$division->id}}"
                                      value="{{$division->id}}"
                                      name="division[]" >
                                      <label class="custom-control-label" 
                                          for="division_{{$division->id}}">
                                          {{ $division->id }}
                                          -  
                                          <em>( {{ $division->descripcion }} )</em>
                                      
                                      </label>
                                    </div>
                                  @endforeach
                                  <hr>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="observaciones">Observaciones:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <textarea name="observaciones" id="observaciones" cols="110" rows="2"></textarea>
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
                url:`../municipio/list/${estado_id}`,
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
                url:`../parroquia/list/${municipio_id}/${estado_id}`,
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