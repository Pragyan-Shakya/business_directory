@php($user = auth()->user())
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('public/assets/admin/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/css/_all-skins.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/css/AdminLTE.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/bower_components/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <link href="{{ asset('public/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/assets/admin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Ionicons -->
    <link href="{{ asset('public/assets/admin/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <!-- Timepicker -->
    <link href="{{ asset('public/assets/admin/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('public/assets/admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <!-- Theme style -->
    <link href="{{ asset('public/assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    {{--toastr Notification--}}
    <link href="{{ asset('public/assets/admin/css/toastr.min.css') }}" rel="stylesheet">
    @yield('style')
    <style>
        .select2-container .select2-selection--single{
            height: 34px !important;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini wysihtml5-supported" style="height: auto; min-height: 100%;">
<section>
    <div class="wrapper" style="height: auto; min-height: 100%;">
        <div>
            @include('admin.partials.leftPanel')
        </div>
        <div>
            @include('admin.partials.headerBar')
        </div>
        <div>
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
        <div>
            @include('admin.partials.footer')
        </div>
    </div>
</section>


<!-- Scripts -->
<script src="{{ asset('public/assets/admin/js/app.js') }}"></script>
<script src="{{ asset('public/assets/admin/js/dashboard.js') }}"></script>
<script src="{{ asset('public/assets/admin/js/demo.js') }}"></script>
<script src="{{ asset('public/assets/admin/js/adminlte.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/js/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/js/jquery-jvectormap-world-mill-en.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset('public/assets/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/fastclick/lib/fastclick.js') }}"></script>

<script src="{{ asset('public/assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/js/toastr.min.js') }}"></script>
@include('admin.partials.notification')
@yield('script')
</body>
</html>
