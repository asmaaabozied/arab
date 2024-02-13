<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewCountryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'flag' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:3072',

            'country_en_name' => 'required|min:3|max:100|regex:/^[a-zA-Z]+$/u|unique:countries,name',
            'country_ar_name' => 'required|min:3|max:100|unique:countries,ar_name',

            'capital_en_name' => 'required|min:3|max:100|regex:/^[a-zA-Z]+$/u|unique:cities,name',
            'capital_ar_name' => 'required|min:3|max:100|unique:cities,ar_name',

            'calling_code' => 'required|starts_with:00|min:3|unique:countries,calling_code',

            'min_price' => ['required', 'gte:0.00001','max:2147483647'],
            'is_arabic' => 'nullable',
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
            'flag.image' => trans('dashboard::validation.image'),
            'flag.mimes' => trans('dashboard::validation.mimes'),
            'flag.max' => trans('dashboard::validation.max'),

            'country_en_name.required' => trans('dashboard::validation.required'),
            'country_en_name.min' => trans('dashboard::validation.min'),
            'country_en_name.max' => trans('dashboard::validation.max'),
            'country_en_name.regex' => trans('dashboard::validation.regex'),
            'country_en_name.unique' => trans('dashboard::validation.unique'),

            'country_ar_name.required' => trans('dashboard::validation.required'),
            'country_ar_name.min' => trans('dashboard::validation.min'),
            'country_ar_name.max' => trans('dashboard::validation.max'),
            'country_ar_name.unique' => trans('dashboard::validation.unique'),

            'capital_en_name.required' => trans('dashboard::validation.required'),
            'capital_en_name.min' => trans('dashboard::validation.min'),
            'capital_en_name.max' => trans('dashboard::validation.max'),
            'capital_en_name.regex' => trans('dashboard::validation.regex'),
            'capital_en_name.unique' => trans('dashboard::validation.unique'),

            'capital_ar_name.required' => trans('dashboard::validation.required'),
            'capital_ar_name.min' => trans('dashboard::validation.min'),
            'capital_ar_name.max' => trans('dashboard::validation.max'),
            'capital_ar_name.unique' => trans('dashboard::validation.unique'),

            'calling_code.required' => trans('dashboard::validation.required'),
            'calling_code.starts_with' => trans('dashboard::validation.starts_with'),
            'calling_code.min' => trans('dashboard::validation.min'),
            'calling_code.unique' => trans('dashboard::validation.unique'),

            'min_price.required' => trans('dashboard::validation.required'),
            'min_price.gte' => trans('dashboard::validation.gte'),
            'min_price.max' => trans('dashboard::validation.max'),

            'is_arabic.nullable' => trans('dashboard::validation.nullable'),

        ];
    }
}
