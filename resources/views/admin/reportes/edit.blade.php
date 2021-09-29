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
          <h2>Editar Militante </h2>
      </div>
  
    </div>
  </div>
  <!-- /container-fluid -->
  
<div class="card shadow mb-4">
    <div class="card-body"> 
         
        <form  method="POST"    action="{{ route('persons.update',$person->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf()
                
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <form>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="">
                                    <div class="">
                                        @if ($person->foto_img == null || $person->foto_img == ''  )
                                        <img src="{{ asset('/storage/images/persons_foto/sin_foto.png') }}" class="Rounded Corners: mx-auto"  width="250">
                                        @else
                                        <img src="{{ asset('/storage/images/persons_foto/'.$person->foto_img) }}" class="Rounded Corners: mx-auto" alt="{{ $person->foto_img }}" width="250">
                                        @endif

                                        @if ($person->foto_img == null || $person->foto_img == '' )
                                        <input type="file" class="form-control-file" id="xfoto" name="Foto" value="Sin Foto" >
                                        @else
                                        <input type="file" class="form-control-file" id="xfoto" name="Foto" value="{{$person->foto_img}}" >
                                        @endif
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="">
                                    <div class="">
                                        <div class="col-sm-4">
                                            <label for="xnaci">Nacionalidad:</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="xnaci" name="Nacionalidad" readonly >
                                                <option value="">Seleccione</option>
                                                <option value="V" {{ $person->nacionalidad == 'V' ? 'selected' : '' }} >Venezolano</option>
                                                <option value="E" {{ $person->nacionalidad == 'E' ? 'selected' : '' }} >Extrajero</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-8">
                                            <label for="xpri_name">Primer Nombre:</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="xpri_name" name="Primer_Nombre" value="{{$person->nombre_pr}}" placeholder="Ej.Jose" readonly>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="xpri_ape">Primer Apellido:</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="xpri_ape" name="Primer_Apellido" value="{{$person->apellido_pr}}" placeholder="Ej.Fernandez" readonly  >
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="">
                                        <div class="">
                                        <div class="col-sm-7">
                                            <label for="xcedula">Cedula:</label>
                                        </div>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" id="xcedula" name="Cedula" value="{{ $person->cedula}}" placeholder="Ej.00000000" readonly>
                                        </div>
                                
                                        <div class="col-sm-7">
                                            <label for="xseg_name">Segundo Nombre:</label>
                                        </div>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" id="xseg_name" name="Segundo_Nombre" value="{{$person->nombre_seg}}" placeholder="Ej.Manuel" readonly>
                                        </div>
                                        <div class="col-sm-7">
                                            <label for="xseg_ape">Segundo Apellido:</label>
                                        </div>
                                        <div class="col-sm-12 ">
                                            <input type="text" class="form-control" id="xseg_ape" name="Segundo_Apellido" value="{{$person->apellido_seg}}" placeholder="Ej.Perez" readonly>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                      <br>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xfecha_nace">Fecha Nacimiento:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="xfecha_nace" name="Fecha_Nacimiento" value="{{$person->fecha_nac}}" readonly >
                                    </div> 
                                    <div class="col-sm-2">
                                        <label for="xgenero">Genero:</label>
                                    </div>
                                    <div class="col-sm-4">
                                            <input type="text" class="form-control" id="xtelf_local" name="Genero" value="{{$person->genero}}"  readonly  >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xemail">Email:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="xemail" name="Email" value="{{$person->email}}" placeholder="Ej.xxx@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 ">
                                        <label for="xtelf_local">Télefono Local:</label>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <input type="text" class="form-control" id="xtelf_local" name="Telefono_Local" value="{{$person->telf_local}}" placeholder="Ej.02125555555" maxlength="11" >
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xtelf_cel">Télefono Célular:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xtelf_cel" name="Telefono_Celular" value="{{$person->telf_celular}}" placeholder="Ej.04145555555" maxlength="11" > 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xprofe">Profesión:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="xprofe" name="Profesion">
                                        @foreach($profesiones as $profesion)
                                        
                                        @if ( $person->profession_id == $profesion->id   )
                                        <option selected value="{{$person->profession_id}}"><strong>{{ $profesion->descripcion }}</strong></option>
                                        @endif
                                        @endforeach
                                        <option class="hidden" disabled >Seleccione Profesion</option>
                                        @foreach($profesiones as $profesion)
                                            <option value="{{ $profesion['id'] }}" >
                                                {{ $profesion['descripcion'] }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div> 
                                    <div class="col-sm-2">
                                        <label for="xnivel">Nivel Académico:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="xnivel" name="Nivel_Academico">
                                
                                        @foreach($nivel_Academico as $nivel)
                                        
                                                @if ( $person->academiclevel_id == $nivel->id   )
                                                <option selected value="{{$person->academiclevel_id}}"><strong>{{ $nivel->descripcion }}</strong></option>
                                            @endif
                                        @endforeach
                                        <option class="hidden" disabled >Seleccione un Nivel Academico</option>
                                        @foreach($nivel_Academico as $nivel)
                                            <option value="{{ $nivel['id'] }}" >
                                                {{ $nivel['descripcion'] }}
                                            </option>
                                        @endforeach
                                        
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xdire">Dirección pto-ref:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        <input type="text" class="form-control" id="xdire" name="Direccion" value="{{$person->direccion}}" placeholder="Ej.Frente de una estación">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xaveni">Avenida:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xaveni" name="Avenida" value="{{$person->avenida}}" placeholder="Ej.Av San Martin">
                                    </div>
                                </div>
                        
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcalle">Calle:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xcalle" name="Calle" value="{{$person->calle}}" placeholder="Ej.Calle San Juan">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="estado">Estado:</label>
                                    </div>
                            
                                    <div class="col-sm-4">
                                        <select id="estado"  name="Estado" class="form-control">
                                            @foreach($estados as $estado)
                                                @if ( $person->estado_id == $estado->id   )
                                                    <option selected style="backgroud-color:blue;" value="{{$person->estado_id}}"><strong>{{ $estado->descripcion }}</strong></option>
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
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="municipio">Municipio:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select  id="municipio"  name="Municipio" class="form-control">
                                            @foreach($municipios as $municipio)
                                            @if ( $person->municipio_id == $municipio->id)
                                                <option selected style="backgroud-color:blue;" value="{{$person->municipio_id}}"><strong>{{ $municipio->descripcion }}</strong></option>
                                            @endif
                                            @endforeach
                                            <option class="hidden" disabled data-color="#A0522D" >Seleccione un Municipio</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="parroquia">Parroquia:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="parroquia"  name="Parroquia" class="form-control" >
                                            @foreach($parroquias as $parroquia)
                                                @if ( $person->parroquia_id == $parroquia->id)
                                                    <option selected style="backgroud-color:blue;" value="{{$person->parroquia_id}}"><strong>{{ $parroquia->descripcion }}</strong></option>
                                                @endif
                                            @endforeach
                                            <option class="hidden" disabled data-color="#A0522D" >Seleccione un Parroquia</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <legend>Redes Sociales</legend>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xtwitter">Twitter:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xtwitter"  name="Twitter"  value="{{$person->twitter}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xinstagram">Instagram:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xinstagram" name="Instagram"  value="{{$person->instagram}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xfacebook">Facebook:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xfacebook" name="Facebook"  value="{{$person->facebook}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xpaginaweb">Pagina Web:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="xpaginaweb" name="Pagina_Web" value="{{$person->paginaweb}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Modificar</button>
                                    </div> 
                                    <div class="form-group col-sm-6">
                                        <a href="{{route('danger','persons')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>       
        </form>
@endsection
@section('javascript_edit')
    <script>
            $("#estado").on('change',function(){
                var estado_id = $(this).val();
                // alert(estado_id);
                getMunicipios(estado_id);
            });

        function getMunicipios(estado_id){
            alert(`../../municipio/list/${estado_id}`);
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
                            htmlOptions += `<option value='${id}'>${descripcion}</option>`;

                        });
                    }
                    //console.clear();
                    console.log(htmlOptions);
                    municipio.html('');
                    municipio.html(htmlOptions);
                
                    
                
                },
                error:(xhr)=>{
                    alert('Presentamos inconvenientes al consultar los datos');
                }
            })
        }

        $("#municipio").on('change',function(){
                // var municipio_id = $(this).attr("id");
                var municipio_id = $(this).val();
                // alert(municipio_id);
                var estado_id    = document.getElementById("estado").value;
                getParroquias(municipio_id,estado_id);
            });

        function getParroquias(municipio_id,estado_id){
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
                            htmlOptions += `<option value='${id}' >${descripcion}</option>`

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
        // Funcion Solo Numero
        $(function(){
        soloNumeros('xtelf_local');
        soloNumeros('xtelf_cel');
        });
    
    </script>
@endsection