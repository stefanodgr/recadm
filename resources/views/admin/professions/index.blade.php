@extends('admin.layouts.dashboard')

@section('content')

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Profesiónes</h2>
      </div>
      <div class="col-md-6">
        <a href="/professions/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nueva Profesión</a>
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
        <h6 class="m-0 font-weight-bold text-primary">Listado de Profesiones</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Tools</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Tools</th>
            </tr>
            </tfoot>
            <tbody>
                @if (empty($professions))
                @else
                    @foreach ($professions as $profession)
                    <tr>
                    {{-- <td>{{$profesion->id}}</td> --}}
                    <td>{!!$profession->descripcion!!}</td>
                    <td>
                        <a href="/professions/{{$profession->id}}/edit" title="Editar"><i class="fa fa-edit"></i></a>
                        <a href="#" data-toggle="modal" data-target="#deleteModalProfession" data-professionid="{{$profession->id }}"><i class="fa fa-trash-alt"></i></a>
                    </td>
                    </tr>               
                    @endforeach
                @endif
               
            </tbody>
        </table>
        </div>
    </div>
</div>
@if (empty($profession->id)) 
@else
  <!-- delete Modal-->
  <div class="modal fade" id="deleteModalProfession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form method="POST" action="/professions/{{$profession->id}}">
                @method('DELETE')
                @csrf
                <input type="hidden" id="profession_id" name="profession_id" value="">
                <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Confirmar</a>
            </form>
        </div>
    </div>
    </div>
</div>            
@endif

    
@endsection
@section('js_modal_profession')
    <script>
        $('#deleteModalProfession').on('show.bs.modal', function (event) {
            // alert("llego");
        var button = $(event.relatedTarget) // Button that triggered the modal
        var profession_id = button.data('professionid') // Extract info from data-* attributes
        // console.log(profession_id)
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-footer #profession_id').val(profession_id)
        })
    </script>
@endsection