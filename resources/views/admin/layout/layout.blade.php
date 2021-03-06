<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Skydash Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('admin') }}/vendors/feather/feather.css">
        <link rel="stylesheet" href="{{ asset('admin') }}/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="{{ asset('admin') }}/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="{{ asset('admin') }}/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/js/select.dataTables.min.css">
        <link rel="stylesheet" href="{{ asset('admin') }}/vendors/mdi/css/materialdesignicons.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('admin') }}/css/vertical-layout-light/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('admin') }}/images/favicon.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;500;600;700&display=swap" rel="stylesheet">        
    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600&display=swap" rel="stylesheet">

        {{-- DATATABLES CSS ADD --}}
        <link rel="stylesheet" href="{{ asset('admin') }}/css/bootstrap.css">
        <link rel="stylesheet" href="{{ asset('admin') }}/css/dataTables.bootstrap4.min.css">
    </head>
    <body>
        <div class="container-scroller" style="font-family: 'Signika', sans-serif;">
            <!-- partial:partials/_navbar.html -->
            @includeIf('admin.layout.header')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                @includeIf('admin.layout.sidebar')
                <!-- partial -->
                @yield('main')
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{ asset('admin') }}/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('admin') }}/vendors/chart.js/Chart.min.js"></script>
        <script src="{{ asset('admin') }}/vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="{{ asset('admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="{{ asset('admin') }}/js/dataTables.select.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('admin') }}/js/off-canvas.js"></script>
        <script src="{{ asset('admin') }}/js/hoverable-collapse.js"></script>
        <script src="{{ asset('admin') }}/js/template.js"></script>
        <script src="{{ asset('admin') }}/js/settings.js"></script>
        <script src="{{ asset('admin') }}/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ asset('admin') }}/js/dashboard.js"></script>
        <script src="{{ asset('admin') }}/js/Chart.roundedBarCharts.js"></script>
        <script src="{{ asset('admin') }}/js/custom.js"></script>
        <!-- End custom js for this page-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>