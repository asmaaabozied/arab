<?php

namespace Modules\Employer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerChargeWalletRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required|numeric|min:0|not_in:0',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function messages(): array
    {
        return [
            'amount.required' => trans('dashboard::validation.required'),
            'amount.numeric' => trans('dashboard::validation.numeric'),
            'amount.min' => trans('dashboard::validation.min'),
            'amount.not_in' => trans('dashboard::validation.not_in'),

        ];

    }
}
