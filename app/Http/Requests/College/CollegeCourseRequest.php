<?php

namespace App\Http\Requests\College;

use Illuminate\Foundation\Http\FormRequest;

class CollegeCourseRequest extends FormRequest
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
            'course_id' => 'required|not-in:0',
            'seat_no' => 'required',
            'reserved_seat' => 'required',
            'merit_seat' => 'required',
        ];
    }
}
