<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="/css/admin/sb-admin-2.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  {{-- CKEDITOR PLUGIN --}}
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
          <img  width="20%" src="{{ asset('/storage/images/logos/logo_icono.ico') }}" >
        <div class="sidebar-brand-text mx-3">Recad</div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Home -->
      <li class="nav-item active">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Nav Item - Seguridad Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSegurity" aria-expanded="true" aria-controls="collapseSegurity">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Seguridad</span>
        </a>
        <div id="collapseSegurity" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/role">Roles</a>
            <a class="collapse-item" href="/users">Usuario</a>
          </div>
        </div>
      </li>  
      <!-- Nav Item - Tabla Referenciales Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Tabla Referenciales</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="/professions">Profesiones</a>
            <a class="collapse-item" href="/academiclevels">Niveles Academicos</a>
            <a class="collapse-item" href="/divisions">Divisiones</a>
            <a class="collapse-item" href="/positions">Cargos</a>
            <a class="collapse-item" href="/centervotes">Centro Votacíon</a>
            <a class="collapse-item" href="/electoralcommissions">Período Electoral</a>
          </div>
        </div>
      </li>
         <!-- Nav Item - Tabla Referenciales Collapse Menu -->
         <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFrontend" aria-expanded="true" aria-controls="collapseFrontend">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Frontend</span>
          </a>
          <div id="collapseFrontend" class="collapse" aria-labelledby="headingFrontend" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="/posts">Posts</a>
            </div>
          </div>
      </li>
    </li>
    <!-- Nav Item - Tabla Referenciales Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReportes" aria-expanded="true" aria-controls="collapseReportes">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Reportes</span>
      </a>
      <div id="collapseReportes" class="collapse" aria-labelledby="headingReportes" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="/reportes"> Listado Militantes</a>
          <a class="collapse-item" href="{{route('reportes.reporteCenter')}}"> Listado Centro Votacion</a>
          <a class="collapse-item" href="{{route('reportes.reportePerson')}}"> Busqueda Militante</a>
        </div>
      </div>
     </li> 
      <!-- Nav Item - Militante -->
      <li class="nav-item">
        <a class="nav-link" href="/persons">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Militante</span></a>
      </li>
       <!-- Nav Item - Persona-ESTRUCTURA  -->
       <li class="nav-item">
        <a class="nav-link" href="/personstructure">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Militante-Estructura</span></a>
      </li>
      <!-- Nav Item - Persona-electoral  -->
      <li class="nav-item">
        <a class="nav-link" href="/personsvotes">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Militante-Electoral</span></a>
      </li>
      <!-- Nav Item - Comite-Local  -->
      <li class="nav-item">
        <a class="nav-link" href="/localcommittees">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Cómite Locales</span></a>
      </li>
       <!-- Nav Item - Persona-Comites  -->
      <li class="nav-item">
        <a class="nav-link" href="/personscommittees">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Militante-Comites</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{route ('persons.inscrip')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Inscripciones</span></a>
      </li>




      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          {{-- <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> --}}

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2  text-gray-600 small">
                    <strong>Usuario:</strong> {{Auth::user()->person['nombre_pr']}} 
                    {{Auth::user()->person['apellido_pr']}}
                   <strong>Estado:</strong> {{Auth::user()->estado['descripcion']}}
                </span>
                {{-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> --}}
                <img src="{{ asset('/storage/images/persons_foto/'.Auth::user()->person['foto_img']) }}" class="img-profile rounded-circle" >
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


        @yield('content')
          <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; RECAD 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cerrar Session</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/admin/sb-admin-2.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <!-- Custom scripts for all pages-->
  {{-- <script src="/js/admin/sb-admin-2.min.js"></script> --}}

  <!-- Page level plugins -->

  <!-- Page level custom scripts -->
  {{-- <script src="/js/admin/demo/chart-area-demo.js"></script>
  <script src="/js/admin/demo/chart-pie-demo.js"></script> --}}
  <!-- Page level plugins -->
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/js/admin/demo/datatables-demo.js"></script>
  
   {{-- BUSCADOR CNE PRUEBA     --}} 
   @yield('js_modal_cne')
   {{-- BUSCADOR CNE PRUEBA     --}} 
  @yield('javascript')
  @yield('javascript_edit')
  @yield('js_modal_persons')
  {{-- ELIMINAR-ESTADOS --}}
  @yield('js_modal_estados')
  {{-- ELIMINAR-PROFESSION --}}
  @yield('js_modal_profession')
  {{-- ELIMINAR-POST --}}
  @yield('js_modal_post')
    {{-- ELIMINAR-DiVISIONS --}}
  @yield('js_modal_divisions')
    {{-- ELIMINAR-POSITIONS --}}
  @yield('js_modal_positions')
  {{-- ELIMINAR-CENTERVOTES --}}
  @yield('js_modal_centervotes')    
  {{-- COMBO-CENTERVOTES --}}
  @yield('slct_combo_centervotes')
    {{-- ELIMINAR-ACADEMICLEVEL --}}
  @yield('js_modal_academiclevel')
  {{-- COMBO-PERSONSTRUCTURE --}}
  @yield('slct_combo_personstructure')
   {{-- COMBO-PERSONSTRUCTURE-EDIT --}}
   @yield('slct_combo_personstructure_edit')

   {{-- ELIMINAR-PERSONSTRUCTURE --}}
  @yield('js_modal_personstructure')
  {{-- COMBO-PERSONVOTES --}}
  @yield('slct_combo_personsvotes')
    {{-- ELIMINAR-PERSONVOTES --}}
  @yield('js_modal_personvotes')
  {{-- COMBO-LOCALCOMMITTEES --}}
  @yield('slct_combo_localcommittees')
  {{-- ELIMINAR-LOCALCOMMITTEE --}}
  @yield('js_modal_localcommittee')
  {{-- COMBO-PERSONCOMMITEES --}}
  @yield('slct_combo_personcommittees')
  {{-- ELIMINAR-PERSONCOMMITEES --}}
  @yield('js_modal_personcommittees')
  {{-- ELIMINAR-ELECTORALCOMMISSIONS --}}
  @yield('js_modal_electoralcommissions')

  @yield('js_modal_users')
   

  
 
  
  
  

  <script>
    function soloNumeros(idCampo){
    $('#'+idCampo).keyup(function (){
          this.value = (this.value + '').replace(/[^0-9]/g, '');
      });
     
}
  </script>

</body>

</html>

