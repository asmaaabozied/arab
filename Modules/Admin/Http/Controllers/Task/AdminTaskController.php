<?php

namespace Modules\Admin\Http\Controllers\Task;

use App\Mail\ChangeTaskStatus;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Admin\Http\Requests\AdminDeferredActiveTaskRequest;
use Modules\Admin\Http\Requests\RejectTaskProofRequest;
use Modules\Admin\Http\Requests\RejectTaskRequest;
use Modules\Employer\Entities\Employer;
use Modules\Region\Entities\City;
use Modules\Setting\Entities\Status;
use Modules\Task\Entities\DeferredTask;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskProof;
use Modules\Task\Entities\TaskStatus;

class AdminTaskController extends Controller
{
    public function index()
    {

        $page_name = "ArabWorkers|Admin - Tasks";
        $main_breadcrumb = "Tasks";
        $sub_breadcrumb = "Tasks";
        $status = Status::withoutTrashed()->get();

        $unPayed = $status->where('name', 'unPayed')->first();
        $pending = $status->where('name', 'pending')->first();
        $active = $status->where('name', 'active')->first();
        $complete = $status->where('name', 'completed')->first();
        $adminRefusalTask = $status->where('name', 'adminRefusalTask')->first();


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
        $tasks = Task::withoutTrashed()->with('category', 'employer')->paginate();
        return view('admin::layouts.task.index', compact([

            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'unPayedTasks',
            'pendingTasks',
            'activeTasks',
            'completeTasks',
            'rejectedTasks',
            'count_NotPublished_tasks',
            'tasks',

        ]));
    }

    public function taskDetails(Task $task)
    {
        $page_name = "ArabWorkers|Admin - Tasks - TaskDetails";
        $main_breadcrumb = "Tasks";
        $sub_breadcrumb = "Task Details";

        $app_local = app()->getLocale();

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
        return view('admin::layouts.task.taskDetails', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'task',
            'result',
            'app_local',
        ]));
    }


    public function showPendingTasks()
    {
        $page_name = "ArabWorkers | Admin Panel - Pending Tasks";
        $main_breadcrumb = "Tasks";
        $sub_breadcrumb = "PendingTasks";
        $data = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
        ])->with('category', 'TaskStatuses.status')->get();
        $pending = Status::withoutTrashed()->where('name', 'pending')->first();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $pending->name) {
                $array_of_pending_tasks [] = $data[$i];
            }
        }
        if (isset($array_of_pending_tasks)) {
            $pendingTasks = $array_of_pending_tasks;
        } else {
            $pendingTasks = [];
        }
        return view('admin::layouts.task.PendingTasks', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'pendingTasks',
        ]));
    }

    public function pendingTaskDetails($task_id, $task_number)
    {
        $page_name = "ArabWorkers | Admin Panel - Pending Task Details";
        $main_breadcrumb = "Pending Tasks";
        $sub_breadcrumb = "PendingTaskDetails";
        $task = Task::withoutTrashed()->where([
            ['task_number', $task_number],
            ['publish_status', 'Published'],
        ])->with('countries.country', 'cities.city', 'category', 'workflows', 'actions.categoryAction', 'TaskStatuses')->findOrFail($task_id);
        $pending = Status::withoutTrashed()->where('name', 'pending')->first();

        if ($task->TaskStatuses()->latest()->first()->task_status_id == $pending->id) {
            $app_local = app()->getLocale();

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
            return view('admin::layouts.task.PendingTaskDetails', compact([
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
                'task',
                'result',
                'app_local',
            ]));
        } else {
            alert()->toast(trans('employer::task.An error has occurred, please try again later'), 'error');
            return redirect()->back();
        }

    }

    public function rejectPendingTask(RejectTaskRequest $request, $task_id, $task_number)
    {
        $validated = $request->validated();
        $data = Task::withoutTrashed()->where('task_number', $task_number)->findOrFail($task_id);
        $adminRefusalTask = Status::withoutTrashed()->where('name', 'adminRefusalTask')->first();
        TaskStatus::create([
            'task_id' => $data->id,
            'task_status_id' => $adminRefusalTask->id,
            'description' => $validated['reasonOfReject'],
        ]);
        Employer::withoutTrashed()->where('id', $data->employer_id)->update([
            'wallet_balance' => $data->employer->wallet_balance + $data->total_cost,
            'total_spends' => $data->employer->total_spends - $data->total_cost,
        ]);

        alert()->toast(trans('admin::task.this task rejected successfully'), 'success');
        return redirect()->route('admin.show.task.in.pending.status');
    }

    public function acceptPendingTask($task_id, $task_number)
    {
        $data = Task::withoutTrashed()->where('task_number', $task_number)->findOrFail($task_id);
        $active = Status::withoutTrashed()->where('name', 'active')->first();
        TaskStatus::create([
            'task_id' => $data->id,
            'task_status_id' => $active->id,
        ]);
        alert()->toast(trans('admin::task.this task accepted successfully'), 'success');
        return redirect()->route('admin.show.task.in.pending.status');
    }


    public function showActiveTasks()
    {
        $page_name = "ArabWorkers | Admin Panel - Active Tasks";
        $main_breadcrumb = "Tasks";
        $sub_breadcrumb = "ActiveTasks";
        $data = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
        ])->with('category', 'TaskStatuses.status')->get();

        $active = Status::withoutTrashed()->where('name', 'active')->first();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $active->name) {
                $array_of_active_tasks [] = $data[$i];
            }
        }
        if (isset($array_of_active_tasks)) {
            $activeTasks = $array_of_active_tasks;
        } else {
            $activeTasks = [];
        }
        return view('admin::layouts.task.ActiveTasks', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'activeTasks',
        ]));

    }

    public function getActiveTaskDetailsUsingAjax(Request $request)
    {
        $data = Task::withoutTrashed()->select('id', 'total_worker_limit', 'task_end_date')->findOrFail($request->task_id);
        return response()->json($data);
    }

    public function deferredActiveTask(AdminDeferredActiveTaskRequest $request, $task_id)
    {
        $validated = $request->validated();
        $active = Status::withoutTrashed()->where('name', 'active')->first();
        $task = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
        ])->with('TaskStatuses.status')->findOrFail($validated['task_plus_date_id']);
        if ($task->TaskStatuses()->with('status')->latest()->first()->status->name == $active->name) {
            $old_task_end_date = Carbon::createFromFormat('Y-m-d', $task->task_end_date);
            $new_task_end_date = Carbon::createFromFormat('Y-m-d', $validated['new_end_date']);
            $duration_of_defer = $old_task_end_date->diffInDays($new_task_end_date);
            DeferredTask::create([
                'task_id' => $task->id,
                'main_end_date' => $task->task_end_date,
                'new_end_date' => $validated['new_end_date'],
                'main_total_worker_limit' => $task->total_worker_limit,
                'new_total_worker_limit' => $validated['new_total_worker_limit'],
                'reason_of_defer' => $validated['reason_of_task_defer'],
                'duration_of_defer' => $duration_of_defer,
            ]);
            $task->update([
                'task_end_date'=>$validated['new_end_date'],
                'total_worker_limit'=>$validated['new_total_worker_limit'],
            ]);
              alert()->toast(trans('admin::task.The task has been postponed or its number of workers has been increased'), 'success');
            return redirect()->route('admin.show.task.in.active.status');
        } else {
            alert()->toast(trans('employer::task.An error has occurred, please try again later'), 'error');
            return redirect()->route('admin.show.task.in.active.status');
        }

    }

    public function activeTaskDetails($task_id, $task_number)
    {
        $page_name = "ArabWorkers | Admin Panel - Active Task Details";
        $main_breadcrumb = "Active Tasks";
        $sub_breadcrumb = "ActiveTaskDetails";
        $task = Task::withoutTrashed()->where([
            ['task_number', $task_number],
            ['publish_status', 'Published'],
        ])->with('countries.country', 'cities.city', 'category', 'workflows', 'actions.categoryAction', 'TaskStatuses.status')->findOrFail($task_id);
        $active = Status::withoutTrashed()->where('name', 'active')->first();
        if ($task->TaskStatuses()->latest()->first()->task_status_id == $active->id) {
            $app_local = app()->getLocale();

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
            return view('admin::layouts.task.ActiveTaskDetails', compact([
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
                'task',
                'result',
                'app_local',
            ]));
        } else {
            alert()->toast(trans('employer::task.An error has occurred, please try again later'), 'error');
            return redirect()->back();
        }
    }

    public function activeTaskProofs($task_id, $task_number)
    {
        $page_name = "ArabWorkers | Admin Panel - Active Tasks Proofs";
        $main_breadcrumb = "Active Tasks Proofs";
        $sub_breadcrumb = "Proofs";


        $task = Task::withoutTrashed()->where([
            ['task_number', $task_number],
            ['publish_status', 'Published'],
        ])->with('category')->findOrFail($task_id);
        $active = Status::withoutTrashed()->where('name', 'active')->first();

        if ($task->TaskStatuses()->with('status')->latest()->first()->status->name == $active->name) {
            $proofs = $task->proofs()->with('worker')->get();
            return view('admin::layouts.task.ActiveTaskProofs', compact([
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
                'proofs',
                'task',

            ]));

        } else {
            alert()->toast(trans('employer::task.An error has occurred, please try again later'), 'error');
            return redirect()->back();
        }

    }

    public function activeTaskProofDetails($task_id, $proof_id)
    {
        $page_name = "ArabWorkers | Admin Panel - Active Tasks Proof Details";
        $main_breadcrumb = "Tasks Proof details";
        $sub_breadcrumb = "Proof Details";

        $task = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
        ])->findOrFail($task_id);
        $active = Status::withoutTrashed()->where('name', 'active')->first();

        if ($task->TaskStatuses()->with('status')->latest()->first()->status->name == $active->name) {
            $proof = TaskProof::withoutTrashed()->where([
                ['task_id', $task->id],
            ])->findOrFail($proof_id);
            return view('admin::layouts.task.ActiveTaskProofDetails', compact([
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
                'proof',
                'task',

            ]));
        } else {
            alert()->toast(trans('admin::task.An error has occurred, please try again later'), 'error');
            return redirect()->back();
        }
    }

    public function acceptTaskProof($task_id, $task_number, $proof_id, $worker_id, $employer_id)
    {
//        dd($task_id, $task_number, $proof_id, $worker_id, $employer_id);
        $task = Task::withoutTrashed()->where([
            ['employer_id', $employer_id],
            ['task_number', $task_number],
            ['publish_status', 'Published'],
        ])->findOrFail($task_id);
        $status = Status::withoutTrashed()->get();
        $active = $status->where('name', 'active')->first();

        if ($task->TaskStatuses()->with('status')->latest()->first()->status->name == $active->name) {
            $proof = TaskProof::withoutTrashed()->where([
                ['task_id', $task->id],
                ['employer_id', $task->employer_id],
                ['worker_id', $worker_id],
                ['isAdminAcceptProof', 'NotSeenYet'],
            ])->findOrFail($proof_id);
            $proof->update([
                'isAdminAcceptProof' => 'Yes',
            ]);
            alert()->toast(trans('employer::task.The proofs submitted by this worker have been successfully confirmed'), 'success');
            return redirect()->route('admin.show.active.tasks.proofs', [$task->id, $task->task_number]);

        } else {
            alert()->toast(trans('employer::task.An error has occurred, please try again later'), 'error');
            return redirect()->route('admin.show.active.tasks.proofs', [$task->id, $task->task_number]);

        }
    }

    public function rejectTaskProof(RejectTaskProofRequest $request, $task_id, $task_number, $proof_id, $worker_id)
    {
        $validated = $request->validated();
        $task = Task::withoutTrashed()->where([
            ['employer_id', $worker_id],
            ['task_number', $task_number],
            ['publish_status', 'Published'],
        ])->findOrFail($task_id);
        $status = Status::withoutTrashed()->get();
        $active = $status->where('name', 'active')->first();

        if ($task->TaskStatuses()->with('status')->latest()->first()->status->name == $active->name) {
            $proof = TaskProof::withoutTrashed()->where([
                ['task_id', $task->id],
                ['employer_id', $task->employer_id],
                ['worker_id', $worker_id],
                ['isAdminAcceptProof', 'NotSeenYet'],
            ])->findOrFail($proof_id);
            $proof->update([

                'isAdminAcceptProof' => 'No',
                'reasonOfAdminRefuse' => $validated['reasonOfReject'],

            ]);

            alert()->toast(trans('employer::task.The proofs submitted by this worker have been successfully rejected'), 'info');
            return redirect()->route('admin.show.active.tasks.proofs', [$task->id, $task->task_number]);

        } else {
            alert()->toast(trans('employer::task.An error has occurred, please try again later'), 'error');
            return redirect()->route('admin.show.active.tasks.proofs', [$task->id, $task->task_number]);

        }
    }

    public function showCompleteTasks()
    {
        $page_name = "ArabWorkers | Admin Panel - Complete Tasks";
        $main_breadcrumb = "Tasks";
        $sub_breadcrumb = "CompleteTasks";
        $data = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
        ])->with('category', 'TaskStatuses.status')->get();

        $complete = Status::withoutTrashed()->where('name', 'completed')->first();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $complete->name) {
                $array_of_completed_tasks [] = $data[$i];
            }
        }
        if (isset($array_of_completed_tasks)) {
            $completeTasks = $array_of_completed_tasks;
        } else {
            $completeTasks = [];
        }
        return view('admin::layouts.task.CompleteTasks', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'completeTasks',
        ]));
    }

    public function completeTaskDetails($task_id, $task_number)
    {
        $page_name = "ArabWorkers | Admin Panel - Complete Task Details";
        $main_breadcrumb = "Complete Tasks";
        $sub_breadcrumb = "CompleteTaskDetails";
        $task = Task::withoutTrashed()->where([
            ['task_number', $task_number],
            ['publish_status', 'Published'],
        ])->with('countries.country', 'cities.city', 'category', 'workflows', 'actions.categoryAction', 'TaskStatuses.status')->findOrFail($task_id);
        $complete = Status::withoutTrashed()->where('name', 'completed')->first();

        if ($task->TaskStatuses()->latest()->first()->task_status_id == $complete->id) {
            $app_local = app()->getLocale();

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
            return view('admin::layouts.task.CompleteTaskDetails', compact([
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
                'task',
                'result',
                'app_local',
            ]));
        } else {
            alert()->toast(trans('employer::task.An error has occurred, please try again later'), 'error');
            return redirect()->back();
        }
    }

    public function completeTaskProofs($task_id, $task_number)
    {
        $page_name = "ArabWorkers | Admin Panel - Complete Tasks Proofs";
        $main_breadcrumb = "Complete Tasks Proofs";
        $sub_breadcrumb = "Proofs";


        $task = Task::withoutTrashed()->where([
            ['task_number', $task_number],
            ['publish_status', 'Published'],
        ])->with('category')->findOrFail($task_id);
        $complete = Status::withoutTrashed()->where('name', 'completed')->first();

        if ($task->TaskStatuses()->with('status')->latest()->first()->status->name == $complete->name) {
            $proofs = $task->proofs()->with('worker')->get();
            return view('admin::layouts.task.CompleteTaskProofs', compact([
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
                'proofs',
                'task',

            ]));

        } else {
            alert()->toast(trans('employer::task.An error has occurred, please try again later'), 'error');
            return redirect()->back();
        }

    }

    public function completeTaskProofDetails($task_id, $proof_id)
    {
        $page_name = "ArabWorkers | Admin Panel - Complete Tasks Proof Details";
        $main_breadcrumb = "Complete Tasks Proof details";
        $sub_breadcrumb = "Proof Details";

        $task = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
        ])->findOrFail($task_id);
        $complete = Status::withoutTrashed()->where('name', 'completed')->first();

        if ($task->TaskStatuses()->with('status')->latest()->first()->status->name == $complete->name) {
            $proof = TaskProof::withoutTrashed()->where([
                ['task_id', $task->id],
            ])->findOrFail($proof_id);
            return view('admin::layouts.task.CompleteTaskProofDetails', compact([
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
                'proof',
                'task',

            ]));
        } else {
            alert()->toast(trans('employer::task.An error has occurred, please try again later'), 'error');
            return redirect()->back();
        }
    }


    public function showRejectedTasks()
    {
        $page_name = "ArabWorkers | Admin Panel - Rejected Tasks";
        $main_breadcrumb = "Tasks";
        $sub_breadcrumb = "RejectedTasks";
        $data = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
        ])->with('category', 'TaskStatuses.status')->get();
        $adminRefusalTask = Status::withoutTrashed()->where('name', 'adminRefusalTask')->first();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $adminRefusalTask->name) {
                $array_of_rejected_tasks [] = $data[$i];
            }
        }
        if (isset($array_of_rejected_tasks)) {
            $rejectedTasks = $array_of_rejected_tasks;
        } else {
            $rejectedTasks = [];
        }
        return view('admin::layouts.task.RejectedTasks', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'rejectedTasks',
        ]));
    }

    public function rejectedTaskDetails($task_id, $task_number)
    {
        $page_name = "ArabWorkers | Admin Panel - Rejected Task Details";
        $main_breadcrumb = "Rejected Tasks";
        $sub_breadcrumb = "RejectedTaskDetails";
        $task = Task::withoutTrashed()->where([
            ['task_number', $task_number],
            ['publish_status', 'Published'],
        ])->with('countries.country', 'cities.city', 'category', 'workflows', 'actions.categoryAction', 'TaskStatuses')->findOrFail($task_id);

        $adminRefusalTask = Status::withoutTrashed()->where('name', 'adminRefusalTask')->first();
        if ($task->TaskStatuses()->latest()->first()->task_status_id == $adminRefusalTask->id) {
            $app_local = app()->getLocale();

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
            return view('admin::layouts.task.RejectedTaskDetails', compact([
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
                'task',
                'result',
                'app_local',
            ]));
        } else {
            alert()->toast(trans('employer::task.An error has occurred, please try again later'), 'error');
            return redirect()->back();
        }


    }

}
