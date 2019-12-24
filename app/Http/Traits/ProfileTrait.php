<?php
    namespace App\Http\Traits;

    use App\Http\Requests\UserProfileRequest;

    trait ProfileTrait {
        public function update(UserProfileRequest $request, $id)
        {
            $validated = $request->validated();
            $user = $this->model->show($id);
            $data = $request->except(['_token', '_method']);
            if($files = $request->file('avatar')) {
                if($user->avatar && is_file($user->avatar)){
                    unlink($user->avatar);
                }
                // for save original image
                $ImageUpload = Image::make($files)->resize(800, 800);
                $originalPath = 'public/assets/uploads/users/'.time().$files->getClientOriginalName();
                $ImageUpload->save($originalPath);
                $data['avatar'] = $originalPath;
            }
            if(isset($request->password) ){
                if($request->password === $request->password_confirmation){
                    $data['password'] = bcrypt($request->password);
                    unset($data['password_confirmation']);
                }else{
                    return back()->with('error', 'Password did not matched');
                }
            }else{
                unset($data['password']);
                unset($data['password_confirmation']);
            }
            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['gender'] = $request->gender;
            $data['address'] = $request->address;
            $data['phone'] = $request->phone;
            $data['profession'] = $request->profession;
            $data['education'] = trim($request->education);
            $this->model->update($data, $id);
            return back()->with('success', 'Profile Updated Successfully');
        }
    }
