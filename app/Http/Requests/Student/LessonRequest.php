<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LessonRequest extends FormRequest
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
        $id = $this->route('lesson')->id ?? null;
        return [
            'ar.*' => ['required', Rule::unique('lesson_translations', 'title')->ignore($id, 'lesson_id')],
            'en.*' =>['required', Rule::unique('lesson_translations', 'title')->ignore($id, 'lesson_id')],
            'image' => ['nullable', 'image:png', 'mimes:png,jpg,jpeg,svg',
                Rule::requiredIf(function () { return !(isset($this->route('lesson')->image)); })
            ],
            'price' => ['required', 'numeric'],
            'hours' => ['required', 'numeric'],
            'active' => ['nullable'],
            'vimeo_embed' => ['required', 'string'],
            'lecture_id' => ['required'],
        ];
    }
}
