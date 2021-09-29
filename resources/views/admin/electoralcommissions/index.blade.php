@extends('admin.layouts.dashboard')

@section('content')

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Periodo Electoral</h2>
      </div>
      <div class="col-md-6">
        <a href="/electoralcommissions/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo Período</a>
      </div>
    </div>
  
  </div>
  <!-- /.container-fluid -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Períodos</h6>
    </div>
    {{-- VALIDACIONES-RESPUESTA--}}
    @include('admin.layouts.success')   {{-- SAVE --}}
    @include('admin.layouts.danger')    {{-- EDITAR --}}
    @include('admin.layouts.delete')    {{-- DELELTE --}}
    {{-- VALIDACIONES-RESPUESTA --}}
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Tools</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Tools</th>
            </tr>
            </tfoot>
            <tbody>
                @if (empty($electoralcommissions))
                @else
                @foreach ($electoralcommissions as $electoralcommission)
                <tr>
                <td>{{$electoralcommission->id}}</td>
                <td>{!!$electoralcommission->descripcion!!}</td>
                <td>{{$electoralcommission->fecha}}</td>
                <td>
                    <a href="/electoralcommissions/{{$electoralcommission->id }}/edit" title="Editar"><i class="fa fa-edit"></i></a>
                    <a href="#" data-toggle="modal" data-target="#deleteModal" data-electoralcommissionid="{{ $electoralcommission->id }}"><i class="fa fa-trash-alt"></i></a>
                </td>
                </tr>               
                @endforeach
                @endif
                
    </div>
            </tbody>
        </table>
        </div>
    </div>
</div>
@if (empty($electoralcommission->id)) 
@else
 <!-- delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Estás segura de que quieres eliminar esto?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar este Período.</div>
        <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <form method="POST" action="/electoralcommissions/{{ $electoralcommission->id }}">
            @method('DELETE')
            @csrf
            <input type="hidden" id="electoralcommission_id" name="electoralcommission_id" value="">
            <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Confirmar</a>
        </form>
        </div>
    </div>
</div>
@endif
@endsection
@section('js_modal_electoralcommissions')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var electoralcommission_id = button.data('electoralcommissionid') // Extract info from data-* attributes
        // console.log(estado_id)
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-footer #electoralcommission_id').val(electoralcommission_id)
        })
        
    </script>
@endsection