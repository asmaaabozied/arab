<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{

    public function rules()
    {
        return [
            'captcha' => 'required|captcha',
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
            'email.required' => trans('dashboard::validation.required'),
            'password.required' => trans('dashboard::validation.required'),
            'captcha.required' => trans('dashboard::validation.required'),
            'captcha.captcha' => trans('dashboard::validation.captcha'),
        ];
    }
}
