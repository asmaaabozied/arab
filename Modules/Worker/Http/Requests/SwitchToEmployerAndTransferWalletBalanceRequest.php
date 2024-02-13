<?php

namespace Modules\Worker\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SwitchToEmployerAndTransferWalletBalanceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'AmountTransferred'=>'required|numeric|min:0|not_in:0',
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
            'AmountTransferred.required' => trans('dashboard::validation.required'),
            'AmountTransferred.numeric' => trans('dashboard::validation.numeric'),
            'AmountTransferred.min' => trans('dashboard::validation.min'),
            'AmountTransferred.not_in' => trans('dashboard::validation.not_in'),

        ];

    }
}
