<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddoneRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'icon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:3072',
            'fees' => ['required', 'gte:0.1','max:2147483647'],
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
            'icon.image' => trans('dashboard::validation.image'),
            'icon.mimes' => trans('dashboard::validation.mimes'),
            'icon.max' => trans('dashboard::validation.max'),

            'fees.required' => trans('dashboard::validation.required'),
            'fees.gte' => trans('dashboard::validation.gte'),
            'fees.max' => trans('dashboard::validation.max'),
        ];
    }
}
