<?php

namespace Modules\Dashboard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'auth_type' => ['required',Rule::in(['employer','worker'])],
            'email' => 'required',
            'password' => 'required',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'auth_type.required' => trans('dashboard::validation.required'),
            'auth_type.in' => trans('dashboard::validation.in'),
            'email.required' => trans('dashboard::validation.required'),
            'password.required' => trans('dashboard::validation.required'),
        ];
    }
}
