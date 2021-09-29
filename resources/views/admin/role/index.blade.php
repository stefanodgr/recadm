@extends('admin.layouts.dashboard')

@section('content')


<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row py-lg-2">
    <div class="col-md-6">
        <h2>Roles</h2>
    </div>
    <div class="col-md-6">
        <a href="/role/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo Rol</a>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
{{-- VALIDACIONES-RESPUESTA--}}
@include('admin.layouts.success')   {{-- SAVE --}}
@include('admin.layouts.danger')    {{-- EDITAR --}}
@include('admin.layouts.delete')    {{-- DELELTE --}}
{{-- VALIDACIONES-RESPUESTA --}}
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Listado de Roles</h6>
  </div>
  <div class="card-body">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
    @endif
      <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>name</th>
            <th>slug</th>
            <th>description</th>
            <th>full-acess</th>
            <th>Tools</th>
          </tr>
          </thead>
          <tfoot>
          <tr>
            <th>Id</th>
            <th>name</th>
            <th>slug</th>
            <th>description</th>
            <th>full-acess</th>
            <th>Tools</th>
          </tr>
          </tfoot>
          <tbody>
            
          @foreach ($roles as $role)
          <tr>
            <td>{{ $role->id}}</td>
            <td>{{ $role->name}}</td>
            <td>{{ $role->slug}}</td>
            <td>{{ $role->description}}</td>
            <td>{{ $role['full-access']}}</td>      
            <td>                      
              <a class="fa fa-file-alt"  title="Ver" href="{{ route('role.show',$role->id)}}"></a> 
              <a class="fa fa-edit" title="Editar" href="{{ route('role.edit',$role->id)}}"></a>   
              
              <a href="#" data-toggle="modal" data-target="#deleteModal" data-roleid="{{$role->id }}"><i class="fa fa-trash-alt"></i></a>
            </td>  
          </tr>
          @endforeach          
        </tbody>
      </table>
      </div>
  </div>
</div>
@if (empty($role->id)) 
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
        <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar.</div>
        <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <form method="POST" action="/role/{{ $role->id }}">
            @method('DELETE')
            @csrf
            <input type="hidden" id="role_id" name="role_id" value="">
            <a class="btn btn-primary"  onclick="$(this).closest('form').submit();">Confirmar</a>
        </form>
        </div>
    </div>
</div>
@endif

    
@endsection
@section('js_modal_roles')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var role_id = button.data('roleid') // Extract info from data-* attributes
        // console.log(post_id)
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-footer #role_id').val(role_id)
        });
        $(document).ready(function() {
            $('#example').DataTable( {
                "order": [[ 5, "desc" ]]
            } );
        } );
   
    </script>
@endsection
