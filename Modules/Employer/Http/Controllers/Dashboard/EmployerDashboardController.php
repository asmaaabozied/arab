<?php

namespace Modules\Employer\Http\Controllers\Dashboard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Currency\Entities\Currency;
use Modules\Setting\Entities\Status;
use Modules\Task\Entities\Task;

class EmployerDashboardController extends Controller
{
    protected function guard()
    {
        return Auth::guard('employer');


    }

    public function index()
    {
        $page_name = "ArabWorkers | Employer Panel";
        $main_breadcrumb = "Employer Panel";
        $sub_breadcrumb = "index";
        $status = Status::withoutTrashed()->get();
        $currencies = Currency::withoutTrashed()->get();

        $unPayed = $status->where('name', 'unPayed')->first();
        $pending = $status->where('name', 'pending')->first();
        $active = $status->where('name', 'active')->first();
        $complete = $status->where('name', 'completed')->first();
        $adminRefusalTask = $status->where('name', 'adminRefusalTask')->first();


        /** NotPublished **/
        $count_NotPublished_tasks = Task::withoutTrashed()->where([
            ['publish_status', 'NotPublished'],
            ['employer_id', \auth()->user()->id],
        ])->count();


        $data = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
            ['employer_id', \auth()->user()->id],
        ])->with('TaskStatuses.status')->get();


        for ($i = 0; $i < count($data); $i++) {
            /** unPayed **/
            if (count($data[$i]->TaskStatuses) == 1 and $data[$i]->TaskStatuses[0]->task_status_id == $unPayed->id) {
                $array_of_unPayed_task [] = $data[$i];
            }
            /** Pending **/
            if ($data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $pending->name) {
                $array_of_pending_tasks [] = $data[$i];
            }
            /** Active **/
            if ($data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $active->name) {
                $array_of_active_tasks [] = $data[$i];
            }
            /** Complete **/
            if ($data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $complete->name) {
                $array_of_completed_tasks [] = $data[$i];
            }
            /** adminRefusalTask **/
            if ($data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $adminRefusalTask->name) {
                $array_of_rejected_tasks [] = $data[$i];
            }

        }

        /** unPayed **/
        if (isset($array_of_unPayed_task)) {
            $unPayedTasks = $array_of_unPayed_task;
        } else {
            $unPayedTasks = [];
        }
        /** Pending **/
        if (isset($array_of_pending_tasks)) {
            $pendingTasks = $array_of_pending_tasks;
        } else {
            $pendingTasks = [];
        }
        /** Active **/
        if (isset($array_of_active_tasks)) {
            $activeTasks = $array_of_active_tasks;
        } else {
            $activeTasks = [];
        }
        /** Complete **/
        if (isset($array_of_completed_tasks)) {
            $completeTasks = $array_of_completed_tasks;
        } else {
            $completeTasks = [];
        }
        /** adminRefusalTask **/
        if (isset($array_of_rejected_tasks)) {
            $rejectedTasks = $array_of_rejected_tasks;
        } else {
            $rejectedTasks = [];
        }
        $total_task_cost = collect($pendingTasks)->sum('task_cost') + collect($activeTasks)->sum('task_cost') + collect($completeTasks)->sum('task_cost');
        $total_other_cost = collect($pendingTasks)->sum('other_cost') + collect($activeTasks)->sum('other_cost') + collect($completeTasks)->sum('other_cost');

//        dd(
//            $unPayedTasks,
//            $pendingTasks,
//            $activeTasks,
//            $completeTasks,
//            $rejectedTasks,
//            $count_NotPublished_tasks,
//            $total_task_cost,
//            $total_other_cost,
//        );

        return view('employer::layouts.employer.index', compact(
            [
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',

                'unPayedTasks',
                'pendingTasks',
                'activeTasks',
                'completeTasks',
                'rejectedTasks',
                'count_NotPublished_tasks',
                'total_task_cost',
                'total_other_cost',
            ]));
    }


    public function profit()
    {
        $employer = Auth::user();

        return view('employer::layouts.employer.profit', compact(
            [
                'employer'
            ]));
    }

    public function Walletbalance()
    {
        $employer = Auth::user();

        return view('employer::layouts.employer.Wallentbalance', compact(
            [
                'employer'
            ]));
    }

    public function getCurrentLang()
    {
        $current_lange = Session::get('applocale');
        if ($current_lange != null) {
            $lang = $current_lange;
        } else {
            $lang = "ar";
        }

        return $lang;
    }

    public function logout(Request $request)
    {
        $lang = $this->getCurrentLang();
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::put('applocale', $lang);
        return redirect()->route('show.login.form');
    }
}
