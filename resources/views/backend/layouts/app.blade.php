<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/assets/images/favicon.png')}}">
    <title>Inventory Management System</title>
    <!-- This page CSS -->
    <!-- This page CSS -->
    <link href="{{ asset('admin/assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('admin/dist/css/pages/dashboard4.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@stack('css')
</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('layouts.backend.partials.topbar')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('layouts.backend.partials.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('content')
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            ?? 2019 Eliteadmin by themedesigner.in
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('admin/assets/node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('admin/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('admin/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('admin/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('admin/dist/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--Sky Icons JavaScript -->
    <script src="{{ asset('admin/assets/node_modules/skycons/skycons.js') }}"></script>
    <!--morris JavaScript -->
    <script src="{{ asset('admin/assets/node_modules/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('admin./assets/node_modules/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('admin/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('admin/dist/js/dashboard4.js') }}"></script>
    @stack('js')
</body>

</html>