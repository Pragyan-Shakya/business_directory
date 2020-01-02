@extends('admin.master')
@section('title')
    Roles
@endsection
@section('style')
    <style>
        .material-switch > input[type="checkbox"] {
            display: none;
        }

        .material-switch > label {
            cursor: pointer;
            height: 0px;
            position: relative;
            width: 40px;
        }

        .material-switch > label::before {
            background: rgb(0, 0, 0);
            box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            content: '';
            height: 16px;
            margin-top: -8px;
            position:absolute;
            opacity: 0.3;
            transition: all 0.4s ease-in-out;
            width: 40px;
        }
        .material-switch > label::after {
            background: rgb(255, 255, 255);
            border-radius: 16px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
            content: '';
            height: 24px;
            left: -4px;
            margin-top: -8px;
            position: absolute;
            top: -4px;
            transition: all 0.3s ease-in-out;
            width: 24px;
        }
        .material-switch > input[type="checkbox"]:checked + label::before {
            background: inherit;
            opacity: 0.5;
        }
        .material-switch > input[type="checkbox"]:checked + label::after {
            background: inherit;
            left: 20px;
        }
        form .col-md-6{
            box-shadow: 2px 2px 1px 1px rgba(0, 0, 0, 0.2) !important;
        }
        .box-body{
            padding: 20px !important;
        }
    </style>
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View All Roles
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="{{ route('admin.role.index') }}"><i class="fa fa-institute"></i>Users</a></li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-5">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Role</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <form action="{{ route('admin.role.store') }}" method="POST">
                            <div class="box-body">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name="name" placeholder="Role Name" class="form-control">
                                </div>
                                <h3><u>Permissions</u></h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Access Dashboard</label>
                                                <div class="material-switch pull-right">
                                                    <input id="admin-dashboard" name="permissions[]" type="checkbox" value="admin-dashboard"/>
                                                    <label for="admin-dashboard" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Update Settings</label>
                                                <div class="material-switch pull-right">
                                                    <input id="change-settings" name="permissions[]" type="checkbox" value="change-settings"/>
                                                    <label for="change-settings" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Manage Moderators</label>
                                                <div class="material-switch pull-right">
                                                    <input id="role-moderate" name="permissions[]" type="checkbox" value="role-moderate"/>
                                                    <label for="role-moderate" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Role Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="role-list" name="permissions[]" type="checkbox" value="role-list"/>
                                                    <label for="role-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="role-create" name="permissions[]" type="checkbox" value="role-create"/>
                                                    <label for="role-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="role-edit" name="permissions[]" type="checkbox" value="role-edit"/>
                                                    <label for="role-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="role-delete" name="permissions[]" type="checkbox" value="role-delete"/>
                                                    <label for="role-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>User Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="user-list" name="permissions[]" type="checkbox" value="user-list"/>
                                                    <label for="user-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="user-create" name="permissions[]" type="checkbox" value="user-create"/>
                                                    <label for="user-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="user-edit" name="permissions[]" type="checkbox" value="user-edit"/>
                                                    <label for="user-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="user-delete" name="permissions[]" type="checkbox" value="user-delete"/>
                                                    <label for="user-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Employer Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="employer-list" name="permissions[]" type="checkbox" value="employer-list"/>
                                                    <label for="employer-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="employer-create" name="permissions[]" type="checkbox" value="employer-create"/>
                                                    <label for="employer-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="employer-edit" name="permissions[]" type="checkbox" value="employer-edit"/>
                                                    <label for="employer-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="employer-delete" name="permissions[]" type="checkbox" value="employer-delete"/>
                                                    <label for="employer-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Industry Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="industry-list" name="permissions[]" type="checkbox" value="industry-list"/>
                                                    <label for="industry-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="industry-create" name="permissions[]" type="checkbox" value="industry-create"/>
                                                    <label for="industry-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="industry-edit" name="permissions[]" type="checkbox" value="industry-edit"/>
                                                    <label for="industry-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="industry-delete" name="permissions[]" type="checkbox" value="industry-delete"/>
                                                    <label for="industry-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Company Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="company-list" name="permissions[]" type="checkbox" value="company-list"/>
                                                    <label for="company-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="company-create" name="permissions[]" type="checkbox" value="company-create"/>
                                                    <label for="company-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="company-edit" name="permissions[]" type="checkbox" value="company-edit"/>
                                                    <label for="company-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="company-delete" name="permissions[]" type="checkbox" value="company-delete"/>
                                                    <label for="company-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Testimonial Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="testimonial-list" name="permissions[]" type="checkbox" value="testimonial-list"/>
                                                    <label for="testimonial-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="testimonial-create" name="permissions[]" type="checkbox" value="testimonial-create"/>
                                                    <label for="testimonial-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="testimonial-edit" name="permissions[]" type="checkbox" value="testimonial-edit"/>
                                                    <label for="testimonial-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="testimonial-delete" name="permissions[]" type="checkbox" value="testimonial-delete"/>
                                                    <label for="testimonial-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Blog Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="blog-list" name="permissions[]" type="checkbox" value="blog-list"/>
                                                    <label for="blog-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="blog-create" name="permissions[]" type="checkbox" value="blog-create"/>
                                                    <label for="blog-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="blog-edit" name="permissions[]" type="checkbox" value="blog-edit"/>
                                                    <label for="blog-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="blog-delete" name="permissions[]" type="checkbox" value="blog-delete"/>
                                                    <label for="blog-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            @can('role-create')
                                <div class="box-footer">
                                    <div class="form-group">
                                        <input type="submit" value="Add" class="btn btn-primary">
                                    </div>
                                </div>
                            @endcan
                        </form>

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Roles</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <div class="box-body">
                            <table id="role_list" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th style="width: 10%">S.N</th>
                                    <th>Name</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div class="">
                                                @can('role-edit')
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-primary" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    </div>
                                                @endcan
                                                @can('role-delete')
                                                    <div class="btn-group">
                                                        <form action="{{ route('admin.role.destroy', $role->id) }}" method="POST">
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
        $('#role_list').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    </script>
@endsection