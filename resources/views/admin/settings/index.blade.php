@extends('admin.master')
@section('title')
    Site Settings
@endsection
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Configuration</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Settings</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <form action="{{ route('admin.setting.update', rand(0,999)) }}" method="post"
                      class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Settings</h3>
                            <button type="submit" class="btn btn-danger pull-right">Update</button>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                                    {{--<li><a href="#header" data-toggle="tab">Header</a></li>--}}
                                    {{--<li><a href="#home" data-toggle="tab">Home</a></li>--}}
                                    <li><a href="#about" data-toggle="tab">About</a></li>
                                    <li><a href="#social" data-toggle="tab">Social</a></li>
                                    {{--<li><a href="#tax" data-toggle="tab">Tax</a></li>--}}
                                    <li><a href="#footer" data-toggle="tab">Footer</a></li>
                                    {{--<li><a href="#ad" data-toggle="tab">Ads</a></li>--}}

                                    {{--<li><a href="#product-archive" data-toggle="tab">Product Archive</a></li>--}}
                                    {{--<li><a href="#product-single" data-toggle="tab">Product Single</a></li>--}}
                                    <li><a href="#seo" data-toggle="tab">SEO</a></li>
                                    <li><a href="#map" data-toggle="tab">MAP</a></li>
                                </ul>
                                <div class="tab-content">
                                    @include('admin.settings.tab-general')
                                    {{--@include('backend.settings.tab-header')--}}
                                    {{--@include('admin.settings.tab-home')--}}
                                    @include('admin.settings.tab-about')
                                    @include('admin.settings.tab-social')
                                    {{--@include('admin.settings.tab-tax')--}}
                                    @include('admin.settings.tab-footer')
                                    {{--@include('admin.settings.tab-ad')--}}

                                    {{--@include('backend.settings.tab-product-archive')--}}
                                    {{--@include('backend.settings.tab-product-single')--}}
                                    @include('admin.settings.tab-seo')
                                    @include('admin.settings.tab-map')
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger pull-right">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->

@stop

@push('scripts')
    <script>
        $(function () {
            $('.select2').select2({placeholder: 'Select Options'});

            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            });
        });
    </script>
@endpush