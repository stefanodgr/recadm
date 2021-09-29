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
          <h2>Crear Centro de Votación </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body">
        <form  method="POST"   action="/centervotes">
            {{ csrf_field() }}
            <div class="container py-2">
                <div class="row">
                    <div class="col-12 ">
                        <form>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xcodigo">Código:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="xcodigo" name="Codigo" value="{{ old('Codigo')}}" placeholder="Ej.00000000">
                                </div>
                                <div class="col-sm-2">
                                    <label for="xnombre">Nombre:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="xnombre" name="Nombre" value="{{ old('Nombre')}}" placeholder="Ej.">
                                </div>
                            </div>
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
                                        <option id="" value=""> Seleccione un Muninicipio</option>
                                    </select>

                                    {{-- @if ($errors->has('municpio_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('municpio_id') }}</strong>
                                        </span>
                                    @endif --}}
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
                                    <label for="xcicuito_muni">Circuito Municipio:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="xcicuito_muni" name="Circuito_Municipio" value="{{ old('Circuito_Municipio')}}" placeholder="Ej." >
                                </div>
                            </div>
                            <div class="form-group row">
                                
                                <div class="col-sm-2">
                                    <label for="xdire">Dirección:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="xdire" name="Direccion" value="{{ old('Direccion')}}" placeholder="Ej.Frente de una estación">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xnr_mesas">N° Mesas:</label>
                                </div>
                                <div class="col-sm-4">
                                    
                                    <input type="text" class="form-control" id="xnr_mesas" name="Nr_Mesas" value="{{ old('Nr_Mesas')}}" placeholder="Ej.00000000">
                                </div>
                                <div class="col-sm-2">
                                    <label for="xcentro_acopio">Centro Acopio:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="xcentro_acopio" name="Centro_Acopio" value="{{ old('Centro_Acopio')}}">
                                        <option value="0">Seleccione</option>
                                        <option value="1" {{ old('Centro_Acopio') == '1' ? 'selected' : '' }} >Si</option>
                                        <option value="2" {{ old('Centro_Acopio') == '2' ? 'selected' : '' }} >No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xremoto">Remoto:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="xremoto" name="Remoto" value="{{ old('Remoto')}}">
                                        <option value="0">Seleccione</option>
                                        <option value="1" {{ old('Remoto') == '1' ? 'selected' : '' }} >Si</option>
                                        <option value="2" {{ old('Remoto') == '2' ? 'selected' : '' }} >No</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="xtecnologia">Tecnología:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="xtecnologia" name="Tecnologia" value="{{ old('Tecnologia')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="xestracto">Estrato:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="xestracto" name="Estrato" value="{{ old('Estrato')}}">
                                </div>
                                <div class="col-sm-2">
                                    <label for="xmuestra">Muestra:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="xmuestra" name="Muestra" value="{{ old('Muestra')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-sm-6">
                                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Guardar</button>
                                </div> 
                                <div class="form-group col-sm-6">
                                    <a href="{{route('danger','centervotes.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>       
        </form>
@endsection
@section('slct_combo_centervotes')
    <script>
            $("#estado").on('change',function(){
                var estado_id = $(this).val();
                $("#municipio").val("");
                $("#parroquia").val("");
                // $("#baba").val("");
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
                            htmlOptions += `<option  value='${id}'>${descripcion}</option>`
                        
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
                            htmlOptions += `<option value='${id}' {{ old('Parroquia') == '${id}' ? 'selected' : '' }} >${descripcion}</option>`

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