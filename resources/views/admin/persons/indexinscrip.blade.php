@extends('admin.layouts.dashboard')

@section('content')

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Personas Registradas Externas</h2>
      </div>
      {{-- <div class="col-md-6">
        <a href="/cne" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo Militante</a>
      </div> --}}
    </div>
  </div>
  <!-- /.container-fluid -->
  {{-- VALIDACIONES-RESPUESTA--}}
  @include('admin.layouts.success')   {{-- SAVE --}}
  @include('admin.layouts.danger')    {{-- EDITAR --}}
  @include('admin.layouts.delete')    {{-- DELELTE --}}
  {{-- VALIDACIONES-RESPUESTA --}}
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado</h6>
    </div>
    <div class="card-body">
        <div class="container">
            @if (session('flash'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('flash')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times; </span>
                </button>
            </div>   
        @endif
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr> 
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Celular</th>
                <th>Fecha.Nac</th>
                <th>Tools</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Celular</th>
                <th>Fecha.Nac</th>
                <th>Tools</th>
            </tr>
            </tfoot>
            <tbody>
                @if (empty($persons))
                @else
                    @foreach ($persons as $person)
                        <tr>
                            <td>{{$person['nacionalidad']." ".$person['cedula']}}</td>
                            <td>{{$person['nombre_pr']." ".$person['nombre_seg']}}</td>
                            <td>{{$person['apellido_pr']." ".$person['apellido_seg']}}</td>
                            <td>{{$person['telf_celular']}}</td>
                            <td>{{$person['fecha_nac']}}</td>
                            {{-- <td><img src="{{ asset('/storage/images/persons_foto/'.$person['foto_img']) }}" alt=" {{$person['foto_img']}}" width="100"></td> --}}
                            <td>
                                <a href="{{route('persons.statusinscrip',$person->id) }}" class="btn btn-primary">Aceptar</a>
                            </td>
                        </tr>     
                    @endforeach   
                @endif
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection