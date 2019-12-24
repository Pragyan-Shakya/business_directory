@extends('admin.master');
@section('title')
    Edit Blog
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Blog
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class=""><a href="{{ route('admin.blog.index') }}"><i class="fa fa-institute"></i>Blog</a>
                </li>
                <li class="active">Edit Blog</li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Blog</h3>
                        </div>
                        {{--//////////Form Start--}}
                        <div class="box-body">
                            <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.blog.form');
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <input type="submit" class="btn btn-info btn-block" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            CKEDITOR.replace('content');
            $('#industry_id').select2();
            $('#ownership').select2();
            $('#employers_id').select2();
            $('#datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
            })
        })
    </script>
@endsection