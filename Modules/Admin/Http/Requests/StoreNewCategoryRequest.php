<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3072',
            'category_en_name' => 'required|min:3|max:100|unique:categories,title',
            'category_ar_name' => 'required|min:3|max:100|unique:categories,ar_title',
            'CategoryActions' => 'required',
            'CategoryActions.*.action_en_name' => 'required|min:3|max:100|regex:/^[a-zA-Z]+$/u|unique:category_actions,name',
            'CategoryActions.*.action_ar_name' => 'required|min:3|max:100|unique:category_actions,ar_name',
            'CategoryActions.*.action_price' => ['required', 'gte:0.00001','max:2147483647'],
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
            'image.required' => trans('dashboard::validation.required'),
            'image.image' => trans('dashboard::validation.image'),
            'image.mimes' => trans('dashboard::validation.mimes'),
            'image.max' => trans('dashboard::validation.max'),

            'category_en_name.required' => trans('dashboard::validation.required'),
            'category_en_name.min' => trans('dashboard::validation.min'),
            'category_en_name.max' => trans('dashboard::validation.max'),
            'category_en_name.regex' => trans('dashboard::validation.regex'),
            'category_en_name.unique' => trans('dashboard::validation.unique'),

            'category_ar_name.required' => trans('dashboard::validation.required'),
            'category_ar_name.min' => trans('dashboard::validation.min'),
            'category_ar_name.max' => trans('dashboard::validation.max'),
            'category_ar_name.unique' => trans('dashboard::validation.unique'),


            'CategoryActions.required' => trans('dashboard::validation.required'),



            'action_en_name.required' => trans('dashboard::validation.required'),
            'action_en_name.min' => trans('dashboard::validation.min'),
            'action_en_name.max' => trans('dashboard::validation.max'),
            'action_en_name.regex' => trans('dashboard::validation.regex'),
            'action_en_name.unique' => trans('dashboard::validation.unique'),

            'action_ar_name.required' => trans('dashboard::validation.required'),
            'action_ar_name.min' => trans('dashboard::validation.min'),
            'action_ar_name.max' => trans('dashboard::validation.max'),
            'action_ar_name.unique' => trans('dashboard::validation.unique'),


            'action_price.required' => trans('dashboard::validation.required'),
            'action_price.gte' => trans('dashboard::validation.gte'),
            'action_price.max' => trans('dashboard::validation.max'),


        ];
    }
}
