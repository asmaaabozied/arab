<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewCurrencyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rate' => ['required', 'gte:0.01', 'max:2147483647'],
            'icon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:3072',
            'en_name' => 'required|min:2|max:100|unique:currencies,en_name',
            'ar_name' => 'required|min:3|max:100|unique:currencies,ar_name',

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

    public function messages()
    {
        return [
            'rate.required' => trans('dashboard::validation.required'),
            'rate.gte' => trans('dashboard::validation.gte'),
            'rate.max' => trans('dashboard::validation.max'),
            'icon.image' => trans('dashboard::validation.image'),
            'icon.mimes' => trans('dashboard::validation.mimes'),
            'icon.max' => trans('dashboard::validation.max'),
            'en_name.required' => trans('dashboard::validation.required'),
            'en_name.min' => trans('dashboard::validation.min'),
            'en_name.max' => trans('dashboard::validation.max'),
            'en_name.regex' => trans('dashboard::validation.regex'),
            'en_name.unique' => trans('dashboard::validation.unique'),

            'ar_name.required' => trans('dashboard::validation.required'),
            'ar_name.min' => trans('dashboard::validation.min'),
            'ar_name.max' => trans('dashboard::validation.max'),
            'ar_name.regex' => trans('dashboard::validation.regex'),
            'ar_name.unique' => trans('dashboard::validation.unique'),
        ];
    }
}
