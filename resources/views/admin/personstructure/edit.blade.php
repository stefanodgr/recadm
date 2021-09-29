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
          <h2>Editar Militante-Estructura </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body" > 
        <form  method="POST"   action="/personstructure/{{ $personstructure->id }}" enctype="multipart/form-data" >
                @method('PATCH')
                @csrf()
                <input type="hidden" name="idperson" value="{{$personstructure->person_id}}" readonly>
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
                                    <label for="division">Divisiónes:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="division" name="Division">
                                    @foreach($divisions as $division)
                                    
                                    @if ( $personstructure->division_id == $division->id   )
                                    <option selected value="{{$personstructure->division_id}}"><strong>{{ $division->descripcion }}</strong></option>
                                    @endif
                                    @endforeach
                                    <option class="hidden" disabled >Seleccione Divisiones</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division['id'] }}" >
                                            {{ $division['descripcion'] }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="cargo">Cargos:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="cargo"  name="Cargo" class="form-control" >
                                        @foreach($positions as $position)
                                            @if ( $personstructure->position_id == $position->id)
                                                <option selected style="backgroud-color:blue;" value="{{$personstructure->position_id}}"><strong>{{ $position->descripcion }}</strong></option>
                                            @endif
                                        @endforeach
                                        <option class="hidden" disabled data-color="#A0522D" >Seleccione un Cargos</option>
                                        @foreach($positions as $position)
                                            @if ( $personstructure->division_id == $position->divisions_id)
                                                <option  value="{{$position->id}}"><strong>{{ $position->descripcion }}</strong></option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                    
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="estado">Estado:</label>
                                </div>
                           
                                    
                                    <div id="input_estado" class="col-sm-4" style="display:none;">
                                        <input type="text" class="form-control" value="Para todos los Estados" disabled >
                                    </div>
                                    {{-- @if (empty($estadosData)) --}}
                                    <div id="select_estado" class="col-sm-4"  >
                                        @if ($estados == null)
                                            <select id="estado"  name="Estado" class="form-control" disabled>
                                            <option value="">Seleccione un Estado</option>
                                            @foreach($estadosData as $index => $value)
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
                                        
                                        @else
                                            <select id="estado"  name="Estado" class="form-control" disabled>
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
                                        @endif
                                    </div>
                                   
                                  

                              
                                <div class="col-sm-2">
                                    <label for="municipio">Municipio:</label>
                                </div>
                                <div id="input_municipio" class="col-sm-4">
                                    <input type="text" class="form-control" value="Para todos los Municipios" disabled >
                                </div>
                                <div id="select_municipio" class="col-sm-4">
                                    @if ($municipios == '')
                                        <select  id="municipio"  name="Municipio" class="form-control" disabled>
                                            <option value="">Selecciona un Municipio</option>
                                        </select>

                                        @if ($errors->has('municpio_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('municpio_id') }}</strong>
                                            </span>
                                        @endif
                                
                               
                                    @else
                                            <select id="municipio"  name="Municipio" class="form-control" disabled>
                                            @foreach($municipios as $index => $value)
                                                <option value="{{ $index }}" {{ old('Municipio') == $index ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            </select>
                                            @endforeach
                                        

                                            @if ($errors->has('municipio_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('municipio_id') }}</strong>
                                                </span>
                                            @endif
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="parroquia">Parroquia:</label>
                                    </div>

                                    <div id="select_parroquia" class="col-sm-4">
                                        <select class="form-control" id="parroquia"  name="Parroquia" class="form-control" >
                                            @foreach($parroquias as $parroquia)
                                                @if ($personstructure->parroquia_id == $parroquia->id)
                                                    <option selected style="backgroud-color:blue;" value="{{$person->parroquia_id}}"><strong>{{ $parroquia->descripcion }}</strong></option>
                                                @endif
                                            @endforeach
                                            <option value="">Selecciona un Parroquia</option>
                                            @foreach($parroquias as $parroquia)
                                                @if ($municipioId == $parroquia->municipio_id)

                                                    <option style="backgroud-color:blue;" value="{{$parroquia->id}}"><strong>{{ $parroquia->descripcion }}</strong></option>
                                                @endif
                                            @endforeach
                                           
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
                                    <textarea name="Observaciones" id="" cols="100" rows="3" value="{{$personstructure->observaciones}}" >{{$personstructure->observaciones}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group  col-sm-6 ">
                                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Modificar</button>
                                </div> 
                                <div class="form-group col-sm-6">
                                    <a href="{{route('danger','personstructure.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                     
        </form>
@endsection
@section('slct_combo_personstructure_edit')
    <script>


    $( document ).ready(function() {
        var division_id    = document.getElementById("division").value;   // Verificar valor del campo Municipio 
        // alert("llego"+division);
        if(division_id < 10){
                        $('#select_estado').show();
                        $('#input_estado').hide(); //muestro mediante id
                        $('#select_municipio').hide(); //muestro mediante id
                        $('#input_municipio').show(); //muestro mediante id
                        $('#select_parroquia').hide(); //muestro mediante id
                        $('#input_parroquia').show(); //muestro mediante id
                        $('#estado').removeAttr("disabled");
                        $("#municipio").attr('disabled','disabled');
                        $("#parroquia").attr('disabled','disabled');
                        // alert("es menor a 10");
                    }
                    if(division_id == 10){
                        
                        // $('#estado').show();
                        // $('#municipio').hide(); //muestro mediante id
                        // $('#input_municipio').show(); //muestro mediante id
                        // $('#input_estado').hide(); //muestro mediante id
                        // $('#select_parroquia').hide(); //muestro mediante id
                        // $('#input_parroquia').show(); //muestro mediante id
                        $('#select_estado').show();
                        $('#input_estado').hide(); //muestro mediante id
                        $('#select_municipio').show(); //muestro mediante id
                        $('#input_municipio').hide(); //muestro mediante id
                        $('#select_parroquia').hide(); //muestro mediante id
                        $('#input_parroquia').show(); //muestro mediante id
                        $('#estado').removeAttr("disabled");
                        $('#municipio').removeAttr("disabled");
                        $("#parroquia").attr('disabled','disabled');
                       // alert("es  igual 10");

                    }
                    if(division_id > 10){
                        // alert("es mayor a 10");
                        $('#select_estado').hide(); //muestro mediante id
                        $('#input_estado').show(); //muestro mediante id
                        $('#select_municipio').hide(); //muestro mediante id
                        $('#input_municipio').show(); //muestro mediante id
                        $('#select_parroquia').hide(); //muestro mediante id
                        $('#input_parroquia').show(); //muestro mediante id
                        // $( "#x" ).prop( "disabled", true );
                        $("#estado").prop('disabled',true);
                        $("#municipio").attr('disabled','disabled');
                        $("#parroquia").attr('disabled','disabled');
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
                            
                        }
                    }
                    // getPositions(division_id);
    });



        $("#division").on('change',function(){
                var division_id = $(this).val();
                // $("#select_estado").val(" ");
                // $("#select_municipio").val(" ");
                // $("#select_parroquia").val(" ");
                // alert(division_id);
                if(division_id < 10){
                    $('#select_estado').show();
                    $('#input_estado').hide(); //muestro mediante id
                    $('#select_municipio').hide(); //muestro mediante id
                    $('#input_municipio').show(); //muestro mediante id
                    $('#select_parroquia').hide(); //muestro mediante id
                    $('#input_parroquia').show(); //muestro mediante id
                    $('#estado').removeAttr("disabled");
                    $("#municipio").attr('disabled','disabled');
                    $("#parroquia").attr('disabled','disabled');
                    // alert("es menor a 10");
                }
                if(division_id == 10){
                    // alert("es  igual 10");
                    $('#select_estado').show();
                    $('#input_estado').hide(); //muestro mediante id
                    $('#select_municipio').show(); //muestro mediante id
                    $('#input_municipio').hide(); //muestro mediante id
                    $('#select_parroquia').hide(); //muestro mediante id
                    $('#input_parroquia').show(); //muestro mediante id
                    $('#select_parroquia').hide(); //muestro mediante id
                    $('#input_parroquia').show(); //muestro mediante id
                    $('#estado').removeAttr("disabled");
                    $('#municipio').removeAttr("disabled");
                    $("#parroquia").attr('disabled','disabled');

                }
                if(division_id > 10){
                    // alert("es mayor a 10");
                    $('#select_estado').hide(); //muestro mediante id
                    $('#input_estado').show(); //muestro mediante id
                    $('#select_municipio').hide(); //muestro mediante id
                    $('#input_municipio').show(); //muestro mediante id
                    $('#select_parroquia').hide(); //muestro mediante id
                    $('#input_parroquia').show(); //muestro mediante id
                    $("#estado").attr('disabled','disabled');
                    $("#municipio").attr('disabled','disabled');
                    $("#parroquia").attr('disabled','disabled');
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
                        
                    }
                }
                getPositions(division_id);
            });
            var division_id    = document.getElementById("division").value;   // Verificar valor del campo Municipio 
        // alert("llegomunicipiuo"+" "+municipio_id);

        
        if(division_id == " "){
            $("#municipio").on('change',function(){
                var division_id    = $(this).val();
                getPositions(division_id);
            });
        }else{
            $( document ).ready(function() {
                var estado_id       = document.getElementById("estado").value;
                var municipio_id    = document.getElementById("municipio").value;
                // getParroquias(municipio_id,estado_id);
            });
        }

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
        
            $("#municipio").val("");
            $("#parroquia").val("");
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

        var municipio_id    = document.getElementById("municipio").value;   // Verificar valor del campo Municipio 
        

 
        if(municipio_id == " "){
            $("#municipio").on('change',function(){
                var municipio_id    = $(this).val();
                var estado_id       = document.getElementById("estado").value;
                getParroquias(municipio_id,estado_id);
            });
        }else{
            $( document ).ready(function() {
                var estado_id       = document.getElementById("estado").value;
                var municipio_id    = document.getElementById("municipio").value;
                // getParroquias(municipio_id,estado_id);
            });
        }

     
    
  
        
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