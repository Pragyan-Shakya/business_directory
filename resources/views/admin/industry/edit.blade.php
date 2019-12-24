@extends('admin.master')
@section('title')
    Edit Industry
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Industry
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class=""><a href="{{ route('admin.industry.index') }}"><i class="fa fa-institute"></i>Industry</a></li>
                <li class="active"><i class="fa fa-institute"></i>Edit</li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Industry</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <div class="box-body">
                            <form action="{{ route('admin.industry.update', $industry->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $industry->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="Active" {{ $industry->status == 'Active'?'selected':'' }}>Active</option>
                                        <option value="Inactive" {{ $industry->status == 'Inactive'?'selected':'' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-primary">
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

@endsection