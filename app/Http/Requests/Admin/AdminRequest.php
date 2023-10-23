<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
        $id = $this->route('admin')->id;
        return [
            'username' =>[ 'required', Rule::unique('admins', 'username')->ignore($id)],
            'email' => ['required', Rule::unique('admins', 'email')->ignore($id)],
            'phone' => ['nullable', Rule::unique('admins', 'phone')->ignore($id)],
            'image' => ['sometimes', 'image'],
            'password' => [
                'nullable',
                 'confirmed',
                 'min:8',
                Rule::requiredIf(function () { return !(isset($this->route('admin')->image)); })
            ]
        ];
    }
}
