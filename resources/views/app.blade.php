<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="shortcut icon" href="http://www.lottecinemavn.com/LCHS/Image/Icon/favicon.ico?v=18040901" type="image/x-icon">

       <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('./administrator/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('./administrator/css/sb-admin-2.min.css') }}" rel="stylesheet">
  </head>
  <body>
    @inertia
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('./administrator/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('./administrator/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('./administrator/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('./administrator/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('./administrator/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('./administrator/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('./administrator/js/demo/chart-pie-demo.js') }}"></script>
  </body>
</html>
