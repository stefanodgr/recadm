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
      <div class="col-md-12">
          <h2>Generador de Reporte Listado de Centros de Votación </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body"> 
        <form name="frm_person_validateCenter" id="frm_person_validateCenter" action="{{route('reportes.validateCenter')}}" method="post">
            @csrf
        {{-- <form  method="POST"  action="{{ route('persons.store') }}" enctype="multipart/form-data"> --}}
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                                
                                <legend>Filtros de Busqueda</legend>
                     
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
                                                <select class="form-control" id="parroquia"  name="Parroquia" class="form-control" value="{{ old('Parroquia')}}" >
                                                    <option value="">Selecciona un Parroquia</option>
                                                </select>
                                            </div>
                                        </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="form-group  col-sm-6 ">
                                        <button type="button" class="btn btn-primary btn-buscar btn-block" data-toggle="modal" data-target="#bus_modal">Consultar</button>
                                        {{-- <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Nuevo</button> --}}
                                    </div> 
                                    <div class="form-group col-sm-6">
                                        <a href="{{route('danger','persons')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                    </div>
                                 
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
                    <a  id="btn_center" class="btn btn-primary"  >Confirmar</a>
                </div>
            </div>
        </div>
@endsection
@section('javascript')
    <script>

       
        $('#btn_center').on('click',(e)=>{
                e.preventDefault();
                $("#frm_person_validateCenter").submit();  
                });
                $('#bus_modal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                });
                $(function(){
            });
            
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