<div class="box-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1"
               placeholder="Enter email" name="email" value="{{ isset($user)?$user->email:old('email') }}" required>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name"
                   placeholder="Enter First Name" name="first_name" value="{{ isset($user)?$user->first_name:old('first_name') }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name"
                   placeholder="Enter Last Name" name="last_name" value="{{ isset($user)?$user->last_name:old('last_name') }}" required>
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
                   placeholder="Address" name="address" value="{{ isset($user)?$user->address:old('address') }}">
        </div>
        <div class="form-group col-md-6">
            <label for="phone">Phone</label>
            <input type="phone" class="form-control" id="phone"
                   placeholder="Phone" name="phone" value="{{ isset($user)?$user->phone:old('phone') }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="exampleInputFile">Avatar</label>
            <input type="file" id="exampleInputFile" class="form-control-file" name="avatar">
            @if(isset($user))
                @if($user->avatar != null)
                    <br><div class="form-group">
                        <img src="{{ $user->get_avatar() }}" alt="{{ isset($user)?$user->full_name():'' }}" style="width:100px">
                    </div>
                @endif
            @endif
        </div>

        <div class="form-group col-md-6">
            <label for="gender">Gender:</label>
            <br><input type="radio" name="gender" value="male" {{ isset($user)?$user->gender == 'male'?'checked':'':'' }}> Male
            <br><input type="radio" name="gender" value="female" {{ isset($user)?$user->gender == 'female'?'checked':'':'' }}> Female
            <br><input type="radio" name="gender" value="other" {{ isset($user)?$user->gender == 'other'?'checked':'':'' }}> Other
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="profession">Profession</label>
            <input type="text" id="profession" class="form-control" name="profession" value="{{ isset($user)?$user->profession:old('profession') }}">
        </div>
        <div class="form-group col-md-6">
            <label for="education">Education</label>
            <textarea class="form-control" name="education">
                {!! trim(isset($user)?$user->education:old('education')) !!}
            </textarea>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="profession">Roles</label>
            <select name="roles[]" class="form-control select2" id="roles" multiple="multiple" required>
                @foreach($roles as $role)
                    <option value="{{ $role }}"
                            {{ isset($user)?$user->hasRole($role)?'selected':'':'' }}>
                        {{ $role }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

</div>