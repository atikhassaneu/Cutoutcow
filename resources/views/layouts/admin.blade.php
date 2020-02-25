<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('css/core-style.css')}}" rel="stylesheet">
    @stack('css')


</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href=""></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('admin.change-password.index')}}">Change Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout').submit()" href="#">Logout</a>
                <form id="logout" action="{{route('logout')}}" method="post">@csrf</form>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item {{Request::is('admin/dashboard*')? 'active' : ''}} ">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item {{Request::is('admin/order*')? 'active' : ''}} ">
            <a class="nav-link" href="{{route('admin.order')}}">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>Order</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('admin/picture-rate*')? 'active' : ''}} ">
            <a class="nav-link" href="{{route('admin.picture-rate.index')}}">
                <i class="fas fa-fw fa-user-alt"></i>
                <span>Picture Rate</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('admin/make-admin*')? 'active' : ''}} ">
            <a class="nav-link" href="{{route('admin.make-admin.index')}}">
                <i class="fas fa-fw fa-user-alt"></i>
                <span>Admin List</span>
            </a>
        </li>
    </ul>

    <div id="content-wrapper">


        @yield('content')


        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © 2019 Editesy Inc</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('js/core.min.js')}}"></script>

@stack('js')

</body>

</html>
