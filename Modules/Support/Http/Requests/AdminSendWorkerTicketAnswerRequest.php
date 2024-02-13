<?php

namespace Modules\Support\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSendWorkerTicketAnswerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'admin_answer' =>'required|string|min:3|max:1000',
            'admin_attached_file' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:5120',
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
            'admin_answer.required' => trans('dashboard::validation.required'),
            'admin_answer.string' => trans('dashboard::validation.string'),
            'admin_answer.min' => trans('dashboard::validation.min'),
            'admin_answer.max' => trans('dashboard::validation.max'),


            'admin_attached_file.image' => trans('dashboard::validation.image'),
            'admin_attached_file.mimes' => trans('dashboard::validation.mimes'),
            'admin_attached_file.max' => trans('dashboard::validation.max'),

        ];

    }

}
