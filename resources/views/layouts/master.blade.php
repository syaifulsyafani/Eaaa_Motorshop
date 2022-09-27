<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $setting->nama_perusahaan }} | @yield('title')</title>

  <!-- Logo -->
  <link rel="icon" href="{{ url($setting->path_logo) }}" type="image/png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3/dist/css/adminlte.min.css') }}">

  <!-- Chart -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3/plugins/chart.js/Chart.min.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  @stack('css')
  
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    @includeIf('layouts.header')

    @includeIf('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">

            <div class="col-sm-6">
              <h1 class="m-0">@yield('title')</h1>
            </div> <!-- /.col -->

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                @section('breadcrumb')
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                @show
              </ol>
            </div> <!-- /.col -->

          </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
      </div> <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        @yield('content')
      </div> <!-- /.main-content -->

    </div> <!-- /.content-wrapper -->
  
    <!-- Content Footer (Page Footer) -->
    @includeIf('layouts.footer')
  
  </div> <!-- /.wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{ asset('AdminLTE-3/plugins/jquery/jquery.min.js') }}"></script>

  <!-- Datatables -->
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

  <!-- Bootstrap -->
  <script src="{{ asset('AdminLTE-3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- AdminLTE -->
  <script src="{{ asset('AdminLTE-3/dist/js/adminlte.js') }}"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="{{ asset('AdminLTE-3/plugins/chart.js/Chart.min.js') }}"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('AdminLTE-3/dist/js/demo.js') }}"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('AdminLTE-3/dist/js/pages/dashboard3.js') }}"></script>

  <!-- DataTables  & Plugins -->
  <script src="{{ asset('AdminLTE-3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('AdminLTE-3/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-3/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  

  <script>
    function preview(selector, temporaryFile, width = 200) {
      $(selector).empty();
      $(selector).append(`<img src="${window.URL.createObjectURL(temporaryFile)}" width="${width}">`);
    }
  </script>
  @stack('scripts')

</body>
</html>