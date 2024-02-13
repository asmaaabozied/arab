<?php

namespace Modules\Employer\Http\Controllers\Task;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Category\Entities\Category;
use Modules\Category\Entities\CategoryAction;
use Modules\DiscountCode\Entities\DiscountCode;
use Modules\DiscountCode\Entities\EmployerTaskDiscountCode;
use Modules\Employer\Entities\Employer;
use Modules\Employer\Http\Requests\CreateTaskRequest;
use Modules\Employer\Http\Requests\SubmitAndSaveTaskRequest;
use Modules\Privilege\Entities\EmployerPrivilege;
use Modules\Privilege\Entities\Privilege;
use Modules\Region\Entities\City;
use Modules\Region\Entities\Country;
use Modules\Setting\Entities\Addon;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Entities\Status;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskCategoryAction;
use Modules\Task\Entities\TaskCity;
use Modules\Task\Entities\TaskCountry;
use Modules\Task\Entities\TaskStatus;
use Modules\Task\Entities\TaskWorkFlow;

class EmployerCreateTaskController extends Controller
{
    public function showCreateTaskForm()
    {
        $page_name = "ArabWorkers | Employer Panel - Create Task";
        $main_breadcrumb = "Tasks";
        $sub_breadcrumb = "Create Task";
        $categories = Category::withoutTrashed()->get();
        $countries = Country::withoutTrashed()->get();
        $cities = City::withoutTrashed()->get();
        $additionalPrice = Addon::withoutTrashed()->get();
        $pin_task_on_top = $additionalPrice->where('title', '=', 'pin_task_on_top')->first();
        $only_professional_worker = $additionalPrice->where('title', '=', 'only_professional_worker')->first();
        $daily_limit_worker = $additionalPrice->where('title', '=', 'daily_limit_worker')->first();


        /**
         * We have a certain limit to use the pin to top feature,
         * so here we will count the number of active and pin to top tasks
         * to make sure that this feature is available for use.
         */
        $limit_of_pin_to_top = Setting::select('pin_in_top_task_limit_count')->first();
        $now = Carbon::now();
        $tasks = Task::withoutTrashed()->select('id')->where([
            ['special_access', 'true'],
            ['publish_status', 'Published'],
            ['is_hidden', 'false'],
            ['task_end_date', '>=', $now],
            ['deleted_at', null],
        ])->with('TaskStatuses.status')->get();
        $active = Status::withoutTrashed()->where('name', 'active')->first();
        for ($i = 0; $i < count($tasks); $i++) {
            if ($tasks[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $active->name) {
                $array_of_active_tasks [] = $tasks[$i];
            }
        }
        if (isset($array_of_active_tasks)) {
            $activeAndAvailableTasks = count($array_of_active_tasks);
        } else {
            $activeAndAvailableTasks = 0;
        }

        return view('employer::layouts.task.createTask', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'categories',
            'countries',
            'cities',
            'pin_task_on_top',
            'only_professional_worker',
            'daily_limit_worker',
            'limit_of_pin_to_top',
            'activeAndAvailableTasks',

        ]));

    }

    public function fetchCity(Request $request)
    {
        $lang = app()->getLocale();
        if ($lang == "ar") {
            $data['cities'] = City::withoutTrashed()->where("country_id", $request->country_id)->get(["id", "ar_name", "min_city_cost"]);

        } else {
            $data['cities'] = City::withoutTrashed()->where("country_id", $request->country_id)->get(["id", "name", "min_city_cost"]);

        }
        return response()->json($data);
    }

    public function fetchCategory(Request $request)
    {
        $categories_price = Category::withoutTrashed()->find($request->category_id);
        return response()->json($categories_price->min_creation_price);
    }

    public function fetchCategoryAction(Request $request)
    {
        $actions['actions'] = CategoryAction::withoutTrashed()->where("category_id", $request->category_id)->get(["id", "name", "ar_name", "price"]);
        return response()->json($actions);
    }

    public function categoryActions($categoryType)
    {
        $actions = CategoryAction::withoutTrashed()->with('category')->where("category_id", $categoryType)->get();
        return response()->json($actions);
    }


    public function cityPrice(Request $request)
    {
        $city_price = City::withoutTrashed()->find($request->city_id);
        return response()->json($city_price->min_city_cost);
    }

    public function createTaskSteepOne(CreateTaskRequest $request)
    {
//         return $requested_count_of_worker
        /**
         * The formula for calculating the total price of the task is as follows
         *
         * total price of task = (cost per worker X count of workers) + price of Additional features
         *
         * cost per worker = category price + average of cities
         *
         * final formula is:
         * total price of task = ( (category price + average of cities) X count of workers) + price of Additional features
         *
         */

        $validated = $request->validated();
//        dd($validated);
        if (array_key_exists('CategoryAction', $validated)) {
            $actions = CategoryAction::withoutTrashed()->where('category_id', $validated['category_id'])->select('id', 'category_id', 'price')->get()->toArray();
            $requested_actions = array_keys($validated['CategoryAction']);

            for ($i = 0; $i < count($requested_actions); $i++) {
                for ($j = 0; $j < count($actions); $j++) {
                    if ($requested_actions[$i] == $actions[$j]['id']) {
                        $truest_requested_actions [] = [
                            'action_id' => $requested_actions[$i],
                            'price' => $actions[$j]['price'],
                        ];
                        $price_of_category_actions [] = $actions[$j]['price'];
                    }
                }
            }
            if (count($truest_requested_actions) != count($requested_actions)) {
                alert()->error('Error',trans('employer::task.An error occurred while selecting the operations to be performed on the required category, please try again'));
                return redirect()->back();

            } else {
                $average_price_of_category_actions = array_sum($price_of_category_actions) / count($price_of_category_actions);
            }


        } else {
            alert()->error('Error',trans('employer::task.No work has been selected to be implemented on the requested platform, please select at least one'));
            return redirect()->back();
        }
        $addons = Addon::withoutTrashed()->get();

        if (array_key_exists('special_access', $validated)) {
            $special_access = "true";
            $special_access_price = $addons->where('title', '=', 'pin_task_on_top')->first()->fees;
        } else {
            $special_access = "false";
            $special_access_price = 0;
        }
        if (array_key_exists('only_professional', $validated)) {
            $only_professional = "true";
            $only_professional_price = $addons->where('title', '=', 'only_professional_worker')->first()->fees;

        } else {
            $only_professional = "false";
            $only_professional_price = 0;
        }
        if (array_key_exists('daily_limit', $validated)) {
            $daily_limit = $validated['daily_limit'];
            $requested_count_of_worker = $validated['total_worker_limit'];
            $day_needed = ceil($requested_count_of_worker / $daily_limit);

            $exploded_task_end_date = explode('-', $validated['task_end_date']);
            $datetime_task_end_date = Carbon::createFromDate($exploded_task_end_date[0], $exploded_task_end_date[1], $exploded_task_end_date[2]);
            $now = Carbon::now();
            $interval = $now->diff($datetime_task_end_date);
            $days_of_task = $interval->format('%a');
            if ($day_needed > $days_of_task) {
                alert()->warning('Warning',trans('employer::task.The time specified for the implementation of the project is not sufficient when setting this daily limit for the workers who will work on the task, so please increase the time for implementing the project or reduce the daily limit for workers'));
                return redirect()->back();
            } else {
                $daily_limit_price = $addons->where('title', '=', 'daily_limit_worker')->first()->fees;


            }

        } else {
            $daily_limit = null;
            $daily_limit_price = 0;
        }


        if (array_key_exists('proof_request_ques', $validated)) {
            $proof_request_ques = $validated['proof_request_ques'];
            $check_request_length = Str::length($proof_request_ques);
            if ($check_request_length < 5) {
                alert()->error('Error',trans('employer::task.the question request test  must be not null or less than 5 CH'));
                return redirect()->back();
            }

        } else {
            $proof_request_ques = null;
        }
        if (array_key_exists('proof_request_screenShot', $validated)) {
            $proof_request_screenShot = $validated['proof_request_screenShot'];
            $check_screenShot_length = Str::length($proof_request_screenShot);
            if ($check_screenShot_length < 5) {
                alert()->error('Error',trans('employer::task.the screenShot request test must be not null or less than 5 CH'));

                return redirect()->back();
            }
        } else {
            $proof_request_screenShot = null;
        }

        for ($i = 0; $i < count($validated['TaskRegion']); $i++) {
            $countries [] = $validated['TaskRegion'][$i]['Country'];
            $cities [] = $validated['TaskRegion'][$i]['City'];
        }
        /**
         * checking unique all cities requested
         */
        for ($i = 0; $i < count($cities); $i++) {
            if ($cities[$i] == "all_cities_in_this_country[" . $countries[$i] . "]") {
                $all_cities_in_this_country_details [] = City::withoutTrashed()->where('country_id', $countries[$i])->select('id')->get();

            } else {
                $cities_ids [] = $cities[$i];


            }
        }
        if (isset($all_cities_in_this_country_details)) {
            for ($j = 0; $j < count($all_cities_in_this_country_details); $j++) {
                for ($k = 0; $k < count($all_cities_in_this_country_details[$j]); $k++) {
                    $cities_ids [] = $all_cities_in_this_country_details[$j][$k]->id;
                }
            }
        }
        if (count($cities_ids) > count(collect($cities_ids)->unique())) {
            alert()->error('Error',trans('employer::task.this task cities must be unique'));
            return redirect()->back();

        }
        /**
         * in this step all date requested is correct and validated
         */

        for ($i = 0; $i < count($cities); $i++) {
            $true_cities_ids [] = ['city' => $cities[$i], 'country' => $countries[$i],];

            $true_countries_ids [] = $countries[$i];
        }
        $string_of_request = implode('', $cities);

        if (str_contains($string_of_request, 'all_cities_in_this_country') == true) {
            for ($i = 0; $i < count($cities); $i++) {
                if ($cities[$i] == "all_cities_in_this_country[" . $countries[$i] . "]") {
                    $true_country_min_price [] = City::withoutTrashed()->where('country_id', $countries[$i])->select('id', 'name', 'country_id', 'min_city_cost')->get()->min('min_city_cost');
                }
            }
        } else {
            $true_country_min_price = [];
        }

        $unique_true_countries_ids = array_values(collect($true_countries_ids)->unique()->toArray());
        for ($i = 0; $i < count($unique_true_countries_ids); $i++) {
            for ($j = 0; $j < count($true_cities_ids); $j++) {
                if (City::withoutTrashed()->where('country_id', $unique_true_countries_ids[$i])->find($true_cities_ids[$j]['city']) == null) {
                } else {
                    $selected_cities_in_country [$unique_true_countries_ids[$i]] [] = City::withoutTrashed()->where('country_id', $unique_true_countries_ids[$i])->select('id', 'min_city_cost', 'name')->find($true_cities_ids[$j]['city'])->id;
                }
            }
        }
        if (isset($selected_cities_in_country) and count($selected_cities_in_country) > 0) {
            foreach ($selected_cities_in_country as $key => $values) {
                foreach ($values as $value) {
                    $min_cost_for_selected_city_ids [$key] [] = City::withoutTrashed()->where([
                        ['country_id', $key],
                        ['id', $value],
                    ])->select('min_city_cost')->first()->min_city_cost;
                }
            }
        } else {
            $selected_cities_in_country = [];
        }
        if (count($selected_cities_in_country) == 0) {
            $final_average_of_all_country_and_city = array_sum($true_country_min_price) / count($true_country_min_price);
            $final_average_of_all_region_and_actions = $final_average_of_all_country_and_city + $average_price_of_category_actions;
        } elseif (count($true_country_min_price) == 0) {
            $outputOfAllCityArray = [];
            foreach ($min_cost_for_selected_city_ids as $subArray) {
                $outputOfAllCityArray = array_merge($outputOfAllCityArray, $subArray);
            }
            $outputOfAllCityArray = array_values($outputOfAllCityArray);
            $final_average_of_all_country_and_city = array_sum($outputOfAllCityArray) / count($outputOfAllCityArray);
            $final_average_of_all_region_and_actions = $final_average_of_all_country_and_city + $average_price_of_category_actions;

        } else {
            $outputOfAllCityArray = [];
            foreach ($min_cost_for_selected_city_ids as $subArray) {
                $outputOfAllCityArray = array_merge($outputOfAllCityArray, $subArray);
            }
            $outputOfAllCityArray = array_values($outputOfAllCityArray);
            $allOfSelectedCountryAndCity = array_merge($true_country_min_price, $outputOfAllCityArray);
            $final_average_of_all_country_and_city = array_sum($allOfSelectedCountryAndCity) / count($allOfSelectedCountryAndCity);
            $final_average_of_all_region_and_actions = $final_average_of_all_country_and_city + $average_price_of_category_actions;
        }

        $minimum_cost_per_worker = round($final_average_of_all_region_and_actions, 2);
        $workers_price = round($minimum_cost_per_worker * $validated['total_worker_limit'], 2) / 2;
        $additional_features = round($special_access_price + $only_professional_price + $daily_limit_price, 2);
        /**
         * total price of task = ( (category price + average of cities) X count of workers) + price of Additional features
         */


        $total_task_price = $workers_price + $additional_features;
        $random_task_number = "T" . Carbon::now()->format('ym') . Str::random(1) . Carbon::now()->format('s') . Str::random(2) . random_int(10, 99);
        $task = [
            'task_number' => $random_task_number,
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'employer_id' => auth()->user()->id,
            'proof_request_ques' => $proof_request_ques,
            'proof_request_screenShot' => $proof_request_screenShot,
            'total_worker_limit' => $validated['total_worker_limit'],
            'cost_per_worker' => round($minimum_cost_per_worker, 2),
            'task_end_date' => $validated['task_end_date'],
            'special_access' => $special_access,
            'only_professional' => $only_professional,
            'daily_limit' => $daily_limit,
            'task_cost' => $workers_price,
            'other_cost' => $additional_features,
            'total_cost' => $total_task_price,
            'publish_status' => 'NotPublished',
        ];
        $data = Task::create($task);
        for ($i = 0; $i < count($unique_true_countries_ids); $i++) {
            TaskCountry::create([
                'task_id' => $data->id,
                'country_id' => $unique_true_countries_ids[$i],

            ]);
        }
        for ($i = 0; $i < count($requested_actions); $i++) {
            TaskCategoryAction::create([
                'task_id' => $data->id,
                'category_action_id' => $requested_actions[$i],

            ]);

        }
        for ($i = 0; $i < count($cities_ids); $i++) {
            TaskCity::create([
                'task_id' => $data->id,
                'city_id' => $cities_ids[$i],
            ]);
        }
        for ($i = 0; $i < count($validated['TaskWorkflow']); $i++) {

            TaskWorkFlow::create([
                'task_id' => $data->id,
                'work_flow' => $validated['TaskWorkflow'][$i]['Workflow'],
            ]);
        }

//        TaskStatus::create([
//            'task_id' => $data->id,
//            'task_status_id' => 2,
//        ]);


        return redirect()->route('employer.show.task.details.after.create', [$data->id, $data->task_number]);

    }

    public function showTaskDetailsAfterCreate($task_id, $task_number)
    {
        $page_name = "ArabWorkers | Employer Panel - Preview Task";
        $main_breadcrumb = "Tasks";
        $sub_breadcrumb = "Preview Task";
        $app_local = app()->getLocale();
        $task = Task::where([
            ['employer_id', auth()->user()->id],
            ['task_number', $task_number],
            ['id', $task_id],
        ])->with('countries.country', 'cities.city', 'category', 'workflows', 'actions.categoryAction')->firstOrFail();

        for ($i = 0; $i < count($task->countries); $i++) {
            $country [$task->countries[$i]->country_id] = City::withoutTrashed()->where('country_id', $task->countries[$i]->country_id)->count();
        }

        for ($i = 0; $i < count($task->countries); $i++) {
            for ($j = 0; $j < count($task->cities); $j++) {
                if ($task->cities[$j]->city->country_id == $task->countries[$i]->country_id)
                    $region [$task->countries[$i]->country_id] [] = $task->cities[$j]->city->id;
            }
        }
        $keys = array_keys($country);
        for ($i = 0; $i < count($keys); $i++) {
            if (count($region[$keys[$i]]) == $country[$keys[$i]]) {
                if ($app_local == "ar") {
                    $result [] = [
                        'country' => $task->countries[$i]->country->ar_name,
                        'flag' => $task->countries[$i]->country->flag,
                        'cities' => 'all_cities'
                    ];
                } else {
                    $result [] = [
                        'country' => $task->countries[$i]->country->name,
                        'flag' => $task->countries[$i]->country->flag,
                        'cities' => 'all_cities'
                    ];
                }


            } else {
                if ($app_local == "ar") {
                    $result [] = [
                        'country' => $task->countries[$i]->country->ar_name,
                        'flag' => $task->countries[$i]->country->flag,
                        'cities' => $region[$keys[$i]],
                    ];
                } else {
                    $result [] = [
                        'country' => $task->countries[$i]->country->name,
                        'flag' => $task->countries[$i]->country->flag,
                        'cities' => $region[$keys[$i]],
                    ];
                }

            }
        }
        return view('employer::layouts.task.previewTask', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'task',
            'result',
            'app_local',

        ]));
    }

    public function checkTrustDiscountCode(Request $request, $task_id)
    {
        $data = DiscountCode::withoutTrashed()->where([
            ['code', $request->disCod],
        ])->first();
        $now = Carbon::now();

        if ($data != null) {
            $start = $data->starts_at;
            $expire = $data->expires_at;

            $check_record = EmployerTaskDiscountCode::withoutTrashed()->where([
                ['employer_id', \auth()->user()->id],
                ['task_id', $task_id],
//                ['discount_code_id', $data->id],
            ])->first();
//            if $check_record found resulte that mine a discount code used with this task

            if ($check_record == null) {
                if ($start <= $now and $expire >= $now and $data->max_uses > $data->count_of_uses and $data->type != "PayCosts") {

                    EmployerTaskDiscountCode::create([
                        'employer_id' => \auth()->user()->id,
                        'task_id' => $task_id,
                        'discount_code_id' => $data->id,

                    ]);
                    $data->update([
                        'count_of_uses' => $data->count_of_uses + 1,
                    ]);
                    $result = [
                        'check_code' => 'Success',
                        'message' => trans('employer::task.The discount code has been activated and a percentage (') . trans('employer::task.%) has been deducted') . $data->discount_amount . trans('employer::task.from the value of (') . trans('employer::task.' . $data->type) . trans('employer::task.) successfully'),
                        'amount' => $data->discount_amount,
                        'code_type' => $data->type,
                    ];

                } else {
                    $result = [
                        'check_code' => 'Error',
                        'message' => trans('employer::task.This discount code is Not Available'),
                        'amount' => 0,
                        'code_type' => $data->type,
                    ];
                }
            } else {
                $result = [
                    'check_code' => "Warning",
                    'message' => trans('employer::task.This discount code can only be used once'),
                    'amount' => 0,
                    'code_type' => $data->type,

                ];
            }


        } else {
            $result = [
                'check_code' => "Error",
                'message' => trans('employer::task.This discount code Not Found'),
                'amount' => 0,
                'code_type' => 'NotType',


            ];
        }


        return response()->json($result);
    }

//
    public function submitAndSaveTask(SubmitAndSaveTaskRequest $request, $task_id, $task_number)
    {
        $validated = $request->validated();
        $employer = Employer::withoutTrashed()->findOrFail(\auth()->user()->id);
        $data = Task::withoutTrashed()->where([
            ['id', $task_id],
            ['task_number', $task_number],
            ['publish_status', 'NotPublished'],
            ['employer_id', $employer->id],

        ])->firstOrFail();
        $check_if_use_discount_code = EmployerTaskDiscountCode::withoutTrashed()->where([
            ['employer_id', auth()->user()->id],
            ['task_id', $data->id],
        ])->with('discountCode')->get();
        if (isset($check_if_use_discount_code) and $check_if_use_discount_code->count() == 1) {
            $discount_amount = $check_if_use_discount_code[0]->discountCode->discount_amount;
            $discount_type = $check_if_use_discount_code[0]->discountCode->type;
        } else {
            $discount_amount = 0;
            $discount_type = "UNSET";
        }
        $Pending = Status::withoutTrashed()->where('name', 'pending')->firstOrFail('id')->id;
        $UnPayed = Status::withoutTrashed()->where('name', 'unPayed')->firstOrFail('id')->id;
        $new_min_per_cost = round($validated['new_minimum_cost_per_worker'], 2);

        if ($new_min_per_cost == $data->cost_per_worker) {
            $data->update([
                'publish_status' => 'Published',
            ]);
            if ($discount_type == "UNSET") {
                $total_cost = $data->task_cost + $data->other_cost;
            } elseif ($discount_type == "MainCosts") {
                $total_cost = ($data->task_cost - ($data->task_cost * $discount_amount / 100)) + $data->other_cost;
                $data->update([
                    'task_cost' => $data->task_cost - ($data->task_cost * $discount_amount / 100),
                    'total_cost' => $total_cost,
                ]);


            } elseif ($discount_type == "AdditionalCosts") {
                $total_cost = $data->task_cost + ($data->other_cost - ($data->other_cost * $discount_amount / 100));
                $data->update([
                    'other_cost' => $data->other_cost - ($data->other_cost * $discount_amount / 100),
                    'total_cost' => $total_cost,
                ]);
            } elseif ($discount_type == "TotalCosts") {
                $total_cost_without_discount = $data->task_cost + $data->other_cost;
                $total_cost = $total_cost_without_discount - ($total_cost_without_discount * $discount_amount / 100);
                $data->update([
                    'total_cost' => $data->total_cost - ($data->total_cost * $discount_amount / 100),
                ]);
            } else {
//           This means that the type of discount was on the payment fees and therefore there is no change to the final value of the job
                $total_cost = $data->task_cost + $data->other_cost;
            }

            if ($employer->wallet_balance >= $total_cost) {
                /**                In this case, the customer's wallet contains enough money to pay for the job*/
                $employer->update([
                    'wallet_balance' => $employer->wallet_balance - $total_cost,
                    'total_spends' => $employer->total_spends + $total_cost,
                ]);
                TaskStatus::create([
                    'task_id' => $task_id,
                    'task_status_id' => $Pending,
                ]);

                $privilege = Privilege::withoutTrashed()->where([
                    ['code', 'CNT'],
                    ['for', 'employer'],
                ])->first();
                /** plus Privilege to the employer **/
                EmployerPrivilege::create([
                    'employer_id' => $employer->id,
                    'count_of_privileges' => $privilege->privileges,
                    'type' => $privilege->type,
                    'description' => $privilege->title,
                ]);
                if ($data->other_cost > 0) {
                    $privilege2 = Privilege::withoutTrashed()->where([
                        ['code', 'UAF'],
                        ['for', 'employer'],
                    ])->first();
                    /** plus Privilege to the employer **/
                    EmployerPrivilege::create([
                        'employer_id' => $employer->id,
                        'count_of_privileges' => $privilege2->privileges,
                        'type' => $privilege2->type,
                        'description' => $privilege2->title,
                    ]);
                }
                alert()->success('Success',trans('employer::task.The task has been successfully created and deducted from your wallet balance'));
                return redirect()->route('employer.show.task.in.pending.status');
            } else {
                /**        In this case, the customer's wallet does not contain enough money to pay for the task */
                TaskStatus::create([
                    'task_id' => $task_id,
                    'task_status_id' => $UnPayed,
                ]);

                alert()->warning('Warning',trans('employer::task.The task has been created successfully, but your wallet does not have enough funds to pay for the task, you can review the task and pay for it from the task section task basket'));
                return redirect()->route('employer.show.not.payed.tasks');
            }
        } elseif ($new_min_per_cost > $data->cost_per_worker) {
            if ($discount_type == "UNSET") {
                $count_of_workers = $data->total_worker_limit;
                $new_worker_price = $new_min_per_cost * $count_of_workers;
                $additional_features = $data->other_cost;
                $new_task_cost = $new_worker_price;
                $new_total_cost = $new_task_cost + $additional_features;

                $data->update([
                    'publish_status' => 'Published',
                    'cost_per_worker' => $new_min_per_cost,
                    'task_cost' => $new_task_cost,
                    'total_cost' => $new_total_cost,
                ]);
            } elseif ($discount_type == "MainCosts") {
                $count_of_workers = $data->total_worker_limit;
                $new_worker_price = $new_min_per_cost * $count_of_workers;
                $additional_features = $data->other_cost;
                $new_task_cost = ($new_worker_price - ($new_worker_price * $discount_amount / 100));
                $new_total_cost = $new_task_cost + $additional_features;

                $data->update([
                    'publish_status' => 'Published',
                    'cost_per_worker' => $new_min_per_cost,
                    'task_cost' => $new_task_cost,
                    'total_cost' => $new_total_cost,
                ]);
            } elseif ($discount_type == "AdditionalCosts") {
                $count_of_workers = $data->total_worker_limit;
                $new_worker_price = $new_min_per_cost * $count_of_workers;
                $additional_features = $data->other_cost - ($data->other_cost * $discount_amount / 100);
                $new_task_cost = $new_worker_price;
                $new_total_cost = $new_task_cost + $additional_features;

                $data->update([
                    'publish_status' => 'Published',
                    'cost_per_worker' => $new_min_per_cost,
                    'task_cost' => $new_task_cost,
                    'other_cost' => $additional_features,
                    'total_cost' => $new_total_cost,
                ]);
            } elseif ($discount_type == "TotalCosts") {
                $count_of_workers = $data->total_worker_limit;
                $new_worker_price = $new_min_per_cost * $count_of_workers;
                $additional_features = $data->other_cost;
                $new_task_cost = $new_worker_price;
                $new_total_cost_without_discount = $new_task_cost + $additional_features;
                $new_total_cost = $new_total_cost_without_discount - ($new_total_cost_without_discount * $discount_amount / 100);


                $data->update([
                    'publish_status' => 'Published',
                    'cost_per_worker' => $new_min_per_cost,
                    'task_cost' => $new_task_cost,
                    'total_cost' => $new_total_cost,
                ]);
            } else {
//           This means that the type of discount was on the payment fees and therefore there is no change to the final value of the job
                $count_of_workers = $data->total_worker_limit;
                $new_worker_price = $new_min_per_cost * $count_of_workers;
                $additional_features = $data->other_cost;
                $new_task_cost = $new_worker_price;
                $new_total_cost = $new_task_cost + $additional_features;


                $data->update([
                    'publish_status' => 'Published',
                    'cost_per_worker' => $new_min_per_cost,
                    'task_cost' => $new_task_cost,
                    'total_cost' => $new_total_cost,
                ]);
            }


            $final_task_price = $new_total_cost;
            if ($employer->wallet_balance >= $final_task_price) {
                /**                In this case, the customer's wallet contains enough money to pay for the job*/
                $employer->update([
                    'wallet_balance' => $employer->wallet_balance - $final_task_price,
                    'total_spends' => $employer->total_spends + $final_task_price,
                ]);
                TaskStatus::create([
                    'task_id' => $task_id,
                    'task_status_id' => $Pending,
                ]);
                $privilege = Privilege::withoutTrashed()->where([
                    ['code', 'CNT'],
                    ['for', 'employer'],
                ])->first();
                /** plus Privilege to the employer **/
                EmployerPrivilege::create([
                    'employer_id' => $employer->id,
                    'count_of_privileges' => $privilege->privileges,
                    'type' => $privilege->type,
                    'description' => $privilege->title,
                ]);
                if ($data->other_cost > 0) {
                    $privilege2 = Privilege::withoutTrashed()->where([
                        ['code', 'UAF'],
                        ['for', 'employer'],
                    ])->first();
                    /** plus Privilege to the employer **/
                    EmployerPrivilege::create([
                        'employer_id' => $employer->id,
                        'count_of_privileges' => $privilege2->privileges,
                        'type' => $privilege2->type,
                        'description' => $privilege2->title,
                    ]);
                }
                alert()->success('Success',trans('employer::task.The task has been successfully created and deducted from your wallet balance'));
                return redirect()->route('employer.show.task.in.pending.status');
            } else {
                /**        In this case, the customer's wallet does not contain enough money to pay for the task */
                TaskStatus::create([
                    'task_id' => $task_id,
                    'task_status_id' => $UnPayed,
                ]);

                alert()->warning('Warning',trans('employer::task.The task has been created successfully, but your wallet does not have enough funds to pay for the task, you can review the task and pay for it from the task section task basket'));
                return redirect()->route('employer.show.not.payed.tasks');
            }
        } else {
            alert()->error('Error',trans('employer::task.this value is minimum cost per worker for region and category selected'));
            return redirect()->route('employer.show.task.details.after.create', [$task_id, $task_number]);
        }


    }

    public function showTasks()
    {

        return view('tasks.index', ['page_name' => 'Browse Tasks', 'main_breadcrumb' => 'Tasks', 'sub_breadcrumb' => 'Browse Tasks']);
    }

}
