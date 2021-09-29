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
          <h2>Editar Centro de Votación </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body"> 
        <form  method="POST"   action="/centervotes/{{ $centervote->id }}" >
            @method('PATCH')
            @csrf()
            <div class="container py-2">
            <div class="row">
                <div class="col-12 ">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="xcodigo">Código:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="xcodigo" name="Codigo" value="{{ $centervote->codigo}}" placeholder="Ej.00000000">
                            </div>
                            <div class="col-sm-2">
                                <label for="xnombre">Nombre:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="xnombre" name="Nombre" value="{{ $centervote->descripcion}}" placeholder="Ej.">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-sm-2">
                                <label for="estado">Estado:</label>
                            </div>
                            <div class="col-sm-4">
                                <select id="estado"  name="Estado" class="form-control">
                                    @foreach($estados as $estado)
                                        @if ( $centervote->estado_id == $estado->id   )
                                            <option selected style="backgroud-color:blue;" value="{{$centervote->estado_id}}"><strong>{{ $estado->descripcion }}</strong></option>
                                        @endif
                                    @endforeach
                                    <option class="hidden" disabled data-color="#A0522D" >Seleccione un Estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{ $estado['id'] }}" >
                                            {{ $estado['descripcion'] }}
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
                                    @foreach($municipios as $municipio)
                                    @if ( $centervote->municipio_id == $municipio->id)
                                        <option selected style="backgroud-color:blue;" value="{{$centervote->municipio_id}}"><strong>{{ $municipio->descripcion }}</strong></option>
                                    @endif
                                    @endforeach
                                    <option class="hidden" disabled data-color="#A0522D" >Seleccione un Municipio</option>
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
                                    @foreach($parroquias as $parroquia)
                                        @if ( $centervote->parroquia_id == $parroquia->id)
                                            <option selected style="backgroud-color:blue;" value="{{$centervote->parroquia_id}}"><strong>{{ $parroquia->descripcion }}</strong></option>
                                        @endif
                                    @endforeach
                                    <option class="hidden" disabled data-color="#A0522D" >Seleccione un Parroquia</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="xcicuito_muni">Circuito Municipio:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="xcicuito_muni" name="Circuito_Municipio" value="{{$centervote->circuito_municipio}}" placeholder="Ej." >
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-sm-2">
                                <label for="xdire">Dirección:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="xdire" name="Direccion" value="{{$centervote->direccion}}" placeholder="Ej.Frente de una estación">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="xnr_mesas">N° Mesas:</label>
                            </div>
                            <div class="col-sm-4">
                                
                                <input type="text" class="form-control" id="xnr_mesas" name="Nr_Mesas" value="{{$centervote->num_mesas}}" placeholder="Ej.00000000">
                            </div>
                            <div class="col-sm-2">
                                <label for="xcentro_acopio">Centro Acopio:</label>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" id="xcentro_acopio" name="Centro_Acopio" value="{{$centervote->centro_acopio}}">
                                    <option value="0">Seleccione</option>
                                    <option value="1" {{ $centervote->centro_acopio     == '1' ? 'selected' : '' }} >Si</option>
                                    <option value="2" {{ $centervote->centro_acopio     == '2' ? 'selected' : '' }} >No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="xremoto">Remoto:</label>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" id="xremoto" name="Remoto" value="{{$centervote->remoto}}">
                                    <option value="0">Seleccione</option>
                                    <option value="1" {{ $centervote->remoto == '1' ? 'selected' : '' }} >Si</option>
                                    <option value="2" {{ $centervote->remoto == '2' ? 'selected' : '' }} >No</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="xtecnologia">Tecnología:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="xtecnologia" name="Tecnologia" value="{{$centervote->tecnologia}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="xestracto">Estrato:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="xestracto" name="Estrato" value="{{$centervote->estrato}}">
                            </div>
                            <div class="col-sm-2">
                                <label for="xmuestra">Muestra:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="xmuestra" name="Muestra" value="{{$centervote->muestra}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-6">
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Modificar</button>
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
                // alert(estado_id);
                $('#parroquia').prop('selectedIndex',0);
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