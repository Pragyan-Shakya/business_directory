@extends('admin.master')
@section('title')
    Edit Destination
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Destination
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class=""><a href="{{ route('admin.destination.index') }}"><i class="fa fa-institute"></i>Destinations</a></li>
                <li class="active"><i class="fa fa-institute"></i>Edit</li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Destination</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <div class="box-body">
                            <form action="{{ route('admin.destination.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Province</label>
                                    <select name="province_id" id="province" class="form-control">
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->id }}" {{ $province->id == $destination->province->id?'selected':'' }}>{{ $province->province_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $destination->district_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="file" class="form-control-file">
                                    @if($destination->image !== null)
                                        <div>
                                            <img src="{{ $destination->get_image() }}" alt="{{ $destination->district_name }}" width="200px">
                                        </div>
                                    @endif
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
