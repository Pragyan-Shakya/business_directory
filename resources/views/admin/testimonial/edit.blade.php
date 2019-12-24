@extends('admin.master')
@section('title')
    Edit Testimonials
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Testimonial
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class=""><a href="{{ route('admin.testimonial.index') }}"><i class="fa fa-institute"></i>Testimonial</a></li>
                <li class="active"><i class="fa fa-institute"></i>Edit</li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Testimonial</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <div class="box-body">
                            <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $testimonial->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Designation</label>
                                    <input type="text" name="designation" placeholder="Designation" class="form-control" value="{{ $testimonial->designation }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Message</label>
                                    <textarea name="message" id="" cols="30" rows="5" class="form-control">{!! $testimonial->message !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="title">Avatar</label>
                                    <input type="file" name="avatar" class="form-control-file">
                                </div>
                                @if($testimonial->get_avatar() != null)
                                    <div class="form-group">
                                        <img src="{{ $testimonial->get_avatar() }}" alt="{{ $testimonial->name }}" style="width:100px">
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="title">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="Active" {{ $testimonial->status == 'Active'?'selected':'' }}>Active</option>
                                        <option value="Inactive" {{ $testimonial->status == 'Inactive'?'selected':'' }}>Inactive</option>
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