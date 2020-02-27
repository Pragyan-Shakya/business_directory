<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class JobRequest extends FormRequest
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
            'industry_id' => 'required',
            'job_level' => 'required',
            'job_type' => 'required',
            'location' => 'required',
            'vacancy' => 'required',
            'deadline' => 'required',
            'description' => 'required',
            'specification' => 'required',
            'salary_type' => 'required',
            'experience' => 'required',
            'education' => 'required',
        ];
    }
}
