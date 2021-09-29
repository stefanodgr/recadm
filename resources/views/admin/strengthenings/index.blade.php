@extends('admin.layouts.dashboard')

@section('content')

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>FORTALECIMIENTO</h2>
      </div>
      <div class="col-md-6">
        <a href="/strengthenings/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Registrar</a>
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
        <h6 class="m-0 font-weight-bold text-primary">Actividades Registradas - FORTALECIMIENTO -</h6>
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
                @if (empty($strengthenings))
                @else
                    @foreach ($strengthenings as $strengthening)
                        <tr>
                            <td>{{$strengthening->cedula}}</td>
                            <td>{{$strengthening['nombre_pr']." ".$strengthening['nombre_seg']}}</td>
                            <td>{{$strengthening['apellido_pr']." ".$strengthening['apellido_seg']}}</td>
                            <td>{{$strengthening['telf_celular']}}</td>
                            <td>{{$strengthening['fecha_nac']}}</td>
                            <td><img src="{{ asset('/storage/images/strengthenings_foto/'.$strengthening['foto_img']) }}" alt=" {{$strengthening['foto_img']}}" width="100"></td>
                            <td>
                                <a href="/strengthenings/{{$strengthening->id }}" title="Ver"><i class="fas fa-file-alt"></i></a>
                                <a href="/strengthenings/{{$strengthening->id }}/edit" title="Editar"><i class="fa fa-edit"></i></a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal" data-strengtheningid="{{$strengthening->id }}"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>     
                    @endforeach   
                @endif
            </tbody>
        </table>
        </div>
    </div>
</div>
@if (empty($strengthening->id)) 
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
        <form method="POST" action="/strengthenings/{{ $strengthening->id }}">
            @method('DELETE')
            @csrf
            <input type="hidden" id="strengthening_id" name="strengthening_id" value="">
            <a class="btn btn-primary"  onclick="$(this).closest('form').submit();">Confirmar</a>
        </form>
        </div>
    </div>
</div>
@endif

    
@endsection
@section('js_modal_strengthenings')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var strengthening_id = button.data('strengtheningid') // Extract info from data-* attributes
        // console.log(post_id)
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-footer #strengthening_id').val(strengthening_id)
        });
        $(document).ready(function() {
            $('#example').DataTable( {
                "order": [[ 5, "desc" ]]
            } );
        } );
   
    </script>
@endsection