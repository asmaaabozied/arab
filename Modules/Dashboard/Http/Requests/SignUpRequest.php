<?php

namespace Modules\Dashboard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Region\Entities\City;
use Modules\Region\Entities\Country;

class SignUpRequest extends FormRequest
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

        // Get the selected registration_type from the request
        $registrationType = $this->input('registration_type');
        if ($registrationType == "employer" or $registrationType == "worker") {
            // Define common rules that apply to both registration types
            $commonRules = [
                'registration_type' => ['required', Rule::in(['employer', 'worker'])],
                'name' => 'required|string|min:3|max:255',
                'country' => ['required', 'integer', Rule::in($countries['array_of_countries'])],
                'city' => ['required', Rule::in($cities['array_of_cities'])],
                'password' => [
                    'required',
                    'min:8',
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
//                'regex:/[@$!%*#?&]/', // must contain a special character
                    'confirmed',
                ],
            ];

            // Define rules specific to each registration type
            $typeSpecificRules = [
                'employer' => [
                    'email' => [
                        'required',
                        'email',
                        Rule::unique('employers', 'email'),
                    ],
                    'phone' => [
                        'required',
                        'numeric',
                        Rule::unique('employers', 'phone'),
                    ],
                ],
                'worker' => [
                    'email' => [
                        'required',
                        'email',
                        Rule::unique('workers', 'email'),
                    ],
                    'phone' => [
                        'required',
                        'numeric',
                        Rule::unique('workers', 'phone'),
                    ],
                ],
            ];

            // Merge the common rules with type-specific rules based on registration_type
            $rules = array_merge($commonRules, $typeSpecificRules[$registrationType]);

            return $rules;
        } else {

            /** Upon reaching this state, the user has manually manipulated the two types of membership (Employer or Worker), and therefore it is sufficient for me to put one condition for him here in order to cancel his request completely**/
            return [
                'registration_type'=>['required',Rule::in(['employer','worker'])]
            ];

        }


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
            'registration_type.required'=>trans('dashboard::validation.required'),
            'registration_type.in'=>trans('dashboard::validation.in'),
            'name.required' => trans('dashboard::validation.required'),
            'name.string' => trans('dashboard::validation.string'),
            'name.min' => trans('dashboard::validation.min'),
            'name.max' => trans('dashboard::validation.max'),


            'email.required' => trans('dashboard::validation.required'),
            'email.email' => trans('dashboard::validation.email'),
            'email.unique' => trans('dashboard::validation.unique'),


            'country.required' => trans('dashboard::validation.required'),
            'country.integer' => trans('dashboard::validation.integer'),
            'country.in' => trans('dashboard::validation.in'),


            'city.required' => trans('dashboard::validation.required'),
            'city.integer' => trans('dashboard::validation.integer'),
            'city.in' => trans('dashboard::validation.in'),


            'phone.required' => trans('dashboard::validation.required'),
            'phone.numeric' => trans('dashboard::validation.numeric'),
            'phone.unique' => trans('dashboard::validation.unique'),

            'password.required' => trans('dashboard::validation.required'),
            'password.min' => trans('dashboard::validation.min'),
            'password.regex' => trans('dashboard::validation.custom_regex'),
            'password.confirmed' => trans('dashboard::validation.confirmed'),


        ];
    }

}
