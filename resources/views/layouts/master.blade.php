<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title')</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/summernote/summernote-bs4.min.css">
        
        {{-- fontawesome --}}
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        
        {{-- jQuery Validation Plugin CDN--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        {{-- this is for Delete Swal Function --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        
        @include('layouts.css')
        
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            {{-- <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{asset('AdminLTE')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
            </div> --}}

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <!-- Right navbar links -->
                {{-- <ul class="navbar-nav ml-auto">
                    <!-- Template Settings -->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-danger btn-xs mt-2"><i class="fas fa-sign-out-alt"></i></button>
                    </li>
                </ul> --}}

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a> --}}

                            {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
                                {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <button type="button" class="btn btn-danger btn-sm">{{ __('Logout') }} <i class="fas fa-sign-out-alt"></i></button>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form> --}}
                            {{-- </div> --}}
                        {{-- </li> --}}

                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                        
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i>
                                </a>
            
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>

                    @endguest
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('/home') }}" class="brand-link">
                    <img src="{{ asset('AdminLTE') }}/dist/img/survey-logo.png" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">ProSurvey</span>
                </a>
                <!-- Sidebar -->
                
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{asset('AdminLTE')}}/dist/img/admin-pic.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        </div>
                        </div>
                    
                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                               
                                <li class="nav-item">
                                    <a href="{{url('/home')}}" class="nav-link">
                                        <i class="fa fa-home" aria-hidden="true"></i> 
                                      <p>
                                        Dashboard
                                      </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{url('admin/survey')}}" class="nav-link">
                                        <i class="fa fa-address-book" aria-hidden="true"></i> 
                                      <p>
                                        Surveys
                                      </p>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                      <p>
                                        Site Settings
                                      </p>
                                    </a>
                                </li>

                                {{-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-chart-pie"></i>
                                        <p>
                                            Charts
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/charts/chartjs.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>ChartJS</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/charts/flot.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Flot</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/charts/inline.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Inline</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/charts/uplot.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>uPlot</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li> --}}
                                
                                {{-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>
                                            Forms
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/forms/general.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>General Elements</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/forms/advanced.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Advanced Elements</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/forms/editors.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Editors</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/forms/validation.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Validation</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-table"></i>
                                        <p>
                                        Tables
                                        <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/tables/simple.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Simple Tables</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/tables/data.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>DataTables</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/tables/jsgrid.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>jsGrid</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li> --}}
                                
                            </ul>   
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>

                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                {{-- <h1 class="">DataTables</h1> --}}
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">

                    @yield('content')
                    
                </section>
                <!-- /.content -->
            </div>
            <footer class="main-footer">
                <strong>BSIT (Self) &copy; 2018-2022 <a href="#">ProSurvey</a>.</strong>
                    University Of Sargodha
                    <div class="float-right d-none d-sm-inline-block">
                    <b>{{ Auth::user()->name }}</b>
                    </div>
                </footer>
        
                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->
        
            <!-- jQuery -->
            {{-- <script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script> --}}
            <!-- jQuery UI 1.11.4 -->
            {{-- <script src="{{asset('AdminLTE')}}/plugins/jquery-ui/jquery-ui.min.js"></script> --}}
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
            $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- ChartJS -->
            <script src="{{asset('AdminLTE')}}/plugins/chart.js/Chart.min.js"></script>
            <!-- Sparkline -->
            <script src="{{asset('AdminLTE')}}/plugins/sparklines/sparkline.js"></script>
            <!-- JQVMap -->
            <script src="{{asset('AdminLTE')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
            <script src="{{asset('AdminLTE')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
            <!-- jQuery Knob Chart -->
            <script src="{{asset('AdminLTE')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
            <!-- daterangepicker -->
            <script src="{{asset('AdminLTE')}}/plugins/moment/moment.min.js"></script>
            <script src="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Summernote -->
            <script src="{{asset('AdminLTE')}}/plugins/summernote/summernote-bs4.min.js"></script>
            <!-- overlayScrollbars -->
            <script src="{{asset('AdminLTE')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
            <!-- AdminLTE App -->
            <script src="{{asset('AdminLTE')}}/dist/js/adminlte.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="{{asset('AdminLTE')}}/dist/js/demo.js"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="{{asset('AdminLTE')}}/dist/js/pages/dashboard.js"></script>
        </div>

        @include('sweetalert::alert')
        
        @yield('javascript')
    </body>
</html>
    