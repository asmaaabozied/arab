<?php

namespace Modules\Employer\Http\Controllers\Transaction;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Status;
use Modules\Task\Entities\Task;

class WagesAndCostsController extends Controller
{
    public function index()
    {
        $page_name = "ArabWorkers | Employer Panel - Financial Affairs";
        $main_breadcrumb = "Financial Affairs";
        $sub_breadcrumb = "WagesAndCosts";
        $data = Task::withoutTrashed()->where([
            ['employer_id', auth()->user()->id],
            ['publish_status', 'Published'],
        ])->with('category', 'TaskStatuses.status','taskDiscounted.discountCode')->get();

        $active = Status::withoutTrashed()->where('name', 'active')->first();
        $complete = Status::withoutTrashed()->where('name', 'completed')->first();

        for ($i = 0; $i < count($data); $i++) {
            if (
                $data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $active->name
                or
                $data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $complete->name

            )
            {
                $array_of_tasks [] = $data[$i];
            }
        }
        if (isset($array_of_tasks)) {
            $tasks = $array_of_tasks;
        } else {
            $tasks = [];
        }


        return view('employer::layouts.transaction.wagesAndCosts', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'tasks',
        ]));
    }
}
