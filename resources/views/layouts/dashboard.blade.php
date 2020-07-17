
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>EAS |
        Employee Assessment System</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
{{--            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--                 style="opacity: .8">--}}
            <span class="brand-text font-weight-light">EAS</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
{{--                <div class="image">--}}
{{--                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
{{--                </div>--}}
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    @if(Auth::user()->type==1)
                    <li class="nav-item ">
                        <a href="{{route('director')}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt yellow"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->type==2)
                        <li class="nav-item ">
                            <a href="{{url('manager/dashboard')}}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt purple"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('assessment.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt yellow"></i>
                                <p>
                                    Assessment Enable
                                </p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        @if(Session::has('username'))
                            <a class="nav-link" href="{{route('stulogout')}}" >
                                <i class="nav-icon fas fa-power-off text-red"></i>
                                <p>ออกจากระบบ</p>
                            </a>
                        @else
                            <a class="nav-link" href="{{route('logout')}}"
                               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-power-off text-red"></i>
                                <p>Logout</p>
                            </a>
                        @endif
                        <form id="logout-form" action="{{route('logout')}}" method="POST"
                              style="display: none;">@csrf</form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div id="app" class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            @yield('menu-page')
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">
                                @yield('menu-page')
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            @yield('head-display')
        </div>
        <!-- /.content-header -->

   @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="{{asset('js/app.js')}}"></script>
@yield('js')
</body>
</html>
