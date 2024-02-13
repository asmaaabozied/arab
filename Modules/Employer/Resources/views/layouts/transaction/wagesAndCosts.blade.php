@extends('dashboard::layouts.employer.master')
@section('content')

    <div class="row bg-white mt-4">
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-list">
                    <thead class="thead-light">
                    <tr class="bg-table">
                        <th><span class="mx-2">#</span></th>
                        <th>{{trans('employer::employer.TaskDetails')}}</th>
                        <th>{{trans('employer::employer.TaskDiscounted')}}</th>
                        <th>{{trans('employer::employer.taskCost')}}</th>
                        <th>{{trans('employer::employer.otherCost')}}</th>
                        <th>{{trans('employer::employer.totalCost')}}</th>
                        <th>{{trans('employer::employer.taskPayedAt')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($tasks) and count($tasks) > 0)
                        <?php $count = 1?>
                        @foreach($tasks as $task)
                            <tr>
                                <td class="text-center text-sm">{{$count++}} </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex justify-content-center ">
                                        <div>
                                            @if($task->category->image != Null)
                                                <img src="{{Storage::url($task->category->image)}}"
                                                     class="avatar avatar-sm " alt="category icon">
                                            @else
                                                <img
                                                    src="{{Storage::url($task->category->image)}}"
                                                    class="avatar avatar-sm " alt="category icon">
                                            @endif
                                        </div>
                                        <div class="d-flex flex-column justify-content-around">
                                            <h6 class="mb-0 text-sm">{{ Str::words($task->title, 3,'...') }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$task->task_number}}</p>
                                        </div>
                                    </div>
                                </td>
                                @if($task->taskDiscounted()->exists() == true)
                                    <td class="text-sm text-center ">
                                        <div class="d-flex flex-column justify-content-around">
                                            <h6 class="mb-0 text-xs">{{trans('employer::employer.'.$task->taskDiscounted->discountCode->type)}}</h6>
                                            <p class="text-lg text-success mb-0">{{$task->taskDiscounted->discountCode->discount_amount}}%
                                               </p>
                                        </div>
                                    </td>
                                    @if($task->taskDiscounted->discountCode->type == "MainCosts")
                                        <td class="align-middle text-center text-sm">
                                             <span  class="text-success text-sm">
                                                 {{ convertCurrency($task->task_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                             </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                         {{ convertCurrency($task->other_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">

                                    {{ convertCurrency($task->total_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                        </td>
                                    @elseif($task->taskDiscounted->discountCode->type == "AdditionalCosts")
                                        <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                      {{ convertCurrency($task->task_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-success text-sm">
                                         {{ convertCurrency($task->other_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                           {{ convertCurrency($task->total_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                        </td>
                                    @elseif($task->taskDiscounted->discountCode->type == "TotalCosts")
                                        <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                    {{ convertCurrency($task->task_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                      {{ convertCurrency($task->other_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-success text-sm">
                                     {{ convertCurrency($task->total_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                        </td>
                                    @else
                                        <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                    {{ convertCurrency($task->task_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                    {{ convertCurrency($task->other_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                     {{ convertCurrency($task->total_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                        </td>
                                    @endif
                                @else
                                    <td class="text-sm text-center ">
                                        <span
                                            class="badge badge-warning">{{trans('employer::employer.NotDiscounted')}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                        {{ convertCurrency($task->task_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                     {{ convertCurrency($task->other_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                     {{ convertCurrency($task->total_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                    </td>
                                @endif

                                <td class="text-sm text-center ">
                                    <span   class="text-info text-sm ">{{$task->TaskStatuses[0]->created_at->diffForHumans()}}</span>

                                </td>

                            </tr>
                        @endforeach
                    @else
                        <td colspan="7">
                            <div
                                class="text-warning text-center">{{trans('employer::employer.You dont have any profits')}}</div>
                        </td>
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@stop
