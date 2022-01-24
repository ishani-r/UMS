<?php

namespace App\Http\Requests\College;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'email' => 'required',
            'contact_no' => 'required',
            'address' => 'required',
            'password' => 'required|min:3|max:30',
            'confirm_password' => 'required|min:3|max:30|same:password',
            'logo' => 'required'
        ];
    }
}
