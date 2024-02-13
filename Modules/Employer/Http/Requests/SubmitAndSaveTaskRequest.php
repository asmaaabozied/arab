<?php

namespace Modules\Employer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Task\Entities\Task;

class SubmitAndSaveTaskRequest extends FormRequest
{
    public function task (){
        $parameters = $this->route()->parameters();
        $task = Task::withoutTrashed()->where([
            ['id',$parameters['task_id']],
            ['task_number',$parameters['task_number']],
        ])->first();

        return $task;
    }
    public function rules()
    {
        $task = $this->task();
        return [
            'new_minimum_cost_per_worker' => ['required', 'gte:' . $task->cost_per_worker,'max:2147483647'],
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
            'new_minimum_cost_per_worker.required' => trans('dashboard::validation.required'),
            'new_minimum_cost_per_worker.gte' => trans('dashboard::validation.gte'),
            'new_minimum_cost_per_worker.max' => trans('dashboard::validation.max'),

        ];

    }
}
