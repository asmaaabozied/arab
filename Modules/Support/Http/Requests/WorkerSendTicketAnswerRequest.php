<?php

namespace Modules\Support\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerSendTicketAnswerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'worker_answer' =>'required|string|min:3|max:1000',
            'worker_attached_file' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:5120',
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
            'worker_answer.required' => trans('dashboard::validation.required'),
            'worker_answer.string' => trans('dashboard::validation.string'),
            'worker_answer.min' => trans('dashboard::validation.min'),
            'worker_answer.max' => trans('dashboard::validation.max'),


            'worker_attached_file.image' => trans('dashboard::validation.image'),
            'worker_attached_file.mimes' => trans('dashboard::validation.mimes'),
            'worker_attached_file.max' => trans('dashboard::validation.max'),

        ];

    }
}
