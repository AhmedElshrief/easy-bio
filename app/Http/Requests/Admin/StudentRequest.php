<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
        $id = $this->route('student')->id ?? null;
        return [
            'name' => ['required'],
            'email' => ['nullable', 'email', Rule::unique('users', 'email')->ignore($id, 'id')],
            'phone' => ['required', Rule::unique('users', 'phone')->ignore($id, 'id')],
            'parent_phone' => ['required', Rule::unique('users', 'parent_phone')->ignore($id, 'id')],
            'username' => ['required', Rule::unique('users', 'username')->ignore($id, 'id')],
            'password' => ['nullable'],
            'status' => ['nullable'],
            'image' => ['nullable', 'image:png', 'mimes:png,jpg,jpeg,svg'],
            'level_id' => ['required', 'numeric'],
            'city_id' => ['required', 'numeric'],
        ];
    }
}
