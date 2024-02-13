@extends('dashboard::layouts.employer.master')
@section('content')
    <style>
        .max-w-unset {
            max-width: unset !important;
        }

        .last-ch:last-child {
            display: none;
        }
    </style>
    <div class="row mt-2 p-3">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.task_end_date')}}</p>
                                <h5 class="font-weight-bolder text-primary mb-0">
                                    {{trans('employer::task.after')}}  {{\Carbon\Carbon::parse($task->task_end_date)->diffForHumans()}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="ni ni-calendar-grid-58 text-primary text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mt-4 mt-md-0">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.cost_per_worker')}}</p>
                                <h5 class="font-weight-bolder text-primary mb-0">
                                    {{ convertCurrency($task->cost_per_worker, auth()->user()->current_currency) }}
                                    <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="ni ni-credit-card text-primary text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mt-4 mt-md-0">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.worker_completion')}}</p>
                                <h5 class="font-weight-bolder text-primary mb-0">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="progress-percentage">
                                                {{--                                                <span class="text-sm font-weight-bold">{{round((($task->approved_workers * 100) / $task->total_worker_limit),'2')}}%</span>--}}
                                                <span class="text-sm font-weight-bold">{{trans('employer::task.count_of_worker')}}: <span
                                                        class="text-primary">{{$task->total_worker_limit}}</span> / {{trans('employer::task.order_to_done')}} <span
                                                        class="text-success">{{$task->approved_workers}}</span> {{trans('employer::task.worker')}}</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-success" role="progressbar"
                                                 aria-valuenow="{{$task->approved_workers}}" aria-valuemin="0"
                                                 aria-valuemax="{{$task->total_worker_limit}}"
                                                 style="width: {{($task->approved_workers * 100) / $task->total_worker_limit}}%;"></div>
                                        </div>
                                    </div>

                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="ni ni-user-run text-primary text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row mt-2 p-3">
        <h5 class="mt-3 text-primary">{{trans('employer::task.TaskStatusFlow')}}</h5>
        <div class="card mt-3 bg-white">
            <div class="card-body p-3">
                <div class="timeline timeline-one-side" data-timeline-axis-style="dashed">
                    @for($i=0;$i<count($task->TaskStatuses);$i++)
                        <div class="timeline-block mb-3">
                            <span class="timeline-step ">
                               <i class=""><img src="{{asset('assets/img/process.png')}}" alt="Step" width="50"
                                                height="50"></i>
                            </span>
                            <div class="timeline-content max-w-unset">
                                <h6 class="text-dark fw-bold text-sm font-weight-bold mb-0">{{trans('employer::task.status_number')}}
                                    ({{$i+1}}): <span
                                        class="text-lg">{{trans('employer::task.'.$task->TaskStatuses[$i]->status->name)}}</span>
                                </h6>
                                <p class="text-warning font-weight-bold text-xs mt-1 mb-0">{{$task->TaskStatuses[$i]->created_at}}</p>
                                <p class="text-dark text-lg mt-3 mb-2">
                                    {{trans('employer::task.status_flow_'.$task->TaskStatuses[$i]->status->name)}}
                                </p>
                            </div>
                        </div>
                    @endfor
                    <div class="timeline-block mb-3">
                            <span class="timeline-step ">
                              <i class=""><img src="{{asset('assets/img/order.png')}}" alt="Step" width="40"
                                               height="40"></i>
                            </span>
                        <div class="timeline-content max-w-unset">
                            <h6 class="text-dark fw-bold text-sm font-weight-bold mb-0">{{trans('employer::task.worker_approved_to_now')}}</h6>
                            <p class="text-warning font-weight-bold text-xs mt-1 mb-0">{{\Carbon\Carbon::now()}}</p>
                            <p class="text-dark text-lg mt-3 mb-2">
                                <span
                                    class="text-primary text-lg">{{$task->approved_workers}}</span> {{trans('employer::task.worker')}}  {{trans('employer::task.form_all_worker')}}
                                <span
                                    class="text-info text-lg">{{$task->total_worker_limit}}</span> {{trans('employer::task.worker')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2 p-3">
        <h5 class="mt-3 text-primary">{{trans('employer::task.TaskInformation')}}</h5>
        <div class="card mt-3 bg-white">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12 text-center ">
                        <div class="mx-2">
                            <img src="{{Storage::url($task->category->image)}}"
                                 class="avatar avatar-xxl me-2"
                                 alt="avatar image">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="task-details-info task-sections">
                            <div class="task-details-table d-flex flex-wrap justify-content-between">
                                <div class="col-12 col-lg-6 col-md-6 mt-4">
                                        <div class="d-lg-flex d-sm-grid d-md-grid align-items-baseline">
                                            <div class="name-td text-dark fw-bold">{{trans("employer::task.task_title")}}</div>
                                            <div class="table-details text-uppercase">{{$task->title}}</div>
                                        </div>
                                        <div class="d-lg-flex d-sm-grid d-md-grid align-items-baseline">
                                            <div class="name-td text-dark fw-bold">{{trans("employer::task.task_description")}}</div>
                                            <div class="table-details">{{$task->description}}</div>
                                        </div>
                                        <div class="d-lg-flex d-sm-grid d-md-grid align-items-baseline">
                                            <div class="name-td text-dark fw-bold">{{trans('employer::task.TaskWorkFlow')}}</div>
                                            <div class="table-details">
                                                <ul>
                                                    @for($i=0;$i<count($task->workflows);$i++)
                                                        <li>
                                                            <p class="text-sm mb-1">
                                                                {{$task->workflows[$i]->work_flow}}
                                                            </p>
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="d-lg-flex d-sm-grid d-md-grid align-items-baseline">
                                            <div class="name-td text-dark fw-bold">{{trans('employer::task.TaskRegion2')}}</div>
                                            <div class="table-details">
                                                <ul class="list-group list-group-flush list my--3">
                                                    @for($i=0;$i<count($result);$i++)
                                                        <li class="list-group-item px-0 border-0">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">

                                                                    <img src="{{Storage::url($result[$i]['flag'])}}" class="avatar-sm"
                                                                         alt="Country flag">
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="text-sm mb-0">{{$result[$i]['country']}}</h6>
                                                                </div>
                                                                <div class="col text-center">
                                                                    <ul class="font-elmessiry">
                                                                        @if(is_array($result[$i]['cities']))
                                                                            <ul>
                                                                                @if($app_local == "ar")
                                                                                    @for($j=0;$j<count($result[$i]['cities']);$j++)
                                                                                        <li> {{\Modules\Region\Entities\City::withoutTrashed()->find($result[$i]['cities'][$j])->ar_name}} </li>
                                                                                    @endfor
                                                                                @else
                                                                                    <li> {{\Modules\Region\Entities\City::withoutTrashed()->find($result[$i]['cities'][$j])->name}} </li>

                                                                                @endif
                                                                            </ul>

                                                                        @else
                                                                            <span
                                                                                class="text-primary">{{trans('employer::task.all_city_in:').$result[$i]['country']}}</span>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </li>
                                                        <hr class="horizontal dark mt-3 mb-1 last-ch">
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                        <div class="d-lg-flex d-sm-grid d-md-grid align-items-baseline" >
                                            <div class="name-td text-dark fw-bold">{{trans('employer::task.question_as_worker2')}}</div>
                                            <div class="table-details text-uppercase">
                                                @if($task->proof_request_ques == null)
                                                    <p class="mt-3 text-danger"> {{trans('employer::task.not_proof_request_ques')}} </p>
                                                @else
                                                    <p class="mt-3"> {{$task->proof_request_ques}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="d-lg-flex d-sm-grid d-md-grid align-items-baseline" >
                                            <div class="name-td text-dark fw-bold"> {{trans('employer::task.screenshot_as_worker')}} </div>
                                            <div class="table-details">
                                                @if($task->proof_request_screenShot == null)
                                                    <p class="mt-3 text-danger"> {{trans('employer::task.not_proof_request_screenShot')}} </p>
                                                @else
                                                    <p class="mt-3">{{$task->proof_request_screenShot }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="d-lg-flex d-sm-grid d-md-grid align-items-baseline" >
                                            <div class="name-td text-dark fw-bold">{{trans('employer::task.category_actions')}}</div>
                                            <div class="table-details">
                                                <ul>
                                                    @for($i=0;$i<count($task->actions);$i++)
                                                        <li>
                                                            @if(app()->getLocale()=="ar")
                                                                <p class="text-sm mb-1">
                                                                    {{$task->actions[$i]->categoryAction->ar_name}}
                                                                </p>
                                                            @else
                                                                <p class="text-sm mb-1">
                                                                    {{$task->actions[$i]->categoryAction->name}}
                                                                </p>
                                                            @endif
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="d-lg-flex d-sm-grid d-md-grid align-items-baseline" >
                                            <div class="name-td text-dark fw-bold">{{trans('employer::task.Additional features')}}</div>
                                            <div class="table-details">
                                                <ul>
                                                    <li>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <p class="my-auto ms-3">{{trans('employer::task.professionalOnly')}}</p>
                                                            @if($task->only_professional == "true")
                                                                <span
                                                                    class="badge bg-gradient-success badge-sm my-auto me-3">{{trans('employer::task.feather_enable')}}</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-gradient-danger badge-sm my-auto me-3">{{trans('employer::task.feather_disable')}}</span>
                                                            @endif


                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <p class="my-auto ms-3">{{trans('employer::task.pinTaskTop')}}</p>
                                                            @if($task->special_access == "true")
                                                                <span
                                                                    class="badge bg-gradient-success badge-sm my-auto me-3">{{trans('employer::task.feather_enable')}}</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-gradient-danger badge-sm my-auto me-3">{{trans('employer::task.feather_disable')}}</span>
                                                            @endif

                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex align-items-center justify-content-between">

                                                            @if($task->daily_limit == null)
                                                                <div class="my-auto ms-3">
                                                                    <div class="h-100">
                                                                        <p class="text-sm mb-1">
                                                                            {{trans('employer::task.worker_daily_limit')}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <span
                                                                    class="badge bg-gradient-danger badge-sm my-auto me-3">{{trans('employer::task.feather_disable')}}</span>
                                                            @else
                                                                <div class="my-auto ms-3">
                                                                    <div class="h-100">
                                                                        <p class="text-sm mb-1">
                                                                            {{trans('employer::task.worker_daily_limit')}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <span
                                                                    class="badge bg-gradient-success badge-sm my-auto me-3">{{trans('employer::task.feather_enable')}}</span>
                                                            @endif
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <div class="row mt-2">
        <h5 class="mt-3 text-primary">{{trans('employer::task.discountCodeDetails')}}</h5>

        <div class="col-lg-12 col-sm-12 mt-4 mt-lg-0">
            <div class="card bg-gradient-white">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="numbers">
                                @if($data->discountCode->type == "MainCosts")
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.main_task_price')}}
                                        </h6>
                                        <span
                                            class="badge bg-gradient-primary badge-lg text-lg decuration"
                                            id="OldMainCostsBadge">
                                             {{ convertCurrency($task->task_cost + ($task->task_cost * $data->discountCode->discount_amount / 100), auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>

                                        </span>
                                        <span class="badge bg-gradient-success badge-lg text-lg  "
                                              id="NewMainCostsBadge">
                                           {{ convertCurrency($task->task_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>

                                        </span>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.other_task_price')}}
                                        </h6>
                                        <span class="badge bg-gradient-primary badge-lg  text-lg"
                                              id="OldAdditionalCostsBadge">
                                            {{ convertCurrency($task->other_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                        <span
                                            class="badge bg-gradient-primary badge-lg  text-lg "
                                            id="NewAdditionalCostsBadge">
                                            {{ convertCurrency($task->other_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="d-flex justify-content-between align-items-center">

                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.final_task_price')}}
                                        </h6>
                                        <span
                                            class="badge bg-gradient-primary badge-lg text-lg decuration"
                                            id="OldTotalCostsBadge">{{
                                            convertCurrency(($task->task_cost + ($task->task_cost * $data->discountCode->discount_amount / 100)) + ($task->other_cost), auth()->user()->current_currency)
                                                                            }}
                                                <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                        <span
                                            class="badge bg-gradient-primary badge-lg text-lg  "
                                            id="NewTotalCostsBadge">
                                            {{ convertCurrency($task->total_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                    </div>
                                @endif
                                @if($data->discountCode->type == "AdditionalCosts")
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.main_task_price')}}
                                        </h6>
                                        <span class="badge bg-gradient-primary badge-lg text-lg"
                                              id="OldMainCostsBadge">
                                            {{ convertCurrency($task->task_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                        <span
                                            class="badge bg-gradient-primary badge-lg text-lg  "
                                            id="NewMainCostsBadge">

                                                {{ convertCurrency($task->task_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.other_task_price')}}
                                        </h6>
                                        <span
                                            class="badge bg-gradient-primary badge-lg  text-lg decuration"
                                            id="OldAdditionalCostsBadge ">{{

                                         convertCurrency(($task->other_cost + ($task->other_cost * $data->discountCode->discount_amount / 100)), auth()->user()->current_currency)

                                    }}
                                        <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                        <span class="badge bg-gradient-success badge-lg  text-lg "
                                              id="NewAdditionalCostsBadge">
                                             {{ convertCurrency($task->other_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="d-flex justify-content-between align-items-center">

                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.final_task_price')}}
                                        </h6>
                                        <span
                                            class="badge bg-gradient-primary badge-lg text-lg decuration"
                                            id="OldTotalCostsBadge">{{
                                            convertCurrency(($task->other_cost + ($task->other_cost * $data->discountCode->discount_amount / 100)) + $task->task_cost, auth()->user()->current_currency)
                                                    }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                        <span class="badge bg-gradient-primary badge-lg text-lg "
                                              id="NewTotalCostsBadge">
                                         {{ convertCurrency($task->total_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                    </div>

                                @endif



                                @if($data->discountCode->type == "TotalCosts")
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.main_task_price')}}
                                        </h6>
                                        <span class="badge bg-gradient-primary badge-lg text-lg"
                                              id="OldMainCostsBadge">
                                              {{ convertCurrency($task->task_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                        <span
                                            class="badge bg-gradient-primary badge-lg text-lg  "
                                            id="NewMainCostsBadge">
                                                  {{ convertCurrency($task->task_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.other_task_price')}}
                                        </h6>
                                        <span class="badge bg-gradient-primary badge-lg  text-lg"
                                              id="OldAdditionalCostsBadge">
                                              {{ convertCurrency($task->other_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                        <span
                                            class="badge bg-gradient-primary badge-lg  text-lg "
                                            id="NewAdditionalCostsBadge">
                                             {{ convertCurrency($task->other_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="d-flex justify-content-between align-items-center">

                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.final_task_price')}}
                                        </h6>
                                        <span
                                            class="badge bg-gradient-primary badge-lg text-lg decuration"
                                            id="OldTotalCostsBadge ">{{

                                    convertCurrency($task->total_cost + ($task->total_cost * $data->discountCode->discount_amount / 100), auth()->user()->current_currency)

                                    }}

                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </span>
                                        <span class="badge bg-gradient-success badge-lg text-lg "
                                              id="NewTotalCostsBadge">
                                                {{ convertCurrency($task->total_cost, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>

                                        </span>
                                    </div>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="button-row ">
            <a href="{{route('employer.show.my.discount.code')}}"
               class="btn bg-gradient-primary btn-lg w-100 text-white  mb-2">{{trans('employer::task.back')}}</a>
        </div>
    </div>

@stop
