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
                <h2>Editar de Usuario </h2>
            </div>

        </div>
    </div>
    <!-- /container-fluid -->

    <div class="card shadow mb-4">
        <div class="card-body">
            <form  method="POST"   action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data" >
                @method('PATCH')
                @csrf()
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <form>

                                <input type="hidden" class="form-control" name="idperson" value="{{ $personregister->id }}" readonly>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcedula">Cédula:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{ $personregister->nacionalidad.$personregister->cedula }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcedula">Primer Nombre:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"  value="{{ $personregister->nombre_pr }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xfoto">Segundo Nombre:</label>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <input type="text" class="form-control" value="{{ $personregister->nombre_seg }}" readonly >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xpri_name">Primer Apellido:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $personregister->apellido_pr }}" readonly >
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="xseg_name">Segundo Apellido:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ $personregister->apellido_seg }}" readonly >
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
                                            <option value="{{$personregister->estado['id']}}">{{$personregister->estado['descripcion']}}</option>
                                            <option value="">-------------------</option>
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
                                            <option value="{{$personregister->municipio['id']}}">{{$personregister->municipio['descripcion']}}</option>
                                            <option value="">-------------------</option>
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
                                        <label for="inputUserame">Usuario:</label>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                        @enderror
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" id="inputUserame" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{$user->name }}" placeholder="Username" required autocomplete="name" autofocus>
                                    </div>

                                    <div class="col-sm-2">s
                                        <label for="inputEmail">Email:</label>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                        @enderror
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email }}" placeholder="Email address" required autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="inputEmail">Roles:</label>
                                        @error('roles')
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                        @enderror
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="roles" name="Roles" title="Color del Producto">
                                            <option value="{{$user->role_id}}">{{$user->roles['name']}}</option>
                                            <option value="0">----------------</option>
                                            @if (empty($roles))
                                            @else
                                                <div class="dropdown">
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" {{ old('Roles') }}>{{ $role->name }}</option>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="inputPassword">Clave</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                                        @enderror
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                                    </div>

                                    <div class="col-sm-2">
                                        <label for="inputConfirmPassword">Confirmación Clave:</label>
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Registrar</button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <a href="{{route('danger','users.index')}}" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    @endsection


                    @section('javascript')
                        <script>

                            $("#estado").on('change',function(){
                                var estado_id = $(this).val();
                                $("#municipio").val("Seleccione Municipio");

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
                                        let htmlOptions = `<option value='0' >Todos los Municipios</option>`;
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


                        </script>
@endsection
