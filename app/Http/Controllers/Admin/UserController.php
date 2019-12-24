<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;
use App\Model\Employer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::enableQueryLog();
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'web')->pluck('name', 'name')->all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserProfileRequest $request)
    {
        $user = new User();

        if($files = $request->file('avatar')) {
//            if($user->avatar && is_file($user->avatar)){
//                unlink($user->avatar);
//            }
            // for save original image
            $ImageUpload = Image::make($files)->resize(800, 800);
            $originalPath = 'public/assets/uploads/users/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath);
            $user->avatar = $originalPath;
        }
        if(isset($request->password) ){
            if($request->password === $request->password_confirmation){
                $user->password = bcrypt($request->password);
            }else{
                return back()->with('error', 'Password did not matched');
            }
        }
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->profession = $request->profession;
        $user->education = trim($request->education);
        $user->save();
        $user->assignRole($request->input('roles'));
        return back()->with('success', 'User Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::where('guard_name', 'web')->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.user.edit', compact('user','roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfileRequest $request, $id)
    {
        $validated = $request->validated();
        $user = User::find($id);
        if($files = $request->file('avatar')) {
            if($user->avatar && is_file($user->avatar)){
                unlink($user->avatar);
            }
            // for save original image
            $ImageUpload = Image::make($files)->resize(800, 800);
            $originalPath = 'public/assets/uploads/users/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath);
            $user->avatar = $originalPath;
        }
        if(isset($request->password) ){
            if($request->password === $request->password_confirmation){
                $user->password = bcrypt($request->password);
            }else{
                return back()->with('error', 'Password did not matched');
            }
        }
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->profession = $request->profession;
        $user->education = trim($request->education);
        $user->save();
        $user->syncRoles($request->input('roles'));
        return back()->with('success', 'User Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
