<?php

namespace App\Http\Requests\University;

use Illuminate\Foundation\Http\FormRequest;

class commonRequest extends FormRequest
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
            // "sub"    => "required|min:0|max:100",
            "marks.*"  => "required|min:0",
        ];
    }
}
