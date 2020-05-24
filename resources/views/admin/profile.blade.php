@extends('admin.master')
@section('title')
    Profile
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">User Profile</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="{{ $user->get_avatar() }}" alt="{{ $user->full_name() }}">

                            <h3 class="profile-username text-center">{{ $user->full_name() }}</h3>

                            <p class="text-muted text-center">{{ $user->profession }}</p>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">About Me</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                            <p class="text-muted">
                                {{ $user->education }}
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                            <p class="text-muted">{{ $user->address }}</p>

                            <hr>

                            <strong><i class="fa fa-phone margin-r-5"></i> Contact no.</strong>

                            <p class="text-muted">{{ $user->phone }}</p>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Profile</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('admin.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @php
                                $roles = $user->getRoleNames();
                            @endphp
                            <input type="hidden" name="roles[]" value="{{ $roles }}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                           placeholder="Enter email" name="email" value="{{ $user->email }}" disabled required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name"
                                               placeholder="Enter First Name" name="first_name" value="{{ $user->first_name }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name"
                                               placeholder="Enter Last Name" name="last_name" value="{{ $user->last_name }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                               placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                                               placeholder="Confirm Password" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address"
                                               placeholder="Address" name="address" value="{{ $user->address }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="phone" class="form-control" id="phone"
                                               placeholder="Phone" name="phone" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputFile">Avatar</label>
                                        <input type="file" id="exampleInputFile" class="form-control-file" name="avatar">
                                        @if($user->avatar != null)
                                            <br><div class="form-group">
                                                <img src="{{ $user->get_avatar() }}" alt="{{ $user->full_name() }}" style="width:100px">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="gender">Gender:</label>
                                        <br><input type="radio" name="gender" value="male" {{ $user->gender == 'male'?'checked':'' }}> Male
                                        <br><input type="radio" name="gender" value="female" {{ $user->gender == 'female'?'checked':'' }}> Female
                                        <br><input type="radio" name="gender" value="other" {{ $user->gender == 'other'?'checked':'' }}> Other
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="profession">Profession</label>
                                        <input type="text" id="profession" class="form-control" name="profession" value="{{ $user->profession }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="education">Education</label>
                                        <textarea class="form-control" name="education">
                                            {!! trim($user->education) !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
@endsection
