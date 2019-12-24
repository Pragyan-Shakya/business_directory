@extends('admin.master')
@section('title')
    Employers
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View All Employers
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="{{ route('admin.employer.index') }}"><i class="fa fa-institute"></i>Employer</a></li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Employers</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <div class="box-body">
                            <table id="user_list" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employers as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->full_name() }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        @if($user->employer && $user->employer->companies)
                                            @php $companies = '' @endphp
                                            @foreach($user->employer->companies as $company)
                                                @php
                                                    $companies = $companies . ' | ' . $company->title ;
                                                @endphp
                                            @endforeach
                                            <td>{{ $companies }}</td>
                                        @else
                                            <td>---</td>
                                        @endif
                                        <td>
                                            <div class="row">
                                                @can('employer-delete')
                                                    <div class="col-md-6">
                                                        <form action="{{ route('admin.employer.destroy', $user->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            @if(!count($user->employer->companies)>0 )
                                                                <button type="submit" class="btn btn-danger" title="Delete"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                                            @else
                                                                <button type="submit" class="btn btn-danger" title="Delete Company First!!!" disabled="disabled"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                                            @endif
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
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
        $('#user_list').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    </script>
@endsection