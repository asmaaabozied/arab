<?php

namespace Modules\Admin\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Setting\Entities\Status;
use Modules\Task\Entities\Task;

class AdminDeferredActiveTaskRequest extends FormRequest
{
    public function task (){
        $parameters = $this->route()->parameters();
        $active = Status::withoutTrashed()->where('name', 'active')->first();
        $task = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
        ])->with('TaskStatuses.status')->findOrFail($parameters['task_id']);
        if ($task->TaskStatuses()->with('status')->latest()->first()->status->name == $active->name) {
            return $task;
        }else{
            return "error";
        }

    }
    public function rules()
    {
        $task = $this->task();

        return [
            'task_plus_date_id' => 'required|in:'.$task->id,
            'new_end_date' => 'required|date|after_or_equal:'.$task->task_end_date,
            'new_total_worker_limit' =>'required|numeric|max:2147483647|gte:'.$task->total_worker_limit,
            'reason_of_task_defer' => 'required|string|max:250|min:5',
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


            'new_end_date.required' => trans('dashboard::validation.required'),
            'new_end_date.date' => trans('dashboard::validation.date'),
            'new_end_date.after_or_equal' => trans('dashboard::validation.after_or_equal'),

            'new_total_worker_limit.required' => trans('dashboard::validation.required'),
            'new_total_worker_limit.numeric' => trans('dashboard::validation.numeric'),
            'new_total_worker_limit.max' => trans('dashboard::validation.max'),
            'new_total_worker_limit.gte' => trans('dashboard::validation.gte'),



            'reason_of_task_defer.required' => trans('dashboard::validation.required'),
            'reason_of_task_defer.string' => trans('dashboard::validation.string'),
            'reason_of_task_defer.max' => trans('dashboard::validation.max'),
            'reason_of_task_defer.min' => trans('dashboard::validation.min'),

            'task_plus_date_id.required' => trans('dashboard::validation.required'),
            'task_plus_date_id.in' => trans('dashboard::validation.in'),


        ];
    }
}
