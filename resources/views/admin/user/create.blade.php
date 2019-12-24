@extends('admin.master')
@section('title')
    Add User
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add New User
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class=""><a href="{{ route('admin.user.index') }}"><i class="fa fa-institute"></i>User</a></li>
                <li class="active">Add User</li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add User</h3>
                        </div>
                        {{--////////////Form Start--}}
                        <div class="box-body">
                            <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('admin.user.form');
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
            $('#roles').select2();
        })
    </script>
@endsection