@extends('worker::layouts.worker.app')
@section('title')
    {{trans('employer::task.tasks')}}
@endsection
@section('content')

    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">

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
                                                 alt="Generic placeholder image" width="50%" height="50%">
                                        </a>
                                    </div>
                                    <div class="mx-3">
                                        @if(is_array($result[$i]['cities']))
                                            @if(app()->getLocale()== "ar")
                                                @for($j=0;$j<count($result[$i]['cities']);$j++)
                                                    <span
                                                        class="text-primary">{{\Modules\Region\Entities\City::withoutTrashed()->find($result[$i]['cities'][$j])->ar_name}}</span>
                                                    <span class="last-child">,</span>
                                                @endfor

                                            @else
{{--                                                <span--}}
{{--                                                    class="text-primary">{{\Modules\Region\Entities\City::withoutTrashed()->find($result[$i]['cities'][$j])->ar_name}}</span>--}}
{{--                                                <span class="last-child">,</span>--}}
                                            @endif

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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::task.max_task_end_date')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">
                                            {{\Carbon\Carbon::parse($task->task_end_date)->format('Y-m-d')}}
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">  {{trans('worker::task.task_price')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">

                                            <span>{{ number_format(convertCurrency($task->total_cost, auth()->user()->current_currency),1) }}</span>
                                            <span class="text-xxs">{{auth()->user()->current_currency}}</span>

                                            <span
                                                class="text-warning text-sm">({{trans('worker::task.cost_per_worker')}} {{ number_format(convertCurrency($task->cost_per_worker, auth()->user()->current_currency),1) }}  <span
                                                    class="text-xxs">{{auth()->user()->current_currency}}</span>)</span>
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::task.count_of_worker')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">
                                            {{$task->total_worker_limit}}
                                    <span
                                        class="text-warning text-sm">({{trans('worker::task.worker_request_to_task')}} {{$task->approved_workers}})</span>

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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::task.daily_worker_limit')}}</p>
                                         <h5 class="font-weight-bolder text-primary mb-0">
                                    @if($task->daily_limit == null)
                                        <span class="text-success text-sm">({{trans('worker::task.no_daily_worker_limit')}})</span>
                                    @else
                                        {{$task->daily_limit}}
                                        <span
                                            class="text-warning text-sm">({{trans('worker::task.worker_request_today_to_task_done')}} {{$count_of_today_workers}})</span>
                                    @endif

                                </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-start">
                                    <i class="ni ni-lock-circle-open text-primary text-lg opacity-10" aria-hidden="true"></i>
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






    <form method="POST" action="{{route('worker.submit.to.task.done',[$task->id,$task->task_number])}}"
          enctype="multipart/form-data">
        @csrf
        <div class="row mt-4">
            <div class="button-row  mt-4">
                <button type="submit"
                        class="btn btn-primary btn-lg w-100">{{trans('worker::task.accept_this_task')}}</button>
                <a href="{{route('worker.browse.task')}}"
                   class="btn btn-secondary btn-lg w-100 my-2">{{trans('worker::task.BackToTaskList')}}</a>
            </div>

        </div>
    </form>

            </div>
        </div>
    </div>
@stop
