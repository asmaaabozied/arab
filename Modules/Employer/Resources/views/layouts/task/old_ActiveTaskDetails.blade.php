@extends('dashboard::layouts.employer.master')
@section('content')

    <div class="row justify-content-between ">
        <div class="col-sm-8 mb-4 ">
            <div class="d-flex flex-wrap mb-4 align-items-center">
                <span class="avtar avtar-icon avtar-square avtar-l">
                    <img src="{{Storage::url($task->category->image)}}" alt="images" width="100" height="100"
                         class="img-fluid">
                </span>
                <div class=" mx-2 ">
                    @if(app()->getLocale() == "ar")
                        <h1 class="mb-1 font-weight-normal">{{$task->category->ar_title}}</h1>
                    @else
                        <h1 class="mb-1 font-weight-normal">{{$task->category->title}}</h1>

                    @endif
                    <p class="mb-0">{{$task->title}} </p>
                </div>
            </div>
            <p><span class="fw-bold">{{trans("employer::task.task_description")}}:</span> {{$task->description}}</p>
        </div>
        <div class="col-sm-4 mb-4 text-right">
            <h6 class="text-body text-uppercase f-12">{{trans('employer::task.final_task_price')}}</h6>
            <h1 class="display-4 font-weight-normal">
                {{ convertCurrency($task->total_cost, auth()->user()->current_currency) }}
                <span class="text-xs">{{auth()->user()->current_currency}}</span>
            </h1>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-md-4">
            <h6 class="mb-3">{{trans('employer::task.proof_details')}}</h6>
            @if($task->proof_request_ques == null)
                <p class="mb-2 text-danger">
                    <span class="fw-bold text-dark">{{trans('employer::task.question_as_worker2')}}:</span>
                    {{trans('employer::task.not_proof_request_ques')}}
                </p>
            @else
                <p class="mb-2 ">
                    <span class="fw-bold text-dark">{{trans('employer::task.question_as_worker2')}}:</span>
                    {{$task->proof_request_ques}}
                </p>
            @endif

            @if($task->proof_request_screenShot == null)
                <p class="mb-2 text-danger">
                    <span class="fw-bold text-dark">{{trans('employer::task.screenshot_as_worker')}}:</span>
                    {{trans('employer::task.not_proof_request_screenShot')}}
                </p>
            @else
                <p class="mb-2 ">
                    <span class="fw-bold text-dark">{{trans('employer::task.screenshot_as_worker')}}:</span>
                    {{$task->proof_request_screenShot}}
                </p>
            @endif


        </div>
        <div class="col-md-4">
            <h6 class="mb-3">{{trans('employer::task.task_details2')}}</h6>
            <p class="mb-2">{{trans('employer::task.task_number')}}: {{$task->task_number}}</p>

            <p class="mb-2">{{trans('employer::task.current_task_status')}} <span
                    class="badge badge-pill badge-success">{{trans('employer::task.'.$task->TaskStatuses()->latest()->first()->status()->first()->name)}}</span>
                <span>
                     @if($task->is_hidden == "true")
                        <i class="fas fa-eye-slash text-gray"></i>
                        <span class="text-gray">{{trans('employer::task.taskIsHidden')}}</span>
                    @else
                        <i class="fas fa-eye text-success"></i>
                        <span class="text-success">{{trans('employer::task.taskIsShown')}}</span>
                    @endif
                </span>
            </p>
        </div>
    </div>
    <div class="row">

        <div class="col-xl-3 col-lg-12">
            <div class="card task-board-left">
                <div class="card-body">
                    <div class="task-right">
                        <div class="header-countries">
                            <span class="f-w-400">{{trans('employer::task.TaskRegion2')}}</span>
                        </div>
                        <div class="pt-2">
                            @for($i=0;$i<count($result);$i++)
                                <div class="d-flex my-1 align-items-center">
                                    <div class="">
                                        <a href="#!">
                                            <img class="avatar-sm " src="{{Storage::url($result[$i]['flag'])}}"
                                                 alt="Generic placeholder image">
                                        </a>
                                    </div>
                                    <div class="mx-3">
                                        @if(is_array($result[$i]['cities']))
{{--                                            @if(app()->getLocale()== "ar")--}}
                                                @for($j=0;$j<count($result[$i]['cities']);$j++)
                                                    <span
                                                        class="text-primary">{{\Modules\Region\Entities\City::withoutTrashed()->find($result[$i]['cities'][$j])->ar_name}}</span>
                                                    <span class="last-child">,</span>
                                                @endfor

{{--                                            @else--}}
{{--                                                <span--}}
{{--                                                    class="text-primary">{{\Modules\Region\Entities\City::withoutTrashed()->find($result[$i]['cities'][$j])->ar_name}}</span>--}}
{{--                                                <span class="last-child">,</span>--}}
{{--                                            @endif--}}

                                        @else
                                            <span
                                                class="text-primary">{{trans('employer::task.all_city_in:').$result[$i]['country']}}</span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            @endfor
                        </div>
                        <div class="header-countries">
                            <span class="f-w-400">{{trans('employer::task.Additional features')}}</span>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center my-1">
                                <div class="">
                                    @if($task->only_professional == "true")
                                        <a class="btn  btn-outline-success">
                                            <i class="fas fa-circle-check"></i>
                                        </a>
                                    @else
                                        <a class="btn  btn-outline-danger">
                                            <i class="fas fa-circle-xmark"></i>

                                        </a>
                                    @endif


                                </div>
                                <div class="mx-2">
                                    <div class="chat-header f-w-400 mb-1">{{trans('employer::task.professionalOnly')}}
                                    </div>
                                </div>


                            </div>
                            <div class="d-flex align-items-center my-1">
                                <div class="">
                                    @if($task->special_access == "true")
                                        <a class="btn  btn-outline-success">
                                            <i class="fas fa-circle-check"></i>
                                        </a>
                                    @else
                                        <a class="btn  btn-outline-danger">
                                            <i class="fas fa-circle-xmark"></i>

                                        </a>
                                    @endif
                                </div>
                                <div class="mx-2">
                                    <div class="chat-header f-w-400 mb-1">{{trans('employer::task.pinTaskTop')}}

                                    </div>
                                </div>


                            </div>

                            <div class="d-flex align-items-center my-1">
                                <div class="">
                                    @if($task->daily_limit == null)
                                        <a class="btn  btn-outline-danger">
                                            <i class="fas fa-circle-xmark"></i>
                                        </a>
                                    @else
                                        <a class="btn  btn-outline-success">
                                            <i class="fas fa-circle-check"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="mx-2">
                                    <div class="chat-header f-w-400 mb-1">
                                        {{trans('employer::task.worker_daily_limit')}}
                                        @if($task->daily_limit != null)
                                            <span class="text-success">({{$task->daily_limit}})</span>
                                        @endif
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-9 col-lg-12  ">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 my-1 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers mx-3">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.task_end_date')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">
                                            @if($task->deferred()->exists() == true)
                                                <h5 class=" text-warning font-weight-bolder mb-0">
                                                    {{\Carbon\Carbon::parse($task->deferred()->latest()->first()->new_end_date)->format('Y-m-d')}}
                                                    <span
                                                        class="text-xs">({{trans('employer::task.taskIsDeferred: ')}} {{$task->deferred()->count()}} {{trans('employer::task.once')}}) </span>
                                                </h5>
                                            @else
                                                <h5 class=" font-weight-bolder mb-0">
                                                    {{trans('employer::task.after')}}  {{\Carbon\Carbon::parse($task->task_end_date)->diffForHumans()}}
                                                </h5>
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-start">
                                    <i class="ni ni-calendar-grid-58 text-primary text-lg opacity-10"
                                       aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 my-1  ">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers mx-3">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.cost_per_worker')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">
                                            {{ convertCurrency($task->cost_per_worker, auth()->user()->current_currency) }}
                                            <span class="text-md-center">{{auth()->user()->current_currency}}</span>
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
                <div class="col-lg-6 col-md-6 col-12 my-1 ">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers mx-3">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.count_of_worker')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">
                                            <div class="progress-wrapper">
                                                <div class="progress-info">
                                                    <div class="progress-percentage">
                                                        <span class="text-sm font-weight-bold">{{trans('employer::task.count_of_worker')}}: <span
                                                                class="text-dark">{{$task->total_worker_limit}}</span> / {{trans('employer::task.order_to_done')}} <span
                                                                class="text-primary">{{$task->approved_workers}}</span> {{trans('employer::task.worker')}}</span>
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
                <div class="col-lg-6 col-md-6 col-12 my-1 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers mx-3">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.main_task_price')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">
                                            {{ convertCurrency($task->task_cost, auth()->user()->current_currency) }}
                                            <span class="text-md-center">{{auth()->user()->current_currency}}</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-start">
                                    <i class="fa fa-barcode text-primary text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 my-1  ">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers mx-3">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.other_task_price')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">
                                            {{ convertCurrency($task->other_cost, auth()->user()->current_currency) }}
                                            <span class="text-md-center">{{auth()->user()->current_currency}}</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-start">
                                    <i class="fa fa-tag text-primary text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 my-1 ">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers mx-3">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.final_task_price')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">
                                            {{ convertCurrency($task->total_cost, auth()->user()->current_currency) }}
                                            <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-start">
                                    <i class="fa fa-money-bill text-primary text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-1">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers mx-3">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.TaskWorkFlow')}}</p>
                                        @for($i=0;$i<count($task->workflows);$i++)
                                            <h5 class="font-weight-bolder text-primary my-2">
                                                <i class="fa fa-circle-dot  opacity-10"
                                                   aria-hidden="true"></i> {{$task->workflows[$i]->work_flow}}
                                            </h5>
                                        @endfor
                                    </div>
                                </div>
                                <div class="col-3 text-start">
                                    <i class="fa fa-paw text-primary opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-1">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers mx-3">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.category_actions')}}</p>
                                        @for($i=0;$i<count($task->actions);$i++)
                                            @if(app()->getLocale()=="ar")
                                                <h5 class="font-weight-bolder text-primary my-2">
                                                    <i class="fa fa-circle-dot  opacity-10"
                                                       aria-hidden="true"></i> {{$task->actions[$i]->categoryAction->ar_name}}
                                                </h5>
                                            @else

                                                <h5 class="font-weight-bolder text-primary my-2">
                                                    <i class="fa fa-circle-dot  opacity-10"
                                                       aria-hidden="true"></i> {{$task->actions[$i]->categoryAction->name}}
                                                </h5>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <div class="col-3 text-start">
                                    <i class="fa fa-icons text-primary text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
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
    @if($task->deferred()->exists() == true)
        <div class="row mt-2 p-3">
            <h5 class="mt-3 text-primary">{{trans('employer::task.TaskEndDateFlow')}}</h5>
            <div class="card mt-3 bg-white">
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side" data-timeline-axis-style="dashed">
                        @for($i=0;$i<count($task->deferred);$i++)
                            <div class="timeline-block mb-3">
                            <span class="timeline-step bg-light">
                            <i class="ni ni-calendar-grid-58 text-warning text-gradient"></i>
                            </span>
                                <div class="timeline-content max-w-unset">
                                    <h6 class=" text-sm font-weight-bold mb-0">{{trans('employer::task.deferred_number')}}
                                        ({{$i+1}}): <span
                                            class="text-lg">{{$task->deferred[$i]->duration_of_defer}} {{trans('employer::task.day')}}</span>
                                    </h6>
                                    <p class="text-warning font-weight-bold text-xs mt-1 mb-0">{{trans('employer::task.deferred_action_at')}}{{$task->deferred[$i]->created_at}}</p>
                                    <p class="text-secondary text-sm mt-3 mb-2">
                                        {{trans('employer::task.The task has been delayed due to')}}
                                        @if(\Illuminate\Support\Facades\Lang::has('privilege::privilege.'.$task->deferred[$i]->reason_of_defer))
                                            ({{trans('privilege::privilege.'.$task->deferred[$i]->reason_of_defer)}})
                                        @else
                                           ( {{$task->deferred[$i]->reason_of_defer}})
                                        @endif


                                        {{trans('employer::task.for_duration')}}
                                        {{$task->deferred[$i]->duration_of_defer}}
                                        {{trans('employer::task.day')}}
                                        {{trans('employer::task.And we increased the number of workers from: ')}}
                                        ({{$task->deferred[$i]->main_total_worker_limit}})
                                        {{trans('employer::task.to_workers')}}
                                        ({{$task->deferred[$i]->new_total_worker_limit}})
                                        {{trans('employer::task.workers')}}
                                        {{trans('employer::task.reason_of_increased_workers_number')}}
                                    </p>
                                    <p class="text-secondary text-sm mt-1 mb-2">
                                        {{trans('employer::task.data_after_duration')}}
                                        {{$task->deferred[$i]->main_end_date}}
                                    </p>
                                    <p class="text-secondary text-sm mt-1 mb-2">
                                        {{trans('employer::task.data_before_duration')}}
                                        {{$task->deferred[$i]->new_end_date}}
                                    </p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="row mt-4">
        <div class="button-row ">
            <a href="{{route('employer.show.active.tasks.proofs',[$task->id,$task->task_number])}}"
               class="btn btn-primary btn-lg w-100   mb-2">{{trans('employer::task.show_task_proofs')}}</a>
        </div>
        <div class="button-row ">
            <a href="{{route('employer.show.task.in.active.status')}}"
               class="btn btn-dark btn-lg w-100   mb-2">{{trans('employer::task.back')}}</a>
        </div>
    </div>


@stop
