<?php

namespace Modules\Employer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Region\Entities\City;
use Modules\Region\Entities\Country;

class UpdateMyProfileRequest extends FormRequest
{
    public function countries()
    {
        $countries = Country::withoutTrashed()->get();
        for ($i = 0; $i < count($countries); $i++) {
            $array_of_countries [] = $countries[$i]->id;
        }
        return [
            'array_of_countries' => $array_of_countries,
        ];
    }

    public function cities()
    {
        $cities = City::withoutTrashed()->get();
        for ($i = 0; $i < count($cities); $i++) {
            $array_of_cities [] = $cities[$i]->id;
        }
        return [
            'array_of_cities' => $array_of_cities,
        ];
    }

    public function rules()
    {
        $cities = $this->cities();
        $countries = $this->countries();

        return [
//            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:3072',
            'name' => 'required|min:3|string|max:250',
            'email' => 'required|email',
            'address' => 'required|min:3|string|max:250',
            'zip_code' => 'required|min:3|string|max:250',
            'description' => 'required|min:3|string|max:250',
            'gender' => ['required', Rule::in(['male', 'female'])],

            'country' => ['nullable', 'integer', Rule::in($countries['array_of_countries'])],
            'city' => ['nullable', 'integer', Rule::in($cities['array_of_cities'])],
            'phone' => 'nullable|numeric|unique:employers,phone',


            'new_password' => 'nullable|min:8|max:256',
            'password_confirmation' => 'nullable|min:8|max:256|same:new_password',
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



            'name.required' => trans('dashboard::validation.required'),
            'name.min' => trans('dashboard::validation.min'),
            'name.string' => trans('dashboard::validation.string'),
            'name.max' => trans('dashboard::validation.max'),


            'new_password.min' => trans('dashboard::validation.min'),
            'new_password.confirmed' => trans('dashboard::validation.confirmed'),
            'new_password.max' => trans('dashboard::validation.max'),

            'password_confirmation.min' => trans('dashboard::validation.min'),
            'password_confirmation.max' => trans('dashboard::validation.confirmed'),
            'password_confirmation.same' => trans('dashboard::validation.max'),

            'gender.required' => trans('dashboard::validation.required'),
            'gender.in' => trans('dashboard::validation.in'),

            'address.min' => trans('dashboard::validation.min'),
            'address.string' => trans('dashboard::validation.string'),
            'address.max' => trans('dashboard::validation.max'),


            'country.integer' => trans('dashboard::validation.integer'),
            'country.in' => trans('dashboard::validation.in'),
            'city.integer' => trans('dashboard::validation.integer'),
            'city.in' => trans('dashboard::validation.in'),

            'phone.numeric' => trans('dashboard::validation.numeric'),
            'phone.unique' => trans('dashboard::validation.unique'),




            'zip_code.min' => trans('dashboard::validation.min'),
            'zip_code.string' => trans('dashboard::validation.string'),
            'zip_code.max' => trans('dashboard::validation.max'),

            'description.min' => trans('dashboard::validation.min'),
            'description.string' => trans('dashboard::validation.string'),
            'description.max' => trans('dashboard::validation.max'),

        ];

    }
}
