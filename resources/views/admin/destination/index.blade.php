@extends('admin.master')
@section('title')
    Destinations
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View All Destinations
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="{{ route('admin.destination.index') }}"><i class="fa fa-institute"></i>Destinations</a></li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Destination</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <div class="box-body">
                            <table id="destinations_list" class="table table-bordered table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Title</th>
                                        <th>Province</th>
                                        <th>Listings</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($destinations as $destination)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $destination->district_name }}</td>
                                        <td>{{ $destination->province->province_name }}</td>
                                        <td>{{ $destination->companies()->count() }}</td>
                                        <td><img src="{{ $destination->get_image() }}" alt="{{ $destination->district_name }}" width="100px"></td>
                                        <td>
                                            <div class="">
                                                @can('destinaion-edit')
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.destination.edit', $destination->id) }}" class="btn btn-primary" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
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
                                        <th>Province</th>
                                        <th>Listings</th>
                                        <th>Image</th>
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
        $('#destinations_list').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    </script>
@endsection
