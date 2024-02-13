<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RejectTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reasonOfReject'=>'required|string|max:250|min:5'
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
            'reasonOfReject.required'=>trans('dashboard::validation.required'),
            'reasonOfReject.string'=>trans('dashboard::validation.required'),
            'reasonOfReject.min'=>trans('dashboard::validation.min'),
            'reasonOfReject.max'=>trans('dashboard::validation.max'),

        ];
    }
}
