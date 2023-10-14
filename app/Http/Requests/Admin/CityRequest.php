<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
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
        $id = $this->route('city')->id;
        return [
            'ar.*' => ['required', Rule::unique('city_translations', 'name')->ignore($id, 'city_id')],
            'en.*' =>['required', Rule::unique('city_translations', 'name')->ignore($id, 'city_id')],
        ];
    }
}
