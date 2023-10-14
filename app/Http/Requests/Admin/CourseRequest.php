<?php

namespace App\Http\Requests\Admin;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('course')->id ?? null;
        return [
            'ar.*' => ['required', Rule::unique('course_translations', 'title')->ignore($id, 'course_id')],
            'en.*' =>['required', Rule::unique('course_translations', 'title')->ignore($id, 'course_id')],
            'image' => ['nullable', 'image:png', 'mimes:png,jpg,jpeg,svg',
                Rule::requiredIf(function () { return !(isset($this->route('course')->image)); })
            ],
            'active' => ['nullable'],
            'level_id' => ['required', 'numeric'],
        ];
    }
}
