<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Role\Entities\Role;

class UpdateAdminRequest extends FormRequest
{
    public function roles()
    {
        $roles = Role::withoutTrashed()->get();
        for ($i = 0; $i < count($roles); $i++) {
            $array_of_roles [] = $roles[$i]->id;
        }

        return [
            'array_of_roles' => $array_of_roles,
        ];
    }

    public function rules()
    {
        $roles = $this->roles();

        return [

            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:3072',
            'name' => 'required|min:3|string',
            'email' => ['required', Rule::unique('admins')->ignore($this->id)],
            'status' => ['required', Rule::in(['accepted', 'rejected', 'pending'])],
            'role_id' => ['required', Rule::in($roles['array_of_roles'])],
            'password' => 'nullable|confirmed|min:8|max:256',
            'password_confirmation'=>'nullable|min:8|max:256|same:password',

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

    public function messages()
    {
        return [
            'avatar.image' => trans('dashboard::validation.image'),
            'avatar.mimes' => trans('dashboard::validation.mimes'),
            'avatar.max' => trans('dashboard::validation.max'),


            'name.required' => trans('dashboard::validation.required'),
            'name.min' => trans('dashboard::validation.min'),
            'name.string' => trans('dashboard::validation.string'),


            'email.required' => trans('dashboard::validation.required'),
            'email.unique' => trans('dashboard::validation.unique'),

            'status.required' => trans('dashboard::validation.required'),
            'status.in' => trans('dashboard::validation.in'),


            'password.min' => trans('dashboard::validation.min'),
            'password.confirmed' => trans('dashboard::validation.confirmed'),
            'password.max' => trans('dashboard::validation.max'),

            'password_confirmation.min' => trans('dashboard::validation.min'),
            'password_confirmation.max' => trans('dashboard::validation.confirmed'),
            'password_confirmation.same' => trans('dashboard::validation.max'),

            'role_id.required' => trans('dashboard::validation.required'),
            'role_id.in' => trans('dashboard::validation.in'),

        ];

    }
}
