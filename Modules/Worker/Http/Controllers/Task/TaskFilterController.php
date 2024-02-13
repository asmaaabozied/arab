<?php

namespace Modules\Worker\Http\Controllers\Task;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Task\Entities\Task;
use Nwidart\Modules\Collection;

class TaskFilterController extends Controller
{
    public function now()
    {
        $now = Carbon::now();
        return $now;
    }

    public function ajaxSearch(Request $request)
    {
        $query = $request->input('query');
        $now = $this->now();
        $all_tasks = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
            ['task_end_date', '>=', $now],
            ['is_hidden', 'false'],
            ['title', 'like', '%' . $query . '%']
        ])->orWhere([
            ['publish_status', 'Published'],
            ['task_end_date', '>=', $now],
            ['is_hidden', 'false'],
            ['description', 'like', '%' . $query . '%'],
        ])->with('countries.country', 'category')->get();

        for ($i = 0; $i < count($all_tasks); $i++) {
            if ($all_tasks[$i]->total_worker_limit > $all_tasks[$i]->approved_workers) {
                $array_of_available_task [] = $all_tasks[$i];
            }
        }
        if (isset($array_of_available_task)) {
            for ($i = 0; $i < count($array_of_available_task); $i++) {
                $check_status_featured_tasks [] = $array_of_available_task[$i]->TaskStatuses()->with('status')->latest()->first();
                if ($check_status_featured_tasks[$i]->status->name == "active") {
                    $array_of_active_tasks [] = $array_of_available_task[$i];
                }
            }
            if (isset($array_of_active_tasks)) {
                $tasks = $array_of_active_tasks;
            } else {
                $tasks = [];
            }
        } else {
            $tasks = [];
        }

        return response()->json($tasks);
    }

    public function sortTasks($sortType)
    {
        $now = $this->now();
        $all_tasks = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
            ['task_end_date', '>=', $now],
            ['deleted_at', null],
            ['is_hidden', 'false'],
        ])->with('countries.country', 'category')->get();
        for ($i = 0; $i < count($all_tasks); $i++) {
            if ($all_tasks[$i]->total_worker_limit > $all_tasks[$i]->approved_workers) {
                $array_of_available_task [] = $all_tasks[$i];
            }
        }
        if (isset($array_of_available_task)) {
            for ($i = 0; $i < count($array_of_available_task); $i++) {
                $check_status_featured_tasks [] = $array_of_available_task[$i]->TaskStatuses()->with('status')->latest()->first();
                if ($check_status_featured_tasks[$i]->status->name == "active") {
                    $array_of_active_tasks [] = $array_of_available_task[$i];
                }
            }
            if (isset($array_of_active_tasks)) {
                $tasks = $array_of_active_tasks;
                $collection = new Collection($tasks);
            } else {
                $tasks = [];
                $collection = new Collection($tasks);
            }
        } else {
            $tasks = [];
            $collection = new Collection($tasks);
        }

        switch ($sortType) {
            case 'oldest':
                $tasks = $collection->sortBy('created_at')->values()->all();
                break;
            case 'newest':
                $tasks = $collection->sortByDesc('created_at')->values()->all();
                break;
            case 'cheapest':
                $tasks = $collection->sortBy('total_cost')->values()->all();
                break;
            case 'expensive':
                $tasks = $collection->sortByDesc('total_cost')->values()->all();
                break;

            case 'workerAccept':
                $tasks = $collection->sortBy('approved_workers')->values()->all();
                break;
        }
        return response()->json($tasks);
    }

    public function categoryTasks($categoryType)
    {
        $now = $this->now();
        $all_tasks = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
            ['task_end_date', '>=', $now],
            ['deleted_at', null],
            ['category_id', $categoryType],
            ['is_hidden', 'false'],
        ])->with('countries.country', 'category')->get();
        for ($i = 0; $i < count($all_tasks); $i++) {
            if ($all_tasks[$i]->total_worker_limit > $all_tasks[$i]->approved_workers) {
                $array_of_available_task [] = $all_tasks[$i];
            }
        }
        if (isset($array_of_available_task)) {
            for ($i = 0; $i < count($array_of_available_task); $i++) {
                $check_status_featured_tasks [] = $array_of_available_task[$i]->TaskStatuses()->with('status')->latest()->first();
                if ($check_status_featured_tasks[$i]->status->name == "active") {
                    $array_of_active_tasks [] = $array_of_available_task[$i];
                }
            }
            if (isset($array_of_active_tasks)) {
                $tasks = $array_of_active_tasks;
            } else {
                $tasks = [];
            }
        } else {
            $tasks = [];
        }
        return response()->json($tasks);
    }

    public function levelTasks($levelType)
    {
        $now = $this->now();
        if ($levelType == "professional") {
            $is_professional = "true";
        } else {
            $is_professional = "false";
        }
        $all_tasks = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
            ['task_end_date', '>=', $now],
            ['deleted_at', null],
            ['is_hidden', 'false'],
            ['only_professional', $is_professional],
        ])->with('countries.country', 'category')->get();
        for ($i = 0; $i < count($all_tasks); $i++) {
            if ($all_tasks[$i]->total_worker_limit > $all_tasks[$i]->approved_workers) {
                $array_of_available_task [] = $all_tasks[$i];
            }
        }
        if (isset($array_of_available_task)) {
            for ($i = 0; $i < count($array_of_available_task); $i++) {
                $check_status_featured_tasks [] = $array_of_available_task[$i]->TaskStatuses()->with('status')->latest()->first();
                if ($check_status_featured_tasks[$i]->status->name == "active") {
                    $array_of_active_tasks [] = $array_of_available_task[$i];
                }
            }
            if (isset($array_of_active_tasks)) {
                $tasks = $array_of_active_tasks;
            } else {
                $tasks = [];
            }
        } else {
            $tasks = [];
        }
        return response()->json($tasks);
    }

    public function countryTasks($countryType)
    {
        $now = $this->now();
        if ($countryType == "AllCountryFilterBtn") {
            $all_tasks = Task::withoutTrashed()->where([
                ['publish_status', 'Published'],
                ['task_end_date', '>=', $now],
                ['deleted_at', null],
                ['is_hidden', 'false'],
            ])->with('countries.country', 'category')->get();
        } else {
            $all_tasks = Task::withoutTrashed()->where([
                ['publish_status', 'Published'],
                ['task_end_date', '>=', $now],
                ['deleted_at', null],
                ['is_hidden', 'false'],
            ])->with('countries.country', 'category')
                ->whereHas('countries', function ($query) use ($countryType) {
                    $query->where('country_id', $countryType);
                })
                ->get();
        }

        for ($i = 0; $i < count($all_tasks); $i++) {
            if ($all_tasks[$i]->total_worker_limit > $all_tasks[$i]->approved_workers) {
                $array_of_available_task [] = $all_tasks[$i];
            }
        }
        if (isset($array_of_available_task)) {
            for ($i = 0; $i < count($array_of_available_task); $i++) {
                $check_status_featured_tasks [] = $array_of_available_task[$i]->TaskStatuses()->with('status')->latest()->first();
                if ($check_status_featured_tasks[$i]->status->name == "active") {
                    $array_of_active_tasks [] = $array_of_available_task[$i];
                }
            }
            if (isset($array_of_active_tasks)) {
                $tasks = $array_of_active_tasks;
            } else {
                $tasks = [];
            }
        } else {
            $tasks = [];
        }
        return response()->json($tasks);
    }

    public function rangeTasks(Request $request)
    {
        $now = $this->now();
        $all_tasks = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
            ['task_end_date', '>=', $now],
            ['deleted_at', null],
            ['is_hidden', 'false'],
        ])->whereBetween('total_cost', [$request->minPrice, $request->selectedVal])->with('countries.country', 'category')->orderBy('total_cost')->get();
        for ($i = 0; $i < count($all_tasks); $i++) {
            if ($all_tasks[$i]->total_worker_limit > $all_tasks[$i]->approved_workers) {
                $array_of_available_task [] = $all_tasks[$i];
            }
        }
        if (isset($array_of_available_task)) {
            for ($i = 0; $i < count($array_of_available_task); $i++) {
                $check_status_featured_tasks [] = $array_of_available_task[$i]->TaskStatuses()->with('status')->latest()->first();
                if ($check_status_featured_tasks[$i]->status->name == "active") {
                    $array_of_active_tasks [] = $array_of_available_task[$i];
                }
            }
            if (isset($array_of_active_tasks)) {
                $tasks = $array_of_active_tasks;
            } else {
                $tasks = [];
            }
        } else {
            $tasks = [];
        }
        return response()->json($tasks);
    }

}
