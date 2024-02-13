<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'min_withdraw_limit' => ['required', 'gte:0', 'max:2147483647'],
            'fees_per_transfer_wallet_balance' => ['required', 'gte:0.0', 'max:2147483647'],
            'fees_per_withdraw_wallet_using_paypal' => ['required', 'gte:0.1', 'max:2147483647'],
            'fees_per_charge_wallet_using_paypal' => ['required', 'gte:0.1', 'max:2147483647'],
            'days_added_to_task_end_date_when_reject_task_proof' => ['required', 'gte:1', 'max:2147483647'],
            'pin_in_top_task_limit_count' => ['required', 'gte:1', 'max:2147483647'],
            'exchange_rate_api_key' => ['required', 'string'],
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
            'min_withdraw_limit.required' => trans('dashboard::validation.required'),
            'min_withdraw_limit.gte' => trans('dashboard::validation.gte'),
            'min_withdraw_limit.max' => trans('dashboard::validation.max'),

            'fees_per_transfer_wallet_balance.required' => trans('dashboard::validation.required'),
            'fees_per_transfer_wallet_balance.gte' => trans('dashboard::validation.gte'),
            'fees_per_transfer_wallet_balance.max' => trans('dashboard::validation.max'),


            'fees_per_withdraw_wallet_using_paypal.required' => trans('dashboard::validation.required'),
            'fees_per_withdraw_wallet_using_paypal.gte' => trans('dashboard::validation.gte'),
            'fees_per_withdraw_wallet_using_paypal.max' => trans('dashboard::validation.max'),


            'fees_per_charge_wallet_using_paypal.required' => trans('dashboard::validation.required'),
            'fees_per_charge_wallet_using_paypal.gte' => trans('dashboard::validation.gte'),
            'fees_per_charge_wallet_using_paypal.max' => trans('dashboard::validation.max'),


            'days_added_to_task_end_date_when_reject_task_proof.required' => trans('dashboard::validation.required'),
            'days_added_to_task_end_date_when_reject_task_proof.gte' => trans('dashboard::validation.gte'),
            'days_added_to_task_end_date_when_reject_task_proof.max' => trans('dashboard::validation.max'),

            'pin_in_top_task_limit_count.required' => trans('dashboard::validation.required'),
            'pin_in_top_task_limit_count.gte' => trans('dashboard::validation.gte'),
            'pin_in_top_task_limit_count.max' => trans('dashboard::validation.max'),

            'exchange_rate_api_key.required' => trans('dashboard::validation.required'),
            'exchange_rate_api_key.string' => trans('dashboard::validation.string'),
        ];
    }
}
