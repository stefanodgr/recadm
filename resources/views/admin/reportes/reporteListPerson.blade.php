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
          <h2>Generador de Reportes Militantes </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body"> 
        <form name="frm_person_validate" id="frm_person_validate" action="{{route('reportes.validate')}}" method="post">
            @csrf
        {{-- <form  method="POST"  action="{{ route('persons.store') }}" enctype="multipart/form-data"> --}}
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                                
                                <legend>Filtros de Busqueda</legend>
                     

                                <p>
                                    <button class="btn btn-outline-primary btn-block" onclick="displaydivFiltro(1);" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" >
                                      Estados/Municipios/Parroquias
                                    </button>
                                 
                                    <button class="btn btn-outline-primary btn-block" onclick="displaydivFiltro(2);" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                                        Divisiones/Cargos
                                  
                                    <button class="btn btn-outline-primary btn-block" onclick="displaydivFiltro(3);" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
                                        Militantes por CentroVotacion
                                    </button>
                                
                                  </p>
                                  <div class="collapse" id="div_estado" style="display: none;">
                                    <div class="card card-body">
                                        <div class="form-group row">
                                            <div class="col-sm-2">
                                                <label for="estado">Estado:</label>
                                            </div>
                                    
                                            <div class="col-sm-4">
                                                <select id="estado"  name="Estado" class="form-control">
                                                <option value="">TODOS</option>
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
                                                <select  id="municipio"  name="Municipio" class="form-control">
                                                    <option value="">TODOS</option>
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
                                                <select class="form-control" id="parroquia"  name="Parroquia" class="form-control" value="{{ old('Parroquia')}}" >
                                                    <option value="">TODOS</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="collapse hide" id="div_division" style="display: none;">
                                        <div class="card card-body">
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="division">División:</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <select id="division"  name="Division" class="form-control">
                                                    <option value="">TODOS</option>
                                                    @foreach($divisions as $index => $value)
                                                        <option value="{{ $index }}" {{ old('Division') == $index ? 'selected' : '' }}>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                    </select>

                                                    @if ($errors->has('division_id'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('division_id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-2">
                                                    <label for="position">Cargo:</label>
                                                </div>
                                        
                                                <div class="col-sm-4">
                                                    <select  id="cargo"  name="Cargo" class="form-control">
                                                        <option value="">TODOS</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        </div>
                                  </div>
                                  <div class="collapse" id="div_center" style="display: none">
                                        <div class="card card-body">
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="centervote">Centro Votacion:</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <select id="centervote"  name="CenterVote" class="form-control">
                                                    <option value="">TODOS</option>
                                                    @foreach($centervotes as $index => $value)
                                                        <option value="{{ $index }}" {{ old('CenterVote') == $index ? 'selected' : '' }}>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                  </div>
                                {{-- 
                                   
                                   
                                </div> --}}
                                <hr>
                                <div class="form-group row">
                                    <div class="form-group  col-sm-12 ">
                                        <button type="button" class="btn btn-primary btn-buscar btn-block" data-toggle="modal" data-target="#bus_modal">Consultar</button>
                                        {{-- <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Nuevo</button> --}}
                                    </div> 
                                    {{-- <div class="form-group col-sm-6">
                                        <a href="{{route('danger','persons')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                    </div> --}}
                                 
                                </div>
                        </div>
                    </div>
                </div>       
        </form>
        <div class="modal fade" id="bus_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Busqueda?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Darle confirmar verificará la existencia.</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a  id="btn" class="btn btn-primary"  >Confirmar</a>
                </div>
            </div>
        </div>
@endsection
@section('javascript')
    <script>


        function displaydivFiltro (opc){
            if(opc==1){
                // alert("llego-1");
                	
                document.getElementById("div_estado").style.display 		= "block";
                document.getElementById("div_division").style.display 		= "none";
                document.getElementById("div_center").style.display 		= "none";
                $("#estado").val("");	
                $("#municipio").val("");	
                $("#parroquia").val("");

                
                $("#division").val("");
                $("#cargo").val("");
                $("#centervote").val("");	
                // document.getElementById('estado').options[0].selected   = true;  /* FILTRO PAIS  */
            }else if(opc==2){
                // alert("llego-2");
                $("#estado").val("");	
                $("#municipio").val("");	
                $("#parroquia").val("");

                
                $("#division").val("");
                $("#cargo").val("");
                $("#centervote").val("");
                document.getElementById("div_estado").style.display 		= "none";
                document.getElementById("div_division").style.display 		= "block";
                document.getElementById("div_center").style.display 		= "none";
            }else{
                // alert("llego-3");
                $("#estado").val("");	
                $("#municipio").val("");	
                $("#parroquia").val("");

                $("#division").val("");
                $("#cargo").val("");
                $("#centervote").val("");

                document.getElementById("div_estado").style.display 	    = "none";
                document.getElementById("div_division").style.display 		= "none";
                document.getElementById("div_center").style.display 		= "block";
            }

        }

       
        $('#btn').on('click',(e)=>{
                e.preventDefault();
                $("#frm_person_validate").submit();  
                });
                $('#bus_modal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                });
                $(function(){
            });
            $("#division").on('change',function(){
                var division_id = $(this).val();
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