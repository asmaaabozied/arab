<?php

namespace Modules\Admin\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNewDiscountCodeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|min:3|max:100|unique:discount_codes,code',
            'type' => ['required',Rule::in(['MainCosts', 'AdditionalCosts', 'TotalCosts', 'PayCosts'])],
            'max_uses' =>  ['required','integer','gte:1','max:2147483647'],
            'discount_amount' =>  ['required', 'gte:0.00001','max:2147483647'],
            'starts_at' => ['required','date'],
            'expires_at' => ['required','date','after:starts_at'],
            'description' => 'required|string|min:3|max:250',
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


            'code.required' => trans('dashboard::validation.required'),
            'code.min' => trans('dashboard::validation.min'),
            'code.max' => trans('dashboard::validation.max'),
            'code.unique' => trans('dashboard::validation.unique'),




            'type.required' => trans('dashboard::validation.required'),
            'type.in' => trans('dashboard::validation.in'),

            'max_uses.required' => trans('dashboard::validation.required'),
            'max_uses.integer' => trans('dashboard::validation.integer'),
            'max_uses.gte' => trans('dashboard::validation.gte'),
            'max_uses.max' => trans('dashboard::validation.max'),



            'discount_amount.required' => trans('dashboard::validation.required'),
            'discount_amount.gte' => trans('dashboard::validation.gte'),
            'discount_amount.max' => trans('dashboard::validation.max'),



            'starts_at.required' => trans('dashboard::validation.required'),
            'starts_at.date' => trans('dashboard::validation.date'),



            'expires_at.required' => trans('dashboard::validation.required'),
            'expires_at.date' => trans('dashboard::validation.date'),
            'expires_at.after' => trans('dashboard::validation.after'),



            'description.required' => trans('dashboard::validation.required'),
            'description.string' => trans('dashboard::validation.string'),
            'description.min' => trans('dashboard::validation.min'),
            'description.max' => trans('dashboard::validation.max'),








        ];
    }
}
