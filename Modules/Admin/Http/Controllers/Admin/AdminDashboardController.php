<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Employer\Entities\Employer;
use Modules\Setting\Entities\Addon;
use Modules\Setting\Entities\Status;
use Modules\Task\Entities\Task;
use Modules\Worker\Entities\Worker;

class AdminDashboardController extends Controller
{
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function index()
    {
        $page_name = "ArabWorkers | Admin Panel";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Admin Panel";
        $status = Status::withoutTrashed()->get();

        $unPayed = $status->where('name', 'unPayed')->first();
        $pending = $status->where('name', 'pending')->first();
        $active = $status->where('name', 'active')->first();
        $complete = $status->where('name', 'completed')->first();
        $adminRefusalTask = $status->where('name', 'adminRefusalTask')->first();

        $count_employers = Employer::whereNull('deleted_at')->count();
        $count_workers = Worker::whereNull('deleted_at')->count();

        /** NotPublished **/
        $count_NotPublished_tasks = Task::withoutTrashed()->where([
            ['publish_status', 'NotPublished'],
        ])->count();


        $data = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
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

            if ($data[$i]->only_professional == "true") {
                $uses_of_only_professional[] = $data[$i];
            }
            if ($data[$i]->daily_limit != null) {
                $uses_of_daily_limit[] = $data[$i];
            }
            if ($data[$i]->special_access == "true") {
                $uses_of_special_access[] = $data[$i];
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
        $total_revenue = collect($pendingTasks)->sum('total_cost') + collect($activeTasks)->sum('total_cost') + collect($completeTasks)->sum('total_cost');
        $total_task_cost = collect($pendingTasks)->sum('task_cost') + collect($activeTasks)->sum('task_cost') + collect($completeTasks)->sum('task_cost');
        $total_other_cost = collect($pendingTasks)->sum('other_cost') + collect($activeTasks)->sum('other_cost') + collect($completeTasks)->sum('other_cost');

        if (isset($uses_of_only_professional) and count($uses_of_only_professional) > 0) {
            $count_of_use_only_professional = count($uses_of_only_professional);
        } else {
            $count_of_use_only_professional = 0;
        }
        if (isset($uses_of_daily_limit) and count($uses_of_daily_limit) > 0) {
            $count_of_use_daily_limit = count($uses_of_daily_limit);
        } else {
            $count_of_use_daily_limit = 0;
        }

        if (isset($uses_of_special_access) and count($uses_of_special_access) > 0) {
            $count_of_special_access = count($uses_of_special_access);
        } else {
            $count_of_special_access = 0;
        }
        return view('admin::layouts.admin.index', compact(
            [
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
                'count_employers',
                'count_workers',
                'unPayedTasks',
                'pendingTasks',
                'activeTasks',
                'completeTasks',
                'rejectedTasks',
                'count_NotPublished_tasks',
                'total_revenue',
                'total_task_cost',
                'total_other_cost',
                'count_of_use_only_professional',
                'count_of_use_daily_limit',
                'count_of_special_access',
            ]));
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::put('applocale', 'ar');
        return redirect()->route('admin.show.signIn.page');
    }
}
