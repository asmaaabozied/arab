<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrivilegeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'countOfPrivileges' => ['required', 'gte:1','max:2147483647'],
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
            'countOfPrivileges.required' => trans('dashboard::validation.required'),
            'countOfPrivileges.gte' => trans('dashboard::validation.gte'),
            'countOfPrivileges.max' => trans('dashboard::validation.max'),
        ];
    }
}
