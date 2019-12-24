@extends('admin.master')
@section('title')
    Users
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View All Users
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="{{ route('admin.user.index') }}"><i class="fa fa-institute"></i>Users</a></li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Users</h3>
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
                                    <th>Role</th>
                                    <th>Make Employer</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @if($user->hasRole('Super Admin'))
                                        @continue
                                    @endif
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->full_name() }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                    <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @can('employer-create')
                                                @if(!$user->isEmployer())
                                                    <form action="{{ route('admin.employer.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$user->id}}">
                                                        <button class="btn btn-success btn-md" type="submit" title="Make Employer"><i class="fa fa-user-plus"></i></button>
                                                    </form>
                                                @else
                                                    <button class="btn btn-success btn-md" title="Already a Employer" disabled="true"><i class="fa fa-user-plus"></i></button>
                                                @endif
                                            @endcan
                                        </td>
                                        <td>
                                            <div class="row">
                                                @can('user-edit')
                                                    <div class="col-md-6">
                                                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    </div>
                                                @endcan
                                                @can('user-delete')
                                                    <div class="col-md-6">
                                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Make Employer</th>
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