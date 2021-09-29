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
        <form  method="POST"   action="/localcommittees/{{ $localcommittee->id }}" >
            @method('PATCH')
            @csrf()
            <div class="container py-2">
            <div class="row">
                <div class="col-12 ">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="xnombre">Nombre:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="xnombre" name="Nombre" value="{{ $localcommittee->descripcion}}" placeholder="Ej.">
                            </div>
                            <div class="col-sm-2">
                                <label for="estado">Estado:</label>
                            </div>
                            <div class="col-sm-4">
                                <select id="estado"  name="Estado" class="form-control">
                                    @foreach($estados as $estado)
                                        @if ( $localcommittee->estado_id == $estado->id   )
                                            <option selected style="backgroud-color:blue;" value="{{$localcommittee->estado_id}}"><strong>{{ $estado->descripcion }}</strong></option>
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
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="municipio">Municipio:</label>
                            </div>
                            <div class="col-sm-4">
                                <select  id="municipio"  name="Municipio" class="form-control">
                                    @foreach($municipios as $municipio)
                                    @if ( $localcommittee->municipio_id == $municipio->id)
                                        <option selected style="backgroud-color:blue;" value="{{$localcommittee->municipio_id}}"><strong>{{ $municipio->descripcion }}</strong></option>
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
                            <div class="col-sm-2">
                                <label for="parroquia">Parroquia:</label>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" id="parroquia"  name="Parroquia" class="form-control" >
                                    @foreach($parroquias as $parroquia)
                                        @if ( $localcommittee->parroquia_id == $parroquia->id)
                                            <option selected style="backgroud-color:blue;" value="{{$localcommittee->parroquia_id}}"><strong>{{ $parroquia->descripcion }}</strong></option>
                                        @endif
                                    @endforeach
                                    <option class="hidden" disabled data-color="#A0522D" >Seleccione un Parroquia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="Observaciones">Observaciones:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea name="Observaciones" id="" cols="100" rows="3" value="{{ $localcommittee->observaciones}}"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-6">
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Modificar</button>
                            </div> 
                            <div class="form-group col-sm-6">
                                <a href="{{route('danger','localcommittees.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>       
        </form>
@endsection
@section('slct_combo_localcommittees')
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