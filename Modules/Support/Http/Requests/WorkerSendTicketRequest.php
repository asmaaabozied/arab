<?php

namespace Modules\Support\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Support\Entities\SupportSection;

class WorkerSendTicketRequest extends FormRequest
{
    public function sections(){
        $sections = SupportSection::withoutTrashed()->get();
        for ($i=0;$i<count($sections);$i++){
            $array_of_sections [] = $sections[$i]->id;
        }

        return [
            'array_of_sections' => $array_of_sections,
        ];
    }
    public function rules()
    {
        $sections = $this->sections();
        return [
            'section' => ['required', Rule::in($sections['array_of_sections'])],
            'subject' =>  'required|string|min:10|max:250',
            'description' =>'required|string|min:3|max:1000',
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
            'section.required' => trans('dashboard::validation.required'),
            'section.in' => trans('dashboard::validation.in'),

            'subject.required' => trans('dashboard::validation.required'),
            'subject.string' => trans('dashboard::validation.string'),
            'subject.min' => trans('dashboard::validation.min'),
            'subject.max' => trans('dashboard::validation.max'),

            'description.required' => trans('dashboard::validation.required'),
            'description.string' => trans('dashboard::validation.string'),
            'description.min' => trans('dashboard::validation.min'),
            'description.max' => trans('dashboard::validation.max'),


            'worker_attached_file.image' => trans('dashboard::validation.image'),
            'worker_attached_file.mimes' => trans('dashboard::validation.mimes'),
            'worker_attached_file.max' => trans('dashboard::validation.max'),

        ];

    }
}
