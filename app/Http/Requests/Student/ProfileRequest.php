<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('user')->id ?? null;
        return [
            'name' =>[ 'required', Rule::unique('users', 'name')->ignore($id)],
            'email' => ['required', Rule::unique('users', 'email')->ignore($id)],
            'phone' => ['nullable', Rule::unique('users', 'phone')->ignore($id)],
            'parent_phone' => ['nullable', Rule::unique('users', 'parent_phone')->ignore($id)],
            'username' =>[ 'required', Rule::unique('users', 'username')->ignore($id)],
            'image' => ['nullable', 'image'],
            'password' => [
                'nullable',
                'confirmed',
                'min:8',
                Rule::requiredIf(function () { return !(isset($this->route('user')->id)); })
            ]
        ];
    }
}
