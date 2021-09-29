<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <!-- Styles -->
      {{-- <link href="{{ public_path() .'css/app.css' }}" rel="stylesheet"> --}}
      {{-- <link href="{{ public_path() .'vendor/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet"> --}}
      {{-- <link href="{{ public_path() .'css/admin/sb-admin-2.css' }}" rel="stylesheet"> --}}
      {{-- {{-- <link href="{{ public_path() .'vendor/bootstrap/css/bootstrap.css' }}" rel="stylesheet"> --}}
      {{-- <link href="{{ asset('vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">  --}}

{{-- <link href="{{ asset('css/app.css')}}" rel="stylesheet"> --}}
{{-- <link href="{{ asset('css/admin/sb-admin-2.css')}}" rel="stylesheet"> --}}
    <STYLE type="text/css">
        div.titulo {text-align: right}
        .imagen {
            position: absolute;
            top: 4px;
            width: 200px;
            height:200px;
            /* border: 3px solid green; */
        }
        /* .table {
	width: 10px;
	height: 10px;
        } */
       </STYLE>
</head>

<body>
    <div class="titulo">
        
        <strong> Generado desde Recad el {{$ldate}}</strong>
    </div>
    <table width="200" >
        <tr>
            <td width="150"><img src="{{ public_path() .'/storage/images/logos/logo.png' }}"  width="130" height="100"></td>
            <td width="380"><h4>Listado de Centros de Votación</h4></td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <table   width="650px" border="1" style="font-size: 8px">
        <tr>
            <th align="center"  style="background-color:#0dc706;"   width="2" ><strong>Código</strong> </th>
            <th align="center"  style="background-color:#0dc706;"   width="10" ><strong> Descripción</strong></th>
            <th align="center"  style="background-color:#0dc706;"   width="10"><strong>Estado</strong></th>
            <th align="center"  style="background-color:#0dc706;"   width="20"><strong>Municipio</strong></th>
            <th align="center"  style="background-color:#0dc706;"   width="20"><strong>Parroquia</strong></th>
            <th align="center"  style="background-color:#0dc706;"   width="20"><strong>Circuito Municipio</strong></th>
            <th align="center"  style="background-color:#0dc706;"   width="20"><strong>N° Mesas</strong></th>
            <th align="center"  style="background-color:#0dc706;"   width="15"><strong>Centro Acopio</strong></th>
            <th align="center"  style="background-color:#0dc706;"   width="10"><strong>Remoto</strong></th>
            <th align="center"  style="background-color:#0dc706;"   width="20"><strong>Tecnologia</strong></th>
            <th align="center"  style="background-color:#0dc706;"   width="10"><strong>Estrato</strong></th>
            <th align="center"  style="background-color:#0dc706;"   width="10"><strong>Muestra</strong></th>
          </tr>
        
             
        @if (empty($estado_filtro) &&  empty($municipio_filtro) && empty($parroquia_filtro)  )
            @foreach ($centervotes as $centervote)
            <tr>
                
                <td>{{$centervote->codigo}}</td>  {{-- CODIGO  --}}
                <td>{{$centervote->descripcion}}</td>  {{-- CODIGO  --}}
                <td>{{$centervote->estado['descripcion']}}</td>  {{-- CODIGO  --}}
                <td>{{$centervote->municipio['descripcion']}}</td>  {{-- CODIGO  --}}
                <td>{{$centervote->parroquia['descripcion']}}</td>  {{-- CODIGO  --}}
                <td>{{$centervote->circuito_municipio}}</td>  {{-- CODIGO  --}}
                <td>{{$centervote->num_mesas}}</td>  {{-- CODIGO  --}}
                @if ( $centervote->centro_acopio == '1')
                    <td align="center">Si</td>
                @else
                    <td align="center">no</td>
                @endif

                @if ( $centervote->remoto == '1')
                    <td align="center">Si</td>
                @else
                    <td align="center">no</td>
                @endif
                @if (empty($centervote->tecnologia))    {{-- CODIGO  --}}
                <td align="center" >No posee</td>
                @else
                <td align="center">{{$centervote->tecnologia}}</td>
                @endif
                @if (empty($centervote->estrato))       {{-- CODIGO  --}}
                <td align="center">No posee</td>
                @else
                <td align="center">{{$centervote->estrato}}</td>
                @endif
                @if (empty($centervote->muestra))        {{-- CODIGO  --}}
                <td align="center">No posee</td>
                @else
                <td align="center">{{$centervote->muestra}}</td>
                @endif
            </tr>
            @endforeach
        @endif
        @if (!empty($estado_filtro) &&  empty($municipio_filtro) && empty($parroquia_filtro)  )
            @foreach ($centro_estados as $centro_estado)
                @foreach ($centervotes as $centervote)
                    @if ( $centro_estado->id == $centervote->id   )
                    <tr>
                        <td>{{$centervote->codigo}}</td>  {{-- CODIGO  --}}
                        <td>{{$centervote->descripcion}}</td>  {{-- CODIGO  --}}
                        <td>{{$centervote->estado['descripcion']}}</td>  {{-- CODIGO  --}}
                        <td>{{$centervote->municipio['descripcion']}}</td>  {{-- CODIGO  --}}
                        <td>{{$centervote->parroquia['descripcion']}}</td>  {{-- CODIGO  --}}
                        <td>{{$centervote->circuito_municipio}}</td>  {{-- CODIGO  --}}
                        <td>{{$centervote->num_mesas}}</td>  {{-- CODIGO  --}}
                        @if ( $centervote->centro_acopio == '1')
                            <td align="center">Si</td>
                        @else
                            <td align="center">no</td>
                        @endif
                        @if ( $centervote->remoto == '1')
                            <td align="center">Si</td>
                        @else
                            <td align="center">no</td>
                        @endif
                        @if (empty($centervote->tecnologia))    {{-- CODIGO  --}}
                        <td align="center" >No posee</td>
                        @else
                        <td align="center">{{$centervote->tecnologia}}</td>
                        @endif
                        @if (empty($centervote->estrato))       {{-- CODIGO  --}}
                        <td align="center">No posee</td>
                        @else
                        <td align="center">{{$centervote->estrato}}</td>
                        @endif
                        @if (empty($centervote->muestra))        {{-- CODIGO  --}}
                        <td align="center">No posee</td>
                        @else
                        <td align="center">{{$centervote->muestra}}</td>
                        @endif
                    </tr>
                    @endif
                @endforeach
            @endforeach
        @endif
        @if (!empty($estado_filtro) &&  !empty($municipio_filtro) && empty($parroquia_filtro)  )
            @foreach ($centro_municipios as $centro_municipio)
                @foreach ($centervotes as $centervote)
                    @if ( $centro_municipio->id == $centervote->id   )
                        <tr>
                            <td>{{$centervote->codigo}}</td>  {{-- CODIGO  --}}
                            <td>{{$centervote->descripcion}}</td>  {{-- CODIGO  --}}
                            <td>{{$centervote->estado['descripcion']}}</td>  {{-- CODIGO  --}}
                            <td>{{$centervote->municipio['descripcion']}}</td>  {{-- CODIGO  --}}
                            <td>{{$centervote->parroquia['descripcion']}}</td>  {{-- CODIGO  --}}
                            <td>{{$centervote->circuito_municipio}}</td>  {{-- CODIGO  --}}
                            <td>{{$centervote->num_mesas}}</td>  {{-- CODIGO  --}}
                            @if ( $centervote->centro_acopio == '1')
                                <td align="center">Si</td>
                            @else
                                <td align="center">no</td>
                            @endif

                            @if ( $centervote->remoto == '1')
                                <td align="center">Si</td>
                            @else
                                <td align="center">no</td>
                            @endif
                            @if (empty($centervote->tecnologia))    {{-- CODIGO  --}}
                            <td align="center" >No posee</td>
                            @else
                            <td align="center">{{$centervote->tecnologia}}</td>
                            @endif
                            @if (empty($centervote->estrato))       {{-- CODIGO  --}}
                            <td align="center">No posee</td>
                            @else
                            <td align="center">{{$centervote->estrato}}</td>
                            @endif
                            @if (empty($centervote->muestra))        {{-- CODIGO  --}}
                            <td align="center">No posee</td>
                            @else
                            <td align="center">{{$centervote->muestra}}</td>
                            @endif
                        </tr>
                    @endif
                @endforeach
            @endforeach
        @endif
        @if (!empty($estado_filtro) &&  !empty($municipio_filtro) && !empty($parroquia_filtro)  )
            @foreach ($centro_parroquias as $centro_parroquia)
                @foreach ($centervotes as $centervote)
                    @if ( $centro_parroquia->id == $centervote->id   )
                        <tr>
                            <td>{{$centervote->codigo}}</td>  {{-- CODIGO  --}}
                            <td>{{$centervote->descripcion}}</td>  {{-- CODIGO  --}}
                            <td>{{$centervote->estado['descripcion']}}</td>  {{-- CODIGO  --}}
                            <td>{{$centervote->municipio['descripcion']}}</td>  {{-- CODIGO  --}}
                            <td>{{$centervote->parroquia['descripcion']}}</td>  {{-- CODIGO  --}}
                            <td>{{$centervote->circuito_municipio}}</td>  {{-- CODIGO  --}}
                            <td>{{$centervote->num_mesas}}</td>  {{-- CODIGO  --}}
                            @if ( $centervote->centro_acopio == '1')
                                <td align="center">Si</td>
                            @else
                                <td align="center">no</td>
                            @endif
            
                            @if ( $centervote->remoto == '1')
                                <td align="center">Si</td>
                            @else
                                <td align="center">no</td>
                            @endif
                            @if (empty($centervote->tecnologia))    {{-- CODIGO  --}}
                            <td align="center" >No posee</td>
                            @else
                            <td align="center">{{$centervote->tecnologia}}</td>
                            @endif
                            @if (empty($centervote->estrato))       {{-- CODIGO  --}}
                            <td align="center">No posee</td>
                            @else
                            <td align="center">{{$centervote->estrato}}</td>
                            @endif
                            @if (empty($centervote->muestra))        {{-- CODIGO  --}}
                            <td align="center">No posee</td>
                            @else
                            <td align="center">{{$centervote->muestra}}</td>
                            @endif
                        </tr>
                    @endif
                @endforeach
            @endforeach
        @endif

    </table>
       

    
    
</body>

</html>


