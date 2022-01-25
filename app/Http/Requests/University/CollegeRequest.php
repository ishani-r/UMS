<?php

namespace App\Http\Requests\University;

use Illuminate\Foundation\Http\FormRequest;

class CollegeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:colleges,email',
            'contact_no' => 'required|max:10|min:10|unique:colleges',
            'address' => 'required',
            'password' => 'required|min:3|max:30',
            'confirm_password' => 'required|min:3|max:30|same:password',
            'logo' => 'required'
        ];
    }
}
