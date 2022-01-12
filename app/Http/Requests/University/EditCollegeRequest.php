<?php

namespace App\Http\Requests\University;

use Illuminate\Foundation\Http\FormRequest;

class EditCollegeRequest extends FormRequest
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
        $id = $this->id;
        return [
            'name' => 'required|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
            'email' => 'required|email|unique:colleges,email',
            'contact_no' => 'required|max:10|min:10',
            'address' => 'required',
            // 'logo' => 'required',
        ];
    }
}
