@extends('admin.layouts.dashboard')

@section('content')

<!-- container-fluid -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="row py-lg-2">
    <div class="col-md-6">
        <h2>Militante-Comites</h2>
    </div>
    <div class="col-md-6">
        <a href="/personscommitte" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nueva Estructura Comité</a>
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
            <h6 class="m-0 font-weight-bold text-primary">Listado de Estructuras de Comites</h6>
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
                    <th>Comités</th>
                    <th>Estado</th>
                    <th>Tools</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Cédula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Celular</th>
                    <th>Comités</th>
                    <th>Estado</th>
                    <th>Tools</th>
                </tr>
                </tfoot>
                <tbody>
                    @if (empty($personcommittees))
                    @else
                        @foreach ($personcommittees as $personcommittee)
                            <tr>
                            <td>{{$personcommittee->person['nacionalidad']."-".$personcommittee->person['cedula']}}</td>
                            <td>{{$personcommittee->person['nombre_pr']." ".$personcommittee->person['nombre_seg']}}</td>
                            <td>{{$personcommittee->person['apellido_pr']." ".$personcommittee->person['apellido_seg']}}</td>
                            <td>{{$personcommittee->person['telf_celular']}}</td>
                            <td>{{$personcommittee->localcommittee['descripcion']}}</td>
                            <td>{{$personcommittee->localcommittee->estado['descripcion']}}</td>
                            <td>
                                <a href="/personscommittees/{{$personcommittee->id }}" title="Ver"><i class="fas fa-file-alt"></i></a>
                                <a href="/personscommittees/{{$personcommittee->id }}/edit" title="Editar"><i class="fa fa-edit"></i></a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal" data-personcommitteeid="{{$personcommittee->id }}"><i class="fa fa-trash-alt"></i></a>
                            </td>
                            </tr>     
                        @endforeach   
                    @endif
                </tbody>
            </table>
            </div>
        </div>
    </div>


@if (empty($personcommittee->id)) 
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
        <form method="POST" action="/personscommittees/{{ $personcommittee->id }}">
            @method('DELETE')
            @csrf
            <input type="hidden" id="personscommittee_id" name="personscommittee_id" value="">
            <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Confirmar</a>
        </form>
        </div>
    </div>
</div>
@endif
    
@endsection
@section('js_modal_personcommittees')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var personscommittee_id = button.data('personcommitteeid') // Extract info from data-* attributes
        // console.log(post_id)
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-footer #personscommittee_id').val(personscommittee_id)
        })

    </script>
@endsection