<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LevelRequest extends FormRequest
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
        $id = $this->route('level')->id ?? null;
        return [
            'ar.*' => ['required', Rule::unique('level_translations', 'name')->ignore($id, 'level_id')],
            'en.*' =>['required', Rule::unique('level_translations', 'name')->ignore($id, 'level_id')],
        ];
    }
}
