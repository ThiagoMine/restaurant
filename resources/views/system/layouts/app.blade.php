<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Felipe Peretta - Sistema de Vendas @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/system/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/system/sb-admin-2.css')}}" rel="stylesheet">

</head>

<body id="page-top" class="sidebar-toggled">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
		@include("system.layouts.partials.side-menu")
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
		@yield('content')
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

	@yield('modals')

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/system/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/system/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/system/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/system/sb-admin-2.js')}}"></script>
	@yield('scripts')

</body>

</html>