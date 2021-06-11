<?php
/*
 * Projeto: whatsapp
 * Arquivo: backend.blade.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 31/05/2021 9:17:48 am
 * Last Modified: Wed Jun 09 2021
 * Modified By: Leonardo Nascimento - <leonardo.nascimento21@gmail.com> / MAC OS
 * ---------------------------------------------------------------------
 * Copyright (c) 2021 Leo
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') - CGN</title>
  <meta name="robots" content="noindex, nofollow">
  <meta name="web-author" content="Leonardo Nascimento">
  <meta name="reply-to" content="leonardo.nascimento21@gmail.com">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/summernote/summernote-bs4.min.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<link rel="icon" id="favicon" href="https://cdn.cgn.inf.br/cgn-cdn/fotos-cgn/2020/02/06134213/cropped-favicon-cgn3-192x192.png" sizes="192x192" />


  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://maps.google.com/maps/api/js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<style type="text/css">
    	#mymap {
      		border:1px solid red;
      		width: 100%;
      		height: 100vh;
    	}
  	</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div id="app">
    <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('backend.home')}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('backend.noticia.create')}}" class="nav-link" style="color:red !important;">Compartilhar Notícia</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('backend.grupo.create')}}" class="nav-link">Adicionar Grupo</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('backend.usuario.create')}}" class="nav-link">Adicionar Usuário</a>
        </li>
            <div class="mt-2">
            <status-whats revalidate-url="{{date('dmYHi')}}"></status-whats>
            </div>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <img src="https://cdn.cgn.inf.br/cgn-cdn/fotos-cgn/2019/10/17093914/logo-nav.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">WhatsApp</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
            @if(Auth::user()->email == 'leonardo.nascimento21@gmail.com')
                <p class="text-white">Status: {{date('dmYHi')}}</p>
            @endif
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Procurar ocorrência" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('backend.home')}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Início
                    {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('backend.noticia.index')}}" class="nav-link">
                <i class="nav-icon fab fa-whatsapp"></i>
                <p>
                    Lista de Notícias WP
                    {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('backend.grupo.index')}}" class="nav-link">
                <i class="nav-icon fas fa-city"></i>
                <p>
                Grupo WP
                    {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
                </a>
            </li>
            @if(Auth::user()->email == "leonardo.nascimento21@gmail.com")
                <li class="nav-item">
                    <a href="{{route('backend.whats.qrcode')}}" class="nav-link">
                    <i class="fas fa-sign-in-alt"></i>
                    <p>
                    Login no WP
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('backend.whats.close')}}?CGN=LEO-{{date('dmYHi')}}" class="nav-link">
                    <i class="fas fa-times-circle"></i>
                    <p>
                    Encerrar sesssão WP
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                <i class="fas fa-times"></i>
                <p>
                    Sair
                    {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                </a>
            </li>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@yield('subtitle')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>2021 - {{date('Y')}} LEO.</strong>
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> {{env('VERSION')}}
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
</div>
 <!-- ./App -->

<!-- jQuery -->
<script src="{{asset('assets')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('assets')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('assets')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('assets')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('assets')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('assets')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('assets')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('assets')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets')}}/dist/js/pages/dashboard.js"></script>
<script src="{{asset('dev.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>


 <script>
toastr.options = {
    "preventDuplicates": true,
    "closeButton" : true,
  	"progressBar" : true
}

  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
        break;
    }
  @endif

  @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

</script>


</body>
</html>
