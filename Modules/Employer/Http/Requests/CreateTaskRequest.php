<?php

namespace Modules\Employer\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Category\Entities\Category;
use Modules\Region\Entities\City;
use Modules\Region\Entities\Country;

class CreateTaskRequest extends FormRequest
{
    public function categories(){
        $categories = Category::withoutTrashed()->get();
        for ($i=0;$i<count($categories);$i++){
            $array_of_categories [] = $categories[$i]->id;
        }

        return [
            'array_of_categories' => $array_of_categories,
        ];
    }
    public function countries(){
        $countries = Country::withoutTrashed()->get();
        for ($i=0;$i<count($countries);$i++){
            $array_of_countries [] = $countries[$i]->id;
            $array_of_cities [] = "all_cities_in_this_country[".$countries[$i]->id."]";
        }

        return [
            'array_of_countries' => $array_of_countries,
            'array_of_cities' => $array_of_cities,
        ];
    }
    public function cities(){
        $cities = City::withoutTrashed()->get();
        $data = $this->countries();
        for ($i=0;$i<count($cities);$i++){
            $array_of_cities [] = $cities[$i]->id;
        }
        for ($i=0;$i<count($data['array_of_cities']);$i++){
            array_push($array_of_cities, $data['array_of_cities'][$i]);
        }
        return [
            'array_of_cities' => $array_of_cities,
        ];
    }
    public function rules()
    {
        $categories = $this->categories();
        $cities = $this->cities();
        $countries = $this->countries();
        return [
            'category_id' => ['required', Rule::in($categories['array_of_categories'])],
            'CategoryAction.*.toggle' => 'nullable',
            'title' =>  'required|min:5|max:250',
            'description' =>  'required|min:5|max:2500',
            'TaskWorkflow' => 'required',
            'TaskWorkflow.*.Workflow' => 'required|min:5|max:2500',
            'total_worker_limit' =>'required|numeric|gt:0|max:2147483647',
//                'cost_per_worker' => 'required|gte:0.1',
            'task_end_date' => 'required|date|after_or_equal:'.Carbon::today(),
            'TaskRegion' => 'required',
            'TaskRegion.*.Country' => ['required','integer', Rule::in($countries['array_of_countries'])],
            'TaskRegion.*.City' => ['required', Rule::in($cities['array_of_cities'])],

            'proof_request_ques' => 'required|min:5|max:2500',
            'proof_request_screenShot' => 'required|min:5|max:2500',
            'special_access' => 'nullable',
            'only_professional' => 'nullable',
            'daily_limit' => 'nullable|numeric|gte:1|lte:total_worker_limit',
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
            'category_id.required' => trans('dashboard::validation.required'),
            'category_id.in' => trans('dashboard::validation.in'),

            'title.required' => trans('dashboard::validation.required'),
            'title.min' => trans('dashboard::validation.min'),
            'title.max' => trans('dashboard::validation.max'),


            'description.required' => trans('dashboard::validation.required'),
            'description.min' => trans('dashboard::validation.min'),
            'description.max' => trans('dashboard::validation.max'),


            'TaskWorkflow.required' => trans('dashboard::validation.required'),

            'Workflow.required' => trans('dashboard::validation.required'),
            'Workflow.min' => trans('dashboard::validation.min'),
            'Workflow.max' => trans('dashboard::validation.max'),


            'total_worker_limit.required' => trans('dashboard::validation.required'),
            'total_worker_limit.numeric' => trans('dashboard::validation.numeric'),
            'total_worker_limit.gt' => trans('dashboard::validation.gt'),
            'total_worker_limit.max' => trans('dashboard::validation.max'),



            'task_end_date.required' => trans('dashboard::validation.required'),
            'task_end_date.date' => trans('dashboard::validation.date'),
            'task_end_date.after_or_equal' => trans('dashboard::validation.after_or_equal'),




            'TaskRegion.required' => trans('dashboard::validation.required'),


            'Country.required' => trans('dashboard::validation.required'),
            'Country.integer' => trans('dashboard::validation.integer'),
            'Country.in' => trans('dashboard::validation.in'),

            'City.required' => trans('dashboard::validation.required'),
            'City.integer' => trans('dashboard::validation.integer'),
            'City.in' => trans('dashboard::validation.in'),



            'proof_request_ques.required' => trans('dashboard::validation.required'),
            'proof_request_ques.min' => trans('dashboard::validation.min'),
            'proof_request_ques.max' => trans('dashboard::validation.max'),


            'proof_request_screenShot.required' => trans('dashboard::validation.required'),
            'proof_request_screenShot.min' => trans('dashboard::validation.min'),
            'proof_request_screenShot.max' => trans('dashboard::validation.max'),



            'daily_limit.nullable' => trans('dashboard::validation.nullable'),
            'daily_limit.numeric' => trans('dashboard::validation.numeric'),
            'daily_limit.gte' => trans('dashboard::validation.gte'),
            'daily_limit.lte' => trans('dashboard::validation.lte'),

        ];

    }
}
