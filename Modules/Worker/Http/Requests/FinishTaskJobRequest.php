<?php

namespace Modules\Worker\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinishTaskJobRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'answer_text'=>'required|string|min:10|max:250',
            'screenshot'=>'required|image|mimes:jpeg,jpg,png|max:10240',
//            'description'=>'nullable|string|min:10|max:250',

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
            'answer_text.required' => trans('dashboard::validation.required'),
            'answer_text.string' => trans('dashboard::validation.string'),
            'answer_text.min' => trans('dashboard::validation.min'),
            'answer_text.max' => trans('dashboard::validation.max'),

            'screenshot.required' => trans('dashboard::validation.required'),
            'screenshot.image' => trans('dashboard::validation.image'),
            'screenshot.mimes' => trans('dashboard::validation.mimes'),
            'screenshot.max' => trans('dashboard::validation.max'),

//            'description.string' => trans('dashboard::validation.string'),
//            'description.min' => trans('dashboard::validation.min'),
//            'description.max' => trans('dashboard::validation.max'),


        ];

    }
}
