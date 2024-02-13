<?php

namespace Modules\Worker\Http\Controllers\Task;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Category\Entities\Category;
use Modules\Currency\Entities\Currency;
use Modules\Region\Entities\City;
use Modules\Region\Entities\Country;
use Modules\Setting\Entities\Status;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskCity;
use Modules\Task\Entities\TaskProof;
use Modules\Task\Entities\TaskStatus;
use Modules\Task\Entities\TaskWorker;
use Modules\Worker\Entities\Worker;
use Modules\Worker\Http\Requests\FinishTaskJobRequest;
use Nwidart\Modules\Collection;

class TaskController extends Controller
{
    public function browseTask()
    {
        $page_name = "ArabWorkers | Worker Panel";
        $main_breadcrumb = "Worker Panel";
        $sub_breadcrumb = "Browse Tasks";
        $now = Carbon::now();
        $categories = Category::withoutTrashed()->get();
        $countries = Country::withoutTrashed()->get();

//        attentions: old method to getting futchered and normal tasks is below this page
        $array_of_tasks = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
            ['task_end_date', '>=', $now],
            ['deleted_at', null],
            ['is_hidden', 'false'],
        ])->with('countries.country', 'category')->orderBy('created_at', 'desc')->get();

        for ($i = 0; $i < count($array_of_tasks); $i++) {
            if ($array_of_tasks[$i]->total_worker_limit > $array_of_tasks[$i]->approved_workers) {
                $array_of_available_tasks [] = $array_of_tasks[$i];
            }
        }

        if (isset($array_of_available_tasks)) {
            for ($i = 0; $i < count($array_of_available_tasks); $i++) {
                $check_status_available_tasks [] = $array_of_available_tasks[$i]->TaskStatuses()->with('status')->latest()->first();
                if ($check_status_available_tasks[$i]->status->name == "active") {
                    $array_of_active_and_available_tasks [] = $array_of_available_tasks[$i];
                }
            }
            if (isset($array_of_active_and_available_tasks)) {
                $all_tasks = $array_of_active_and_available_tasks;
                $collection = new Collection($all_tasks);
            } else {
                $all_tasks = [];
                $collection = new Collection($all_tasks);
            }
        } else {
            $all_tasks = [];
            $collection = new Collection($all_tasks);
        }
        $specialToNormalAccessTasks = $collection->sortByDesc('special_access')->values()->all();
        $totalCosts = array_column($specialToNormalAccessTasks, 'total_cost');
        if ($totalCosts == null) {
            $min_total_costs = 0;
            $max_total_costs = 0;
        } else {
            $min_total_costs = min($totalCosts);
            $max_total_costs = max($totalCosts);
        }
        $current_currency=Currency::first();
//        dd($totalCosts, $min_total_costs, $max_total_costs);
        return view('worker::layouts.task.browseTask', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'categories',
            'countries',
            'specialToNormalAccessTasks',
            'min_total_costs',
            'max_total_costs',
            'current_currency'
        ]));
    }

    public function showTaskDetails($task_id, $task_number)
    {

        $page_name = "ArabWorkers | Worker Panel - Preview Task";
        $main_breadcrumb = "Tasks";
        $sub_breadcrumb = "TaskDetails";
        $app_local = app()->getLocale();
        $task = Task::where([
            ['task_number', $task_number],
            ['id', $task_id],
            ['is_hidden', 'false'],
        ])->with('countries.country', 'cities.city', 'category', 'workflows', 'actions.categoryAction')->firstOrFail();

        $count_of_today_workers = $task->workers()->where([
            ['task_id', $task->id],
        ])->whereDate('created_at',Carbon::today())->count();
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
        return view('worker::layouts.task.taskDetails', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'task',
            'result',
            'app_local',
            'count_of_today_workers',

        ]));
    }

    public function orderToTaskDone($task_id, $task_number)
    {
        $now = Carbon::now()->format('Y-m-d');
        $task = Task::withoutTrashed()->where([
            ['task_number', $task_number],
            ['publish_status', 'Published'],
            ['task_end_date', '>=', $now],
            ['is_hidden', 'false'],
        ])->findOrFail($task_id);
        $worker = Worker::withoutTrashed()->findOrFail(auth()->user()->id);

        /**
         * In this step, we will make sure that the task is not restricted to the number of daily workers
         */
        if ($task->daily_limit == null){
            $check_if_ordered = TaskWorker::withoutTrashed()->where([
                ['task_id', $task_id,],
                ['worker_id', auth()->user()->id,],
            ])->count();

            /**
             * the worker must be levies in any of task cities,
             * and if worker levies in Dubai and task cities doesn't have Dubai city must not accept order to do this task
             * in the below steep we have check this condition
             **/
            $task_cities = $task->cities()->select('city_id')->get()->toArray();
            for ($i = 0; $i < count($task_cities); $i++) {
                if ($task_cities[$i]['city_id'] == auth()->user()->city_id) {
                    $check_if_worker_levies_in_any_task_city [] = true;
                } else {
                    $check_if_worker_levies_in_any_task_city [] = false;
                }
            }
            /**
             * if array_sum($check_if_worker_levies_in_any_task_city) = 1 that mean we have one true result and condition true
             **/
            if ($task->only_professional == "false") {
                /**
                 * In this case, the task will be downed from all workers levels,
                 * So all workers who meet the previous conditions such as city and non-disabled .... can apply to accomplish this task
                 */
                if ($check_if_ordered == 0) {
                    if (array_sum($check_if_worker_levies_in_any_task_city) == 1)
                        if ($task->total_worker_limit > $task->approved_workers) {
                            TaskWorker::create([
                                'task_id' => $task_id,
                                'worker_id' => auth()->user()->id,
                            ]);
                            $task->update([
                                'approved_workers' => $task->approved_workers + 1
                            ]);
                            alert()->success('success',trans('worker::task.You have successfully ordered to completed this task'));
                            return redirect()->route('worker.tasks.in.active');
                        } else {
                            alert()->error('Error',trans('worker::task.Enough workers have come forward to accomplish this task'));
                            return redirect()->back();
                        }
                    else {
                        alert()->warning('warning',trans('worker::task.you are not living in any of task city'));
                        return redirect()->back();
                    }

                } else {
                    alert()->error('error',trans('worker::task.have already applied for this task'));
                    return redirect()->back();
                }
            } else {
                /**
                 * In this case, the task will be downed from professional workers only,
                 * so the level of the advanced worker must be confirmed to accomplish this task
                 */
                $worker_level = $worker->level->name;
                /**
                 * We have 4 level for workers:
                 * 1- New
                 * 2- Bronze
                 * 3- Silver
                 * 4- Golden
                 *
                 * when task workers must be only professional, worker level must be silver or golden level
                 **/
                if ($worker_level == "Silver" or $worker_level == "Golden") {
                    /**
                     * worker level is professional and that allowed to order to get this task
                     */
                    if ($check_if_ordered == 0) {
                        if (array_sum($check_if_worker_levies_in_any_task_city) == 1)
                            if ($task->total_worker_limit > $task->approved_workers) {
                                TaskWorker::create([
                                    'task_id' => $task_id,
                                    'worker_id' => auth()->user()->id,
                                ]);
                                $task->update([
                                    'approved_workers' => $task->approved_workers + 1
                                ]);
                                alert()->success('success',trans('worker::task.You have successfully ordered to completed this task'));
                                return redirect()->route('worker.tasks.in.active');
                            } else {
                                alert()->error('Error',trans('worker::task.Enough workers have come forward to accomplish this task'));
                                return redirect()->back();
                            }
                        else {
                            alert()->warning('warning',trans('worker::task.you are not living in any of task city'));
                            return redirect()->back();
                        }

                    } else {
                        alert()->error('Error',trans('worker::task.have already applied for this task'));
                        return redirect()->back();
                    }

                } else {
                    /**
                     * worker level is ---not professional---
                     */
                    alert()->error('Error',trans('worker::task.This task is for professional workers only'));
                    return redirect()->back();
                }
            }


        }else{

            $count_of_today_worker = TaskWorker::withoutTrashed()->where([
                ['task_id', $task->id],
            ])->whereDate('created_at',Carbon::today())->count();
            $worker_limit = $task->daily_limit;
//            dd($count_of_today_worker, $worker_limit,$worker_limit > $count_of_today_worker);
            if ($worker_limit > $count_of_today_worker){
                $check_if_ordered = TaskWorker::withoutTrashed()->where([
                    ['task_id', $task_id,],
                    ['worker_id', auth()->user()->id,],
                ])->count();
                /**
                 * the worker must be levies in any of task cities,
                 * and if worker levies in Dubai and task cities doesn't have Dubai city must not accept order to do this task
                 * in the below steep we have check this condition
                 **/
                $task_cities = $task->cities()->select('city_id')->get()->toArray();
                for ($i = 0; $i < count($task_cities); $i++) {
                    if ($task_cities[$i]['city_id'] == auth()->user()->city_id) {
                        $check_if_worker_levies_in_any_task_city [] = true;
                    } else {
                        $check_if_worker_levies_in_any_task_city [] = false;
                    }
                }
                /**
                 * if array_sum($check_if_worker_levies_in_any_task_city) = 1 that mean we have one true result and condition true
                 **/
                if ($task->only_professional == "false") {
                    /**
                     * In this case, the task will be downed from all workers levels,
                     * So all workers who meet the previous conditions such as city and non-disabled .... can apply to accomplish this task
                     */
                    if ($check_if_ordered == 0) {
                        if (array_sum($check_if_worker_levies_in_any_task_city) == 1)
                            if ($task->total_worker_limit > $task->approved_workers) {
                                TaskWorker::create([
                                    'task_id' => $task_id,
                                    'worker_id' => auth()->user()->id,
                                ]);
                                $task->update([
                                    'approved_workers' => $task->approved_workers + 1
                                ]);
                                alert()->success('success',trans('worker::task.You have successfully ordered to completed this task'));
                                return redirect()->route('worker.tasks.in.active');
                            } else {
                                alert()->error('Error',trans('worker::task.Enough workers have come forward to accomplish this task'));
                                return redirect()->back();
                            }
                        else {
                            alert()->warning('warning',trans('worker::task.you are not living in any of task city'));
                            return redirect()->back();
                        }

                    } else {
                        alert()->error('error',trans('worker::task.have already applied for this task'));
                        return redirect()->back();
                    }
                } else {
                    /**
                     * In this case, the task will be downed from professional workers only,
                     * so the level of the advanced worker must be confirmed to accomplish this task
                     */
                    $worker_level = $worker->level->name;
                    /**
                     * We have 4 level for workers:
                     * 1- New
                     * 2- Bronze
                     * 3- Silver
                     * 4- Golden
                     *
                     * when task workers must be only professional, worker level must be silver or golden level
                     **/
                    if ($worker_level == "Silver" or $worker_level == "Golden") {
                        /**
                         * worker level is professional and that allowed to order to get this task
                         */
                        if ($check_if_ordered == 0) {
                            if (array_sum($check_if_worker_levies_in_any_task_city) == 1)
                                if ($task->total_worker_limit > $task->approved_workers) {
                                    TaskWorker::create([
                                        'task_id' => $task_id,
                                        'worker_id' => auth()->user()->id,
                                    ]);
                                    $task->update([
                                        'approved_workers' => $task->approved_workers + 1
                                    ]);
                                    alert()->success('success',trans('worker::task.You have successfully ordered to completed this task'));
                                    return redirect()->route('worker.tasks.in.active');
                                } else {
                                    alert()->error('error',trans('worker::task.Enough workers have come forward to accomplish this task'));
                                    return redirect()->back();
                                }
                            else {
                                alert()->warning('warning',trans('worker::task.you are not living in any of task city'));
                                return redirect()->back();
                            }

                        } else {
                            alert()->error('error',trans('worker::task.have already applied for this task'));
                            return redirect()->back();
                        }

                    } else {
                        /**
                         * worker level is ---not professional---
                         */
                        alert()->error('Error',trans('worker::task.This task is for professional workers only'));
                        return redirect()->back();
                    }
                }
            }else{
                alert()->warning('warning',trans('worker::task.The number of workers who applied to complete this task has reached the required limit, try to apply to complete the task again at 00:01 am local time'));
                return redirect()->back();
            }

        }





    }


    public function tasksInActive()
    {
        $page_name = "ArabWorkers | Worker Panel - Task in active";
        $main_breadcrumb = "Tasks";
        $sub_breadcrumb = "TaskInActive";
        $data = TaskWorker::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
            ['is_proof_uploaded', 'false'],
        ])->with('task.category')->get();
        return view('worker::layouts.task.tasksInActive', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',

        ]));
    }


    public function showTaskInActiveDetails($task_id, $task_number)
    {
        $page_name = "ArabWorkers | Worker Panel - Task in Active details";
        $main_breadcrumb = "Active Tasks";
        $sub_breadcrumb = "TaskInActiveDetails";
        $app_local = app()->getLocale();
        $data = Task::withoutTrashed()->where('task_number', $task_number)->with('category', 'workflows', 'actions.categoryAction')->find($task_id);
        $task_statuses = $data->TaskStatuses()->with('status')->get();
        if ($task_statuses->last()->status->name == "active") {
            for ($i = 0; $i < count($data->countries); $i++) {
                $country [$data->countries[$i]->country_id] = City::withoutTrashed()->where('country_id', $data->countries[$i]->country_id)->count();
            }
            for ($i = 0; $i < count($data->countries); $i++) {
                for ($j = 0; $j < count($data->cities); $j++) {
                    if ($data->cities[$j]->city->country_id == $data->countries[$i]->country_id)
                        $region [$data->countries[$i]->country_id] [] = $data->cities[$j]->city->id;
                }
            }
            $keys = array_keys($country);

            for ($i = 0; $i < count($keys); $i++) {
                if (count($region[$keys[$i]]) == $country[$keys[$i]]) {
                    if ($app_local == "ar") {
                        $result [] = [
                            'country' => $data->countries[$i]->country->ar_name,
                            'flag' => $data->countries[$i]->country->flag,
                            'cities' => 'all_cities'
                        ];
                    } else {
                        $result [] = [
                            'country' => $data->countries[$i]->country->name,
                            'flag' => $data->countries[$i]->country->flag,
                            'cities' => 'all_cities'
                        ];
                    }


                } else {
                    if ($app_local == "ar") {
                        $result [] = [
                            'country' => $data->countries[$i]->country->ar_name,
                            'flag' => $data->countries[$i]->country->flag,
                            'cities' => $region[$keys[$i]],
                        ];
                    } else {
                        $result [] = [
                            'country' => $data->countries[$i]->country->name,
                            'flag' => $data->countries[$i]->country->flag,
                            'cities' => $region[$keys[$i]],
                        ];
                    }

                }
            }
            return view('worker::layouts.task.taskInActiveDetails', compact([
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
                'data',
                'task_statuses',
                'result',
                'app_local',

            ]));
        } else {
            alert()->error('Error',trans('worker::task.An error has occurred Please try again later'));
            return redirect()->back();
        }

    }

    public function showFinishTaskJobForm($task_id, $task_number)
    {
        $page_name = "ArabWorkers | Worker Panel - Finish Task Job";
        $main_breadcrumb = "Upload Proof Tasks";
        $sub_breadcrumb = "FinishTaskJob";
        $task = Task::withoutTrashed()->select('id', 'task_number')->where('task_number', $task_number)->findOrFail($task_id);
        $data = TaskWorker::withoutTrashed()->where([
            ['task_id', $task->id],
            ['worker_id', auth()->user()->id],
        ])->with('task')->firstOrFail();
        return view('worker::layouts.task.finishTaskJob', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
        ]));

    }

    public function finishTaskJob(FinishTaskJobRequest $request, $task_id, $task_number)
    {

        $data = TaskWorker::withoutTrashed()->where([
            ['task_id', $task_id],
            ['worker_id', auth()->user()->id],
        ])->with('task')->firstOrFail();

        $validated = $request->validated();
        if (array_key_exists('description', $validated)) {
            $description = $validated['description'];
        } else {
            $description = null;
        }

        $check_uploaded_proof = TaskProof::withoutTrashed()->where([
            ['task_id', $data->task_id],
            ['worker_id', $data->worker_id],
            ['employer_id', $data->task->employer_id],

        ])->get();
        if (isset($check_uploaded_proof) and count($check_uploaded_proof) >= 1) {
            alert()->warning('warning',trans('worker::task.I have actually completed the task and sent the proof of completion earlier'));
            return redirect()->back();
        } else {
            if (array_key_exists('screenshot', $validated)) {
                $image = $validated['screenshot']->store('Task/Proofs', 'public');
            } else {
                $image = null;
            }
            TaskProof::create([
                'task_id' => $data->task_id,
                'worker_id' => $data->worker_id,
                'employer_id' => $data->task->employer_id,
                'screenshot' => $image,
                'answer_text' => $validated['answer_text'],
                'description' => $description ?? '',
            ]);

            TaskWorker::withoutTrashed()->where([
                ['task_id', $data->task_id],
                ['worker_id', $data->worker_id],
            ])->update([
                'is_proof_uploaded' => 'true',
            ]);
            alert()->success('Success',trans('worker::task.Proof of completion has been sent successfully'));
            return redirect()->route('worker.tasks.in.done');
        }


    }

    public function taskInDone()
    {
        /***
         * this function well be show task after uploaded proof
         */
        $page_name = "ArabWorkers | Worker Panel - Task in done";
        $main_breadcrumb = "Done Tasks";
        $sub_breadcrumb = "TaskInDone";

        $data = TaskProof::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'NotSeenYet'],
            ['isAdminAcceptProof', 'NotSeenYet'],

        ])->with('task.category')->get();
        return view('worker::layouts.task.tasksInDone', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',

        ]));

    }

    public function showTaskInDoneDetails($task_id, $task_number)
    {
        $page_name = "ArabWorkers | Worker Panel - Task in Done Details";
        $main_breadcrumb = "Done Tasks";
        $sub_breadcrumb = "TaskInDoneDetails";
        $data = TaskWorker::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
            ['is_proof_uploaded', 'true'],
            ['task_id', $task_id],
        ])->with('task.category', 'task.TaskStatuses.status')->firstOrFail();

        $proof = TaskProof::withoutTrashed()->where([
            ['task_id', $data->task_id],
            ['worker_id', $data->worker_id],
            ['employer_id', $data->task->employer_id],
            ['isEmployerAcceptProof', 'NotSeenYet'],
            ['isAdminAcceptProof', 'NotSeenYet'],

        ])->firstOrFail();

        return view('worker::layouts.task.taskInDoneDetails', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'proof',

        ]));
    }

    public function taskInComplete()
    {
        /***
         *  this function well be show task after uploaded proof and accepted by Employer or Admin
         */
        $page_name = "ArabWorkers | Worker Panel - Task in Complete";
        $main_breadcrumb = "Complete Tasks";
        $sub_breadcrumb = "TaskInComplete";
        $data = TaskProof::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'Yes'],
            ['isAdminAcceptProof', 'Yes'],
        ])->orWhere([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'Yes'],
            ['isAdminAcceptProof', 'No'],
        ])->orWhere([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'Yes'],
            ['isAdminAcceptProof', 'NotSeenYet'],
        ])->with('task.category')->get();

        return view('worker::layouts.task.tasksInComplete', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',

        ]));
    }


    public function showTaskInCompleteDetails($task_id, $task_number)
    {
        $page_name = "ArabWorkers | Worker Panel - Task in Complete Details";
        $main_breadcrumb = "Complete Tasks";
        $sub_breadcrumb = "TaskInCompleteDetails";
        $data = TaskWorker::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
            ['is_proof_uploaded', 'true'],
            ['task_id', $task_id],
        ])->with('task.category', 'task.TaskStatuses.status')->firstOrFail();

        $proof = TaskProof::withoutTrashed()
            ->where([
                ['task_id', $data->task_id],
                ['worker_id', $data->worker_id],
                ['employer_id', $data->task->employer_id],
                ['isEmployerAcceptProof', 'Yes'],
                ['isAdminAcceptProof', 'Yes'],
            ])->orWhere([
                ['task_id', $data->task_id],
                ['worker_id', $data->worker_id],
                ['employer_id', $data->task->employer_id],
                ['isEmployerAcceptProof', 'Yes'],
                ['isAdminAcceptProof', 'No'],
            ])->orWhere([
                ['task_id', $data->task_id],
                ['worker_id', $data->worker_id],
                ['employer_id', $data->task->employer_id],
                ['isEmployerAcceptProof', 'Yes'],
                ['isAdminAcceptProof', 'NotSeenYet'],
            ])->firstOrFail();

        return view('worker::layouts.task.taskInCompeteDetails', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'proof',

        ]));
    }


    public function taskInRejected()
    {
        /**
         * this function well be show task after uploaded proof and rejected by Employer or Admin
         */
        $page_name = "ArabWorkers | Worker Panel - Task in Rejected";
        $main_breadcrumb = "Rejected Tasks";
        $sub_breadcrumb = "TaskInRejected";
        $data = TaskProof::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'No'],
            ['isAdminAcceptProof', 'No'],
        ])->orWhere([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'No'],
            ['isAdminAcceptProof', 'NotSeenYet'],
        ])->with('task.category')->get();
        return view('worker::layouts.task.tasksInRejected', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',

        ]));
    }


    public function showTaskInRejectedDetails($task_id, $task_number)
    {
        $page_name = "ArabWorkers | Worker Panel - Task in Rejected Details";
        $main_breadcrumb = "Rejected Tasks";
        $sub_breadcrumb = "TaskInRejectedDetails";
        $data = TaskWorker::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
            ['is_proof_uploaded', 'true'],
            ['task_id', $task_id],
        ])->with('task.category', 'task.TaskStatuses.status')->firstOrFail();

        $proof = TaskProof::withoutTrashed()
            ->where([
                ['task_id', $data->task_id],
                ['worker_id', $data->worker_id],
                ['employer_id', $data->task->employer_id],
                ['isEmployerAcceptProof', 'No'],
                ['isAdminAcceptProof', 'No'],
            ])->orWhere([
                ['task_id', $data->task_id],
                ['worker_id', $data->worker_id],
                ['employer_id', $data->task->employer_id],
                ['isEmployerAcceptProof', 'No'],
                ['isAdminAcceptProof', 'NotSeenYet'],
            ])->firstOrFail();

        return view('worker::layouts.task.taskInRejectedDetails', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'proof',

        ]));
    }
}
