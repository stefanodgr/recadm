@extends('admin.layouts.dashboard')

@section('content')

<!-- container-fluid -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h3>Generador de Reporte  <strong>Milintate</strong> </h3>
      </div>
    </div>
  </div>
<!-- /.container-fluid -->
{{-- VALIDACIONES-RESPUESTA--}}
@include('admin.layouts.success')   {{-- SAVE --}}
@include('admin.layouts.danger')    {{-- EDITAR --}}
@include('admin.layouts.delete')    {{-- DELELTE --}}
    {{-- VALIDACIONES-RESPUESTA --}}
@if (\Session::has('message'))
    <div class="alert alert-warning" role="alert">
      <strong>{{\Session::get('message')}}</strong>
    </div>
@endif
<form name="frm_person_validate" id="frm_person_validate" action="{{route('reportes.validatePerson')}}" method="post">
  @csrf
  <div class="form-group row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-body">
          <label for="exampleInputPassword1">Nro Documento:</label>
          <div class="row">
            <div class="col-md-3">
              <select name="nacionalidad" id="nacionalidad" class="form-control">
                <option value="V" selected>V</option>
                <option value="E">E</option>
              </select>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" id="cedula" name="cedula" maxlength="8">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group text-center">
    <button type="button" class="btn btn-danger btn-buscar" data-toggle="modal" data-target="#bus_modal">Consultar</button>
  </div>
</form>


<div class="modal fade" id="bus_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar Busqueda?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">Darle confirmar verificará la existencia.</div>
        <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a  id="btn_person" class="btn btn-primary"  >Confirmar</a>
        </div>
    </div>
</div>

 
   
@endsection
@section('js_modal_cne')
    <script>
        $('#btn_person').on('click',(e)=>{
          e.preventDefault();
          $("#frm_person_validate").submit();  
        });
        $('#bus_modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        });
        $(function(){
        soloNumeros('cedula');
    });
    </script>

    
@endsection