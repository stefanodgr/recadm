<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


  <!-- Bootstrap core CSS -->
  {{-- <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
  <link src="{{asset('css/bootstrap/css/bootstrap.min.css')}}?{{substr(time(),-5)}}">
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
 {{-- <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
 
  
  <!-- Custom fonts for this template -->
  {{-- <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
  {{-- <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'> --}}
  {{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'> --}}

  <!-- Custom styles for this template -->
  {{-- <link rel="stylesheet" href="/css/app.css"> --}}
 <style>
.inicio {
       width: 1300px; height: 800px;
       background-position: absolute;
}

.sinpadding [class*="col-"] {
    padding: 0;
}
.divPerson {
    padding: 2%;
    background-color: #170bc7;
}

 </style>
</head>

<body>
    @if (!\Request::is('login'))
  {{-- @if (!\Request::is('login') && !\Request::is('register')) --}}
    @include('partial.navbar')
  @endif

  @yield('content')
  <!-- Footer -->
  <div class="card">
  <footer>
    <div class="container card card-body">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <span>Copyright &copy; RECAD 2020</span>
        </div>
      </div>
    </div>
  </footer>
</div>


<!-- Bootstrap core JavaScript -->
{{-- <script src="/vendor/jquery/jquery.min.js?{{substr}}"></script> --}}
<script src="{{asset('js/jquery/jquery.min.js')}}?{{substr(time(),-5)}}"></script>
{{-- <script src="{{asset('js/jquery/jquery.slim.min.js')}}?{{substr(time(),-5)}}"></script> --}}
{{-- <script src="{{asset('js/jquery/jquery.min.js')}}?{{substr(time(),-5)}}"></script> --}}
{{-- <script src="/vendor/jquery/jquery.slim.min.js"></script> --}}
{{-- <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<script src="{{asset('js/bootstrap/js/bootstrap.min.js')}}?{{substr(time(),-5)}}"></script>
<script src="{{asset('js/bootstrap/js/bootstrap.bundle.min.js')}}?{{substr(time(),-5)}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js?{{substr(time(),-5)}}"></script>


<!-- development version, includes helpful console warnings -->

@yield('javascript')
@yield('js_modal_delete')
@yield('javascript_inscripcion')

  <!-- Custom scripts for this template -->
  {{-- <script src="/js/clean-blog.min.js"></script> --}}
@include('sweet::alert')
<script>
  function soloNumeros(idCampo){
  $('#'+idCampo).keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
   
}
</script>
</body>

</html>
