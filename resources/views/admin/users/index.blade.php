@extends('admin.layouts.dashboard')

@section('content')

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Usuarios Registrados</h2>
      </div>
        @if (Auth::user()->role_id  == '1' || Auth::user()->role_id  == '2' )
          <div class="col-md-6">
            <a href="{{route('users.indexpersons') }}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Registro de Usuarios</a>
          </div>
        @endif
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
        <h6 class="m-0 font-weight-bold text-primary">Listado de Usuarios Registrados</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Estado</th>
                <th>Municipio</th>
                @if (Auth::user()->role_id  == '1' || Auth::user()->role_id  == '2'  )
                    <th>Rol</th>
                @endif
                @if (Auth::user()->role_id  == '1')
                    <th>Tools</th>
                @endif
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Estado</th>
                <th>Municipio</th>
                @if (Auth::user()->role_id  == '1' || Auth::user()->role_id  == '2'  )
                    <th>Rol</th>
                @endif
                @if (Auth::user()->role_id  == '1')
                    <th>Tools</th>
                @endif
            </tr>
            </tfoot>
            <tbody>
                @if (empty($users))
                @else
                    @foreach ($users as $key => $user)
                    <tr>
                    <td>{{$user->id}}</td>
                    <td>{!!$user->name!!}</td>
                    <td>{!!$user->email!!}</td>
                    <td>{{ $user->person->nacionalidad.$user->person->cedula}}</td>
                    <td>{{ $user->person->nombre_pr. " " .$user->person->nombre_seg}}</td>
                    <td>{{ $user->person->apellido_pr. " " .$user->person->apellido_seg}}</td>
                    <td>{{ $user->estado['descripcion']}}</td>
                    <td>{{ $user->municipio['descripcion']}}</td>
                    <td>{{ $user->roles['description']}}</td>
                    <td>
                        @if (Auth::user()->role_id  == '1')
                            <a href="{{route('users.edit',$user->id) }}" title="Editar"><i class="fa fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-userid="{{$user->id }}"><i class="fa fa-trash-alt"></i></a>
                        @else
                            <a href="{{route('users.edit',$user->id) }}" title="Editar"><i class="fa fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-bs-target="#exampleModal" ><i class="fa fa-trash-alt"></i></a>
                        @endif
                    </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        </div>
    </div>
</div>
@if (empty($user->id))
@else
    <!-- delete Modal-->
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
                    <form method="POST" action="/users/{{ $user->id }}">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" id="user_id" name="user_id" value="">
                        <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Confirmar</a>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('js_modal_users')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var user_id = button.data('userid') // Extract info from data-* attributes
        // console.log(user_id)
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-footer #user_id').val(user_id)
        })
    </script>
@endsection
