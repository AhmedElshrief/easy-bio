<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LectureRequest extends FormRequest
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
        $id = $this->route('lecture')->id ?? null;
        return [
            'ar.*' => ['required', Rule::unique('lecture_translations', 'title')->ignore($id, 'lecture_id')],
            'en.*' =>['required', Rule::unique('lecture_translations', 'title')->ignore($id, 'lecture_id')],
            'image' => ['nullable', 'image:png', 'mimes:png,jpg,jpeg,svg',
                Rule::requiredIf(function () { return !(isset($this->route('lecture')->image)); })
            ],
            'active' => ['nullable'],
            'course_id' => ['required', 'numeric'],
        ];
    }
}
