<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MACRO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{!! asset('plugins/fontawesome-free/css/all.min.css')!!}">

  <link rel="stylesheet" href="{!! asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')!!}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{!! asset('plugins/toastr/toastr.min.css')!!}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!! asset('dist/css/adminlte.min.css')!!}">
  <!--DataTabes CSS-->
  <link rel="stylesheet" href="{!! asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')!!}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{!! asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')!!}">
  <!--select2-->
  <link rel="stylesheet" href="{!! asset('plugins/select2/css/select2.min.css')!!}">
  <link rel="stylesheet" href="{!! asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')!!}">
  
  @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
@if (!Auth::guest())
    <div class="wrapper">
        <header class="main-header">
             <!-- Main Header -->
            <nav class="navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                  </li>
                </ul>
                        
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                  <!-- Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-user"></i>
                            <span class="hidden-xs">{{ Auth::user()->usuario }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                          <a href="{{ url('/salir') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer">Cerrar Sesión</a>
                            <form id="logout-form" action="{{ url('/salir') }}" method="POST" style="display: none;">
                              @csrf
                          </form>

                        </div>
                    </li>
                </ul>
            </nav>
        </header>

         <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper p-3">
          @yield('content_header')
          @yield('content')
          @yield('errors')
         </div>

        <footer class="main-footer">
            
        </footer>
    </div>
@else
<nav class="navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
            
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li><a href="{{ url('/home') }}">Home</a></li>
               <!-- Authentication Links -->
               <li><a href="{{ url('/login') }}">Login</a></li>
               <li><a href="{{ url('/register') }}">Register</a></li>
            </div>
        </li>
    </ul>
</nav>

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
              @yield('content')
            </div>
        </div>
    </div>
</div>
@endif

<!-- jQuery -->
<script src="{!! asset('plugins/jquery/jquery.min.js')!!}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{!! asset('plugins/jquery-ui/jquery-ui.min.js')!!}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{!! asset('plugins/bootstrap/js/bootstrap.bundle.min.js')!!}"></script>

<!-- AdminLTE App -->
<script src="{!! asset('dist/js/adminlte.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('dist/js/demo.js')!!}"></script>
<!-- DataTables -->
<script src="{!! asset('plugins/datatables/jquery.dataTables.js')!!}"></script>
<script src="{!! asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')!!}"></script>
<!-- Files -->
<script src="{!! asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')!!}"></script>
<!-- Toast -->
<script src="{!! asset('plugins/toastr/toastr.min.js')!!}"></script>
<script src="{!! asset('plugins/moment/moment.min.js')!!}"></script>
<script src="{!! asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')!!}"></script>
<script src="{!! asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')!!}"></script>
<!-- SweetAlert2 -->
<script src="{!! asset('plugins/sweetalert2/sweetalert2.min.js')!!}"></script>
<!-- Select2 -->
<script src="{!! asset('plugins/select2/js/select2.min.js')!!}"></script> 


@yield('scripts')
</body>
</html>