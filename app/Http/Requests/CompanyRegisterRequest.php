<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CompanyRegisterRequest extends FormRequest
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
            'title' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'fax' => 'nullable',
            'description' => 'required',
            'website' => 'nullable|url',
            'total_employees' => 'required',
            'branches' => 'required',
            'industry_id' => 'required',
            'ownership' => 'required',
            'established_date' => 'nullable',
            'employers_id' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ];
    }
}
