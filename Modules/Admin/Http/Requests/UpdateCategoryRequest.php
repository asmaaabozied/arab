<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:3072',
            'category_en_name' => 'required|min:3|max:100|unique:categories,title, '.$this->id,
            'category_ar_name' => 'required|min:3|max:100|unique:categories,ar_title, '.$this->id,
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

        ];
    }
}
