<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Region\Entities\Country;

class UpdateCityRequest extends FormRequest
{
    public function countries(){
        $countries = Country::withoutTrashed()->get();
        for ($i=0;$i<count($countries);$i++){
            $array_of_countries [] = $countries[$i]->id;
        }

        return [
            'array_of_countries' => $array_of_countries,
        ];
    }
    public function rules()
    {
        $countries = $this->countries();
        return [
            'country_id' => ['required', Rule::in($countries['array_of_countries'])],
            'name' => ['required','min:3','max:100','regex:/^[a-zA-Z]+$/u',Rule::unique('cities')->ignore($this->city)],
            'ar_name' => 'required|min:3|max:100|unique:cities,ar_name,'.$this->city,
            'min_city_cost' => ['required', 'gte:0.00001','max:2147483647'],
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

            'country_id.required' => trans('dashboard::validation.required'),
            'country_id.in' => trans('dashboard::validation.in'),



            'name.required' => trans('dashboard::validation.required'),
            'name.min' => trans('dashboard::validation.min'),
            'name.max' => trans('dashboard::validation.max'),
            'name.regex' => trans('dashboard::validation.regex'),
            'name.unique' => trans('dashboard::validation.unique'),

            'ar_name.required' => trans('dashboard::validation.required'),
            'ar_name.min' => trans('dashboard::validation.min'),
            'ar_name.max' => trans('dashboard::validation.max'),
            'ar_name.unique' => trans('dashboard::validation.unique'),

            'min_city_cost.required' => trans('dashboard::validation.required'),
            'min_city_cost.gte' => trans('dashboard::validation.gte'),
            'min_city_cost.max' => trans('dashboard::validation.max'),


        ];
    }
}
