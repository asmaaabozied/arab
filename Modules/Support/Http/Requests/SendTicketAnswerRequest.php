<?php

namespace Modules\Support\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendTicketAnswerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employer_answer' =>'required|string|min:3|max:1000',
            'employer_attached_file' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:5120',
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
            'employer_answer.required' => trans('dashboard::validation.required'),
            'employer_answer.string' => trans('dashboard::validation.string'),
            'employer_answer.min' => trans('dashboard::validation.min'),
            'employer_answer.max' => trans('dashboard::validation.max'),


            'employer_attached_file.image' => trans('dashboard::validation.image'),
            'employer_attached_file.mimes' => trans('dashboard::validation.mimes'),
            'employer_attached_file.max' => trans('dashboard::validation.max'),

        ];

    }
}
