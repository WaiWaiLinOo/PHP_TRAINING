<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreStudentRequest extends FormRequest
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
            'major_id' => 'required',
            'course' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required',
            'email.required' => 'The email field is required',
            'major_id.required' => 'The major field is required',
            'course.required' => 'The course field is required',
        ];
    }
}
