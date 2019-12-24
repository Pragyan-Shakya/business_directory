@extends('admin.master')
@section('title')
    Industries
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View All Industries
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="{{ route('admin.industry.index') }}"><i class="fa fa-institute"></i>Industry</a></li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-5">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Industry</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <div class="box-body">
                            <form action="{{ route('admin.industry.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control">
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
                <div class="col-md-7">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Industry</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <div class="box-body">
                            <table id="industry_list" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($industries as $industry)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $industry->title }}</td>
                                        <td>{{ $industry->status }}</td>
                                        <td>
                                            <div class="row">
                                                @can('industry-edit')
                                                    <div class="col-md-6">
                                                        <a href="{{ route('admin.industry.edit', $industry->id) }}" class="btn btn-primary" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    </div>
                                                @endcan
                                                @can('industry-delete')
                                                    <div class="col-md-6">
                                                        <form action="{{ route('admin.industry.destroy', $industry->id) }}" method="POST">
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
                                    <th>Title</th>
                                    <th>Status</th>
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
        $('#industry_list').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    </script>
@endsection