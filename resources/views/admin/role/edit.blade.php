@extends('admin.master')
@section('title')
    Edit Role
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
        form .col-md-3{
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
                Edit Role
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class=""><a href="{{ route('admin.role.index') }}"><i class="fa fa-institute"></i>Role</a></li>
                <li class="active"><i class="fa fa-institute"></i>Edit</li>
            </ol>
        </section>
        {{--Main Content--}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Role</h3>
                        </div>
                        {{--////////////DataTable Start--}}
                        <form action="{{ route('admin.role.update', $role->id) }}" method="POST">
                            <div class="box-body">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name="name" placeholder="Role Name" class="form-control" value="{{ $role->name }}">
                                </div>
                                <h3><u>Permissions</u></h3>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Dashboard Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Dashboard Access</label>
                                                <div class="material-switch pull-right">
                                                    <input id="admin-dashboard" name="permissions[]" type="checkbox" value="admin-dashboard" {{ $role->hasPermissionTo('admin-dashboard')?'checked':'' }}/>
                                                    <label for="admin-dashboard" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Settings Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Update Settings</label>
                                                <div class="material-switch pull-right">
                                                    <input id="change-settings" name="permissions[]" type="checkbox" value="change-settings" {{ $role->hasPermissionTo('change-settings')?'checked':'' }}/>
                                                    <label for="change-settings" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Role Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="role-list" name="permissions[]" type="checkbox" value="role-list" {{ $role->hasPermissionTo('role-list')?'checked':'' }}/>
                                                    <label for="role-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="role-create" name="permissions[]" type="checkbox" value="role-create" {{ $role->hasPermissionTo('role-create')?'checked':'' }}/>
                                                    <label for="role-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="role-edit" name="permissions[]" type="checkbox" value="role-edit" {{ $role->hasPermissionTo('role-edit')?'checked':'' }}/>
                                                    <label for="role-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="role-delete" name="permissions[]" type="checkbox" value="role-delete" {{ $role->hasPermissionTo('role-delete')?'checked':'' }}/>
                                                    <label for="role-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>User Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="user-list" name="permissions[]" type="checkbox" value="user-list" {{ $role->hasPermissionTo('user-list')?'checked':'' }}/>
                                                    <label for="user-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="user-create" name="permissions[]" type="checkbox" value="user-create" {{ $role->hasPermissionTo('user-create')?'checked':'' }}/>
                                                    <label for="user-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="user-edit" name="permissions[]" type="checkbox" value="user-edit" {{ $role->hasPermissionTo('user-edit')?'checked':'' }}/>
                                                    <label for="user-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="user-delete" name="permissions[]" type="checkbox" value="user-delete" {{ $role->hasPermissionTo('user-delete')?'checked':'' }}/>
                                                    <label for="user-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Employer Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="employer-list" name="permissions[]" type="checkbox" value="employer-list" {{ $role->hasPermissionTo('employer-list')?'checked':'' }}/>
                                                    <label for="employer-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="employer-create" name="permissions[]" type="checkbox" value="employer-create" {{ $role->hasPermissionTo('employer-create')?'checked':'' }}/>
                                                    <label for="employer-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="employer-edit" name="permissions[]" type="checkbox" value="employer-edit" {{ $role->hasPermissionTo('employer-edit')?'checked':'' }}/>
                                                    <label for="employer-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="employer-delete" name="permissions[]" type="checkbox" value="employer-delete" {{ $role->hasPermissionTo('employer-delete')?'checked':'' }}/>
                                                    <label for="employer-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Industry Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="industry-list" name="permissions[]" type="checkbox" value="industry-list" {{ $role->hasPermissionTo('industry-list')?'checked':'' }}/>
                                                    <label for="industry-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="industry-create" name="permissions[]" type="checkbox" value="industry-create" {{ $role->hasPermissionTo('industry-create')?'checked':'' }}/>
                                                    <label for="industry-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="industry-edit" name="permissions[]" type="checkbox" value="industry-edit" {{ $role->hasPermissionTo('industry-edit')?'checked':'' }}/>
                                                    <label for="industry-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="industry-delete" name="permissions[]" type="checkbox" value="industry-delete" {{ $role->hasPermissionTo('industry-delete')?'checked':'' }}/>
                                                    <label for="industry-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Company Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="company-list" name="permissions[]" type="checkbox" value="company-list" {{ $role->hasPermissionTo('company-list')?'checked':'' }}/>
                                                    <label for="company-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="company-create" name="permissions[]" type="checkbox" value="company-create" {{ $role->hasPermissionTo('company-create')?'checked':'' }}/>
                                                    <label for="company-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="company-edit" name="permissions[]" type="checkbox" value="company-edit" {{ $role->hasPermissionTo('company-edit')?'checked':'' }}/>
                                                    <label for="company-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="company-delete" name="permissions[]" type="checkbox" value="company-delete" {{ $role->hasPermissionTo('company-delete')?'checked':'' }}/>
                                                    <label for="company-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Testimonial Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="testimonial-list" name="permissions[]" type="checkbox" value="testimonial-list" {{ $role->hasPermissionTo('testimonial-list')?'checked':'' }}/>
                                                    <label for="testimonial-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="testimonial-create" name="permissions[]" type="checkbox" value="testimonial-create" {{ $role->hasPermissionTo('testimonial-create')?'checked':'' }}/>
                                                    <label for="testimonial-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="testimonial-edit" name="permissions[]" type="checkbox" value="testimonial-edit" {{ $role->hasPermissionTo('testimonial-edit')?'checked':'' }}/>
                                                    <label for="testimonial-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="testimonial-delete" name="permissions[]" type="checkbox" value="testimonial-delete" {{ $role->hasPermissionTo('testimonial-delete')?'checked':'' }}/>
                                                    <label for="testimonial-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Blog Control Access</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>View</label>
                                                <div class="material-switch pull-right">
                                                    <input id="blog-list" name="permissions[]" type="checkbox" value="blog-list" {{ $role->hasPermissionTo('blog-list')?'checked':'' }}/>
                                                    <label for="blog-list" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Create</label>
                                                <div class="material-switch pull-right">
                                                    <input id="blog-create" name="permissions[]" type="checkbox" value="blog-create" {{ $role->hasPermissionTo('blog-create')?'checked':'' }}/>
                                                    <label for="blog-create" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Edit</label>
                                                <div class="material-switch pull-right">
                                                    <input id="blog-edit" name="permissions[]" type="checkbox" value="blog-edit" {{ $role->hasPermissionTo('blog-edit')?'checked':'' }}/>
                                                    <label for="blog-edit" class="label-info"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Delete</label>
                                                <div class="material-switch pull-right">
                                                    <input id="blog-delete" name="permissions[]" type="checkbox" value="blog-delete" {{ $role->hasPermissionTo('blog-delete')?'checked':'' }}/>
                                                    <label for="blog-delete" class="label-info"></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">
                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
@section('script')

@endsection