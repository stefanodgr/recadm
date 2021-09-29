@extends('admin.layouts.dashboard')

@section('content')

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Militantes</h2>
      </div>
      <div class="col-md-6">
        <a href="/cne" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo Militante</a>
      </div>
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
        <h6 class="m-0 font-weight-bold text-primary">Listado de Militantes</h6>
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
        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
            <thead>
            <tr> 
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Celular</th>
                <th>Fecha.Nac</th>
                <th>Foto</th>
                <th>Tools</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th> Celular</th>
                <th>Fecha.Nac</th>
                <th>Foto</th>
                <th>Tools</th>
            </tr>
            </tfoot>
            <tbody>
                @if (empty($persons))
                @else
                    @foreach ($persons as $person)
                        <tr>
                            <td>{{$person->cedula}}</td>
                            <td>{{$person['nombre_pr']." ".$person['nombre_seg']}}</td>
                            <td>{{$person['apellido_pr']." ".$person['apellido_seg']}}</td>
                            <td>{{$person['telf_celular']}}</td>
                            <td>{{$person['fecha_nac']}}</td>
                            <td><img src="{{ asset('/storage/images/persons_foto/'.$person['foto_img']) }}" alt=" {{$person['foto_img']}}" width="100"></td>
                            <td>
                                <a href="{{route('persons.show',$person->id) }}" title="Ver"><i class="fas fa-file-alt"></i></a>
                                <a href="{{route('persons.edit',$person->id) }}" title="Editar"><i class="fa fa-edit"></i></a>
                                <a href='{{route('persons.showpdf',$person->id) }}' title="Reporte"><i class="far fa-file-pdf"></i></i></a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal" data-personid="{{$person->id }}"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>     
                    @endforeach   
                @endif
            </tbody>
        </table>
        </div>
    </div>
</div>
@if (empty($person->id)) 
@else
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Estás segura de que quieres eliminar esto?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar este Militante.</div>
        <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <form method="POST" action="{{route('persons.delete',$person->id) }}">
            @method('DELETE')
            @csrf
            <input type="hidden" id="person_id" name="person_id" value="">
            <a class="btn btn-primary"  onclick="$(this).closest('form').submit();">Confirmar</a>
        </form>
        </div>
    </div>
</div>
@endif

    
@endsection
@section('js_modal_persons')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var person_id = button.data('personid') // Extract info from data-* attributes
        // console.log(post_id)
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-footer #person_id').val(person_id)
        });
        $(document).ready(function() {
            $('#example').DataTable( {
                "order": [[ 5, "desc" ]]
            } );
        } );
   
    </script>
@endsection