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
        <a href="/personscommittees" class="btn btn-danger btn-lg float-md-right" role="button" aria-pressed="true">Cancelar</a>
    </div>
    </div>
</div>
    <!-- /.container-fluid -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Busque el militante al cual se le sera cargada la <strong>Estructura del Comite</strong> .</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Tools</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Tools</th>
            </tr>
            </tfoot>
            <tbody>
                @if (empty($persons))
                @else
                @foreach ($persons as $person)
                <tr>
                <td>{{$person->cedula}}</td>
                <td>{{$person->nombre_pr." ".$person->nombre_seg}}</td>
                <td>{{$person->apellido_pr." ".$person->apellido_seg}}</td>
                <td >
                <a href="/personscommittees/{{$person->id }}/create" type="button" class="btn btn-primary btn-sm">Cargar Comite</a>
                    {{-- <a  type="button" href="/persons/{{$person->id }}/edit" title="Editar"></a> --}}
                </td>
                </tr>     
                @endforeach   
                @endif
                  
               
            </tbody>
        </table>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form method="POST" action="/persons/{{ $person->id }}">
            @method('DELETE')
            @csrf
            <input type="hidden" id="person_id" name="person_id" value="">
            <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Confirmar</a>
        </form>
        </div>
    </div>
</div> --}}

    
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
        })
    </script>
@endsection