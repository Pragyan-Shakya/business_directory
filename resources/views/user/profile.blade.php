@extends('user.master')
@section('title')
    Profile
@endsection
@section('content')
    <div>
        <!-- Content Header (Page header) -->

        <section class="content">
            <div class="box-content">
                <div class="profile-editor clearfix">
                    <div class="profile-editor-side">
                        <div class="profile-editor-preview">
                            <img src="{{ $user->get_avatar() }}" alt="{{ $user->full_name() }}" style="width:260px">
                        </div>
                    </div>
                    <div class="profile-editor-main">
                        <form role="form" action="{{ route('user.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @php
                                $roles = $user->getRoleNames();
                            @endphp
                            <input type="hidden" name="roles[]" value="{{ $roles }}">
                            <div class="form-group form-xs-group nomargin">
                                <label>User Detail</label>
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
                                        <textarea class="form-control" name="education" rows="3" col="10">
                                            {!! trim($user->education) !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="btn  btn-danger btn-local-danger">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection