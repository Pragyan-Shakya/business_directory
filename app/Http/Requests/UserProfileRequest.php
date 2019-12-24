<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required|max:10',
            'profession' => 'nullable',
            'education' => 'nullable',
            'roles' => 'required',
        ];
    }
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required!',
            'last_name.required' => 'Last Name is required!',
            'gender.required' => 'Gender is required!',
            'address.required' => 'Address is required!',
            'phone.required' => 'Phone is required!',
            'avatar.mimes' => 'Only Jpj, Png or Gif!',
            'avatar.image' => 'Image file only!',
            'password.required' => 'Password is required!',
            'phone.max' => 'Phone number cannot be more than 10 digits!'
        ];
    }
}
