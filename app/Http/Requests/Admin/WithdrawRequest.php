<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WithdrawRequest extends FormRequest
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
        return [
            'amount' => ['required', 'numeric'],
            'status' => ['required', Rule::in(['pending', 'approved'])],
            'image' => ['nullable', 'image:png', 'mimes:png,jpg,jpeg,svg',
                Rule::requiredIf(function () { return !(isset($this->route('withdraw_request')->image)); })
            ],
            'user_id' => ['required', 'numeric'],
        ];
    }
}
