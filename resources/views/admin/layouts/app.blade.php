<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | @isset($page_title) {{$page_title}} @endisset</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('backend/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend/css/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('backend/css/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/css/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/css/summernote-bs4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/select2-bootstrap4.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap-4.min.css')}}">
    <!-- jQuery -->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.layouts.nav')
        @include('admin.layouts.sidebar')
            @yield('content')
        @include('admin.layouts.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backend/js/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('backend/js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('backend/js/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('backend/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('backend/js/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('backend/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/js/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('backend/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('backend/js/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('backend/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/js/adminlte.js') }}"></script>
    <!-- Select2 -->
    <script src="{{asset('backend/js/select2.full.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('backend/js/sweetalert2.min.js') }}"></script>


<script>
    $(function () {
        // Summernote
        $('#summernote').summernote()
        // Select2
        $('.select2').select2()

        //alerts
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        var success_message = "{{ Session::get('success') }}";
        var info_message = "{{ Session::get('info') }}";
        var error_message = "{{ Session::get('error') }}";
        var warning_message = "{{ Session::get('warning') }}";
        if (success_message != "") {
            success_alert(success_message);
        }
        if (info_message != "") {
            info_alert(info_message);
        }
        if (error_message != "") {
            error_alert(error_message)
        }
        if (warning_message != "") {
            warning_alert(warning_message)
        }
        function success_alert(success_message) {
            Toast.fire({
                icon: 'success',
                title: success_message
            })
        }
        function info_alert(info_message) {
            Toast.fire({
                icon: 'info',
                title: info_message
            })
        }
        function error_alert(error_message) {
            Toast.fire({
                icon: 'error',
                title: error_message
            })
        }
        function warning_alert(warning_message) {
            Toast.fire({
                icon: 'warning',
                title: warning_message
            })
        }

        //Daterange
        $('#reservation').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        })

        $('#reservation').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + '-' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#reservation').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
  </script>
</body>

</html>
