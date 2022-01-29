<?php

namespace App\Http\Requests;

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
        $id = $this->id;
        dd($id);
        
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'contact_no' => 'required|max:10|min:10|unique:users,contact_no,'.$id,
            'address' => 'required',
            'adhaar_card_no' => 'required',
        ];
    }
}
