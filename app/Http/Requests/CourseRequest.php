<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
        if ($this->getMethod() == 'POST') {
            
            return [
                'name' => ['required', Rule::unique('courses')->ignore($this->id, 'id'), 'min:3', 'max:255'],
            ];
            
        } else {
            
            return [
                'name' => ['required', 'unique:courses,name', 'min:3', 'max:255'],
            ];
        }
    }
}
