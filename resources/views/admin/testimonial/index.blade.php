@extends('admin.master')
@section('title')
    Testimonials
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View All Testimonials
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="{{ route('admin.testimonial.index') }}"><i class="fa fa-institute"></i>Testimonials</a></li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Testimonial</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <div class="box-body">
                            <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">Designation</label>
                                    <input type="text" name="designation" placeholder="Designation" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">Message</label>
                                    <textarea name="message" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="title">Avatar</label>
                                    <input type="file" name="avatar" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <label for="title">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                                @can('industry-create')
                                    <div class="form-group">
                                        <input type="submit" value="Add" class="btn btn-primary">
                                    </div>
                                @endcan
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Testimonials</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <div class="box-body">
                            <table id="testimonial_list" class="table table-bordered table-striped table-hover text-center">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Avatar</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ $testimonial->designation }}</td>
                                        <td><img src="{{ $testimonial->get_avatar() }}" alt="{{ $testimonial->name }}" style="width: 50px;"></td>
                                        <td>{!! $testimonial->message !!}</td>
                                        <td>
                                            <div class="">
                                                @can('testimonial-edit')
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}" class="btn btn-primary" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    </div>
                                                @endcan
                                                @can('testimonial-delete')
                                                    <div class="btn-group">
                                                        <form action="{{ route('admin.testimonial.destroy', $testimonial->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                                        </form>
                                                    </div>
                                                @endcan
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Avatar</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $('#testimonial_list').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    </script>
@endsection