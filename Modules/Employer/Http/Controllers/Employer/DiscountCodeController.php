<?php

namespace Modules\Employer\Http\Controllers\Employer;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\DiscountCode\Entities\EmployerTaskDiscountCode;
use Modules\Region\Entities\City;
use Modules\Task\Entities\Task;

class DiscountCodeController extends Controller
{

    public function index()
    {
        $page_name = "ArabWorkers | Employers - Discount Codes";
        $main_breadcrumb = "Employer Panel";
        $sub_breadcrumb = "My Discount Codes";
        $data = EmployerTaskDiscountCode::withoutTrashed()->with('discountCode','task')->where('employer_id', auth()->user()->id)->get();

//        dd($data);
        return view('employer::layouts.discountCode.index',compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',

        ]));
    }
    public function showDiscountCodeInvoice($task,$discountCode){
        $page_name = "ArabWorkers | Employers - Discount Code Invoice";
        $main_breadcrumb = "Employer Panel";
        $sub_breadcrumb = "Discount Code Invoice";
        $data = EmployerTaskDiscountCode::withoutTrashed()->where([
            ['employer_id', auth()->user()->id],
            ['task_id', $task],
            ['discount_code_id', $discountCode],

        ])->with('discountCode')->firstOrFail();
//        dd($data);
        $app_local = app()->getLocale();

        $task = Task::withoutTrashed()->findOrFail($data->task_id);
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
        return view('employer::layouts.discountCode.discountCodeInvoice',compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'task',
            'result',
            'app_local',

        ]));

    }


}
