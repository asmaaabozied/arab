<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCurrencyRequest extends FormRequest
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
        ];
    }
}
