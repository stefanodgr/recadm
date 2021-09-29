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
        
        <strong> Generado por {{$person->user['name']}} desde {{$ldate}}</strong>
    </div>
    <table width="200" >
        <tr>
            <td width="130"><img src="{{ public_path() .'/storage/images/logos/logo.png' }}"  width="100" height="100"></td>
            <td width="380"><h4><strong>Militante:</strong>  {{$person->nombre_pr." ".$person->nombre_seg." ".$person->apellido_pr." ".$person->apellido_seg}}</h4></td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <!-- /container-fluid -->
    <table width="200" border="1">
        <tr>
        <td width="4" rowspan="16"> <img class="imagen" src="{{ public_path() .'/storage/images/persons_foto/'.$person->foto_img }}"  alt="{{ $person->foto_img }}" ></td>
        <td width="4" rowspan="16">&nbsp;</td>
        <td width="120">Cedula</td>
        <td width="150">{{$person->nacionalidad."-".$person->cedula}}</td>
        </tr>
        <tr>
        <td>Nombres</td>
        <td>{{$person->nombre_pr." ".$person->nombre_seg}} </td>
        </tr>
        <tr>
        <td>Apellidos</td>
        <td>{{$person->apellido_pr." ".$person->apellido_seg}}</td>
        </tr>
        <tr>
        <td>Fecha Nacimiento</td>
        <td>{{$person->fecha_nac}}</td>
        </tr>
        <tr>
        <td>Genero</td>
        <td>{{$person->genero}}</td>
        </tr>
        <tr>
        <td>Telefono</td>
        <td>{{$person->telf_celular}}</td>
        </tr>
        <tr>
        <td>Email</td>
        <td>{{$person->email}}</td>
        </tr>
        <tr>
            <td>Twitter</td>
            @if (empty($person->twitter))
            <td>No posee</td>
            @else
            <td>{{$person->twitter}}</td>
            @endif
        </tr>
        <tr>
        <td>Instagram</td>
            @if (empty($person->instagram))
            <td>No posee</td>
            @else
            <td>{{$person->instagram}}</td>
            @endif
        </tr>
        <tr>
        <td>Facebook</td>
            @if (empty($person->facebook))
            <td>No posee</td>
            @else
            <td>{{$person->facebook}}</td>
            @endif
        </tr>
        <tr>
        <td>Pagina Web</td>
            @if (empty($person->pagina_web))
            <td>No posee</td>
            @else
            <td>{{$person->pagina_web}}</td>
            @endif
        </tr>
        <tr>
        <td>Division</td>
        <td>
        @foreach($personstrus as $personstru)
            @if ( $person->id == $personstru->person_id)
                @foreach ($divisions as $division)
                        @if ($personstru->division_id == $division->id)
                        {{ $division->descripcion}}
                        @endif
                @endforeach
            @endif
        @endforeach
        </td>
        </tr>
        <tr>
        <td>Cargo</td>
        <td>
        @foreach($personstrus as $personstru)
            @if ( $person->id == $personstru->person_id)
                @foreach ($positions as $position)
                        @if ($personstru->position_id == $position->id)
                        {{ $position->descripcion}}
                        @endif
                @endforeach
            @endif
        @endforeach
        </td>
        </tr>
        <tr>
        <td>Direcci&oacute;n</td>
        <td>{{ $person->estado['descripcion'].','.$person->municipio['descripcion'].','.$person->parroquia['descripcion'].','.$person->avenida.','.$person->calle.','.$person->direccion }} </td>
        </tr>
        <tr>
        <td>Profesi&oacute;n</td>
        <td>{{ $person->profesion['descripcion'] }}</td>
        </tr>
        <tr>
        <td>Nivel Academico</td>
        <td>{{ $person->academiclevel['descripcion'] }}</td>
        </tr>
    </table>
</body>

</html>


