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
       </STYLE>
</head>

<body>
    <div class="titulo">
        
        <strong> Generado desde Recad el {{$ldate}}</strong>
    </div>
    <table width="200" >
        <tr>
            <td width="150"><img src="{{ public_path() .'/storage/images/logos/logo.png' }}"  width="130" height="100"></td>
            <td width="380"><h4>Listado de Militantes por Centros de Votación</h4></td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <table   width="700px" border="1" style="font-size: 8px">
        <tr>
            <th align="center"  style="background-color:#0dc706;">Cédula</th>
            <th align="center"  style="background-color:#0dc706;">Nombres</th>
            <th align="center"  style="background-color:#0dc706;">Apellidos</th>
            <th align="center"  style="background-color:#0dc706;">Teléfono </th>
            <th align="center"  style="background-color:#0dc706;">Email</th>
            <th align="center"  style="background-color:#0dc706;">Dirección</th>
            <th align="center"  style="background-color:#0dc706;">Estado</th>
            <th align="center"  style="background-color:#0dc706;">Municipio</th>
            <th align="center"  style="background-color:#0dc706;">Parroquia</th>
            <th align="center"  style="background-color:#0dc706;">Division</th>
            <th align="center"  style="background-color:#0dc706;">Cargo</th>
            <th align="center"  style="background-color:#0dc706;">Centro Votacion</th>
            <th align="center"  style="background-color:#0dc706;">Cargo Electoral</th>
          </tr>
        
             
        @if (!empty($personsCenterVotes)  )
            @foreach ($personsCenterVotes as $personsCenterVote)
            @foreach ($persons as $person)
            @if ( $personsCenterVote->person_id == $person->id   )
            <tr>
                
                <td>{{$person->nacionalidad.$person->cedula}}</td>  {{-- CEDULA  --}}
                <td>{{$person->nombre_pr." ".$person->nombre_seg}}</td>{{-- NOMBRES --}}
                <td>{{$person->apellido_pr." ".$person->apellido_seg}}</td>{{-- APELLIDOS  --}}
                <td>{{$person->telf_celular}}</td>{{-- TELEFONO --}}
                <td>{{$person->email}}</td>{{-- EMAIL --}}
                
                <td>{{$person->direccion}}</td>{{-- DIRECCION  --}}
                @foreach($estados as $estado)
                    @if ( $person->estado_id == $estado->id   )
                        <td>{{$estado->descripcion}}</td>{{-- ESTADO --}}
                    @endif
                @endforeach
                @foreach($municipios as $municipio)
                    @if ( $person->municipio_id == $municipio->id   )
                        <td>{{$municipio->descripcion}}</td>{{-- MUNICIPIO --}}
                    @endif
                @endforeach
                @foreach($parroquias as $parroquia)
                    @if ( $person->parroquia_id == $parroquia->id   )
                        <td>{{$parroquia->descripcion}}</td>{{-- PARROQUIA --}}
                    @endif
                @endforeach
                @foreach ($personstructures as $personstructure)
                    @if ($person->id == $personstructure->person_id)
                        @if ($personstructure->division_id == ' ' || $personstructure->division_id == null || $personstructure->position_id == ' ' || $personstructure->position_id == null)
                        <td>No posee</td>
                        <td>No posee</td>
                        @else
                        {{-- DIVISION --}}
                        <td>{{$personstructure->division['descripcion']}}</td>
                        {{-- POSITION --}}
                        <td>{{$personstructure->position['descripcion']}}</td>
                        @endif
                    @endif
                @endforeach
                @foreach ($personsvotes as $personsvote)

                    @if ($person->id == $personsvote->person_id)
                        @if ($personsvote->centervote_id == ' ' || $personsvote->centervote_id == null || $personsvote->electorallist_id == ' ' || $personsvote->electorallist_id == null)
                            <td>No posee</td>
                            <td>No posee</td>
                        @else
                            
                            <td>{{$personsvote->centervote['descripcion']}}</td>{{-- CENTERVOTE --}}
                            <td>{{$personsvote->electorallist['descripcion']}}</td>{{-- CARGO ELECTORAL --}}
                        @endif 
                    @endif
                @endforeach
                {{-- @if ($person->twitter == null)
                    <td>No posee</td>
                @else
                    <td>{{$person->twitter}}</td>
                @endif
                @if ($person->instagram == null)
                    <td>No posee</td>
                @else
                    <td>{{$person->instagram}}</td>
                @endif
                @if ($person->facebook == null)
                    <td>No posee</td>
                @else
                    <td>{{$person->facebook}}</td>
                @endif
                @if ($person->pagina_web == null)
                    <td>No posee</td>
                @else
                    <td>{{$person->pagina_web}}</td>
            @endif --}}
            @endif
            </tr>
            @endforeach
            @endforeach
        @endif

    </table>
       

    
    
</body>

</html>


