<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewActionInCategoryRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100|regex:/^[a-zA-Z]+$/u',
            'ar_name' => 'required|min:3|max:100',
            'price' => ['required', 'gte:0.00001','max:2147483647'],
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

            'name.required' => trans('dashboard::validation.required'),
            'name.min' => trans('dashboard::validation.min'),
            'name.max' => trans('dashboard::validation.max'),
            'name.regex' => trans('dashboard::validation.regex'),

            'ar_name.required' => trans('dashboard::validation.required'),
            'ar_name.min' => trans('dashboard::validation.min'),
            'ar_name.max' => trans('dashboard::validation.max'),


            'price.required' => trans('dashboard::validation.required'),
            'price.gte' => trans('dashboard::validation.gte'),
            'price.max' => trans('dashboard::validation.max'),


        ];
    }
}
