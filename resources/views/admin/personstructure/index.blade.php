@extends('admin.layouts.dashboard')

@section('content')

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Militante-Estructura</h2>
      </div>
      <div class="col-md-6">
        <a href="/personstru" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nueva Estructura</a>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
{{-- VALIDACIONES-RESPUESTA--}}
@include('admin.layouts.success')   {{-- SAVE --}}
@include('admin.layouts.danger')    {{-- EDITAR --}}
@include('admin.layouts.delete')    {{-- DELELTE --}}
{{-- VALIDACIONES-RESPUESTA --}}

<div id="div_data" style="display:block;">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de Estructuras</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Celular</th>
                    <th>División</th>
                    <th>Cargo</th>
                    <th>Tools</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Cédula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Celular</th>
                    <th>División</th>
                    <th>Cargo</th>
                    <th>Tools</th>
                </tr>
                </tfoot>
                <tbody>
                    @if (empty($personstructures))
                    @else
                        @foreach ($personstructures as $personstructure)
                            <tr>
                            <td>{{$personstructure->person['cedula']}}</td>
                            <td>{{$personstructure->person['nombre_pr']." ".$personstructure->person['nombre_seg']}}</td>
                            <td>{{$personstructure->person['apellido_pr']." ".$personstructure->person['apellido_seg']}}</td>
                            <td>{{$personstructure->person['telf_celular']}}</td>
                            <td>{{$personstructure->division['descripcion']}}</td>
                            <td>{{$personstructure->position['descripcion']}}</td>
                            <td> 
                                <a href="/personstructure/{{$personstructure->id }}" title="Ver"><i class="fas fa-file-alt"></i></a>
                                <a href="/personstructure/{{$personstructure->id }}/edit" title="Editar"><i class="fa fa-edit"></i></a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal" data-personstructureid="{{$personstructure->id }}"><i class="fa fa-trash-alt"></i></a>
                            </td>
                            </tr>     
                        @endforeach   
                    @endif
                
                </tbody>
            </table>
            </div>
        </div>
    </div>


@if (empty($personstructure->id)) 
@else
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you shure you want to delete this?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">Select "delete" If you realy want to delete this post.</div>
        <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <form method="POST" action="/personstructure/{{ $personstructure->id }}">
            @method('DELETE')
            @csrf
            <input type="hidden" id="personstructure_id" name="personstructure_id" value="">
            <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Confirmar</a>
        </form>
        </div>
    </div>
</div>
@endif
    
@endsection
@section('js_modal_personstructure')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var personstructure_id = button.data('personstructureid') // Extract info from data-* attributes
        // console.log(post_id)
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-footer #personstructure_id').val(personstructure_id)
        })

    </script>
@endsection