@php $user = auth()->user(); @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900%7COpen+Sans" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/assets/user/assets/libraries/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/user/assets/libraries/ionicons-2.0.1/css/ionicons.min.css') }}" />
    <!-- Start BOOTSTRAP -->
    <link rel="stylesheet" href="{{ asset('public/assets/user/assets/libraries/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/user/assets/css/bootstrap-select.min.cs') }}s" />
    <!-- End Bootstrap -->
    <!-- Start footable-jquery -->
    <link rel="stylesheet" href="{{ asset('public/assets/user/assets/libraries/footable-jquery/css/footable.bootstrap.min.css') }}" />
    <!-- End footable-jquery -->
    <!-- Start Template files -->
    <link rel="stylesheet" href="{{ asset('public/assets/user/assets/css/admin-local.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/user/assets/css/admin-local-media.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/user/assets/file-uploader/fine-uploader.min.css') }}" />
    <script src="{{ asset('public/assets/user/assets/file-uploader/fine-uploader.min.js') }}"></script>

    <!-- End Template files -->
    <link href="{{ asset('public/assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <!-- Theme style -->
    <link href="{{ asset('public/assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .nav-side .label{
            color: #fff;
            background: #222;
        }
        .nav-side .label:hover{
            background: #222;
            cursor: context-menu;
        }

    </style>
    @yield('style')
    <!-- End custom styles -->
    <script src="{{ asset('public/assets/user/assets/js/modernizr.custom.js') }}"></script>
</head>

<body>
<div class="page-wrapper">
    <!-- START sidebar -->
    @include('user.partials.sidebar')
    <!-- END sidebar -->
    <!-- START mainbody -->
    <div class="mainbar">
        <div class="bar-head top-bar clearfix">
            <div class="profile-card pull-right">
                <a href="{{ route('user.profile.index') }}" class="profile-card-image"> <img src="{{ $user->get_avatar() }}" alt="{{ $user->full_name() }}"> </a>
                <div class="profile-body"> {{ $user->full_name() }} </div>
            </div>
            <!-- <a href="admin_3.php" class="btn btn-transparent pull-right">Add Listing</a>  -->
        </div>
        <!-- /.top-bar -->
        <div class="mainbar-body">
            @yield('content')
        </div>
    </div>
    <!-- END mainbody -->

</div>

<!-- Start Jquery -->
<script src="{{ asset('public/assets/user/assets/js/jquery-2.2.1.min.js') }}"></script>
<script src="{{ asset('public/assets/user/assets/libraries/jquery.mobile/jquery.mobile.custom.min.js') }}"></script>
<!-- End Jquery -->
<!-- Start BOOTSTRAP -->
<script src="{{ asset('public/assets/user/assets/libraries/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/user/assets/js/bootstrap-select.min.js') }}"></script>
<!-- End Bootstrap -->
<!-- Start Template files -->
<script src="{{ asset('public/assets/user/assets/js/admin-local.js') }}"></script>
<!-- End Template files -->
<!-- Start custom styles -->
<script src="{{ asset('public/assets/user/assets/js/jquery.helpers.js') }}" type="text/javascript"></script>
<!-- End custom styles -->
<script src="{{ asset('public/assets/user/assets/js/moment-with-locales.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/user/assets/js/moment-timezone-with-data.js') }}" type="text/javascript"></script>
<!-- Start footable-jquery -->
<script src="{{ asset('public/assets/user/assets/libraries/footable-jquery/js/footable.js') }}"></script>
<script src="{{ asset('public/assets/user/assets/js/footable_custom.js') }}"></script>
<script src="{{ asset('public/assets/user/assets/js/sweetalert.min.js') }}"></script>

<script src="{{ asset('public/assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('public/assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

@include('user.partials.notification')

<!-- End footable-jquery -->
@yield('script')
</body>
</html>