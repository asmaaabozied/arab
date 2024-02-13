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
                    <img src="{{Storage::url($data->category->image)}}" alt="images" width="100" height="100"
                         class="img-fluid">
                </span>
                <div class=" mx-2 ">
                    @if(app()->getLocale() == "ar")
                        <h1 class="mb-1 font-weight-normal">{{$data->category->ar_title}}</h1>
                    @else
                        <h1 class="mb-1 font-weight-normal">{{$data->category->title}}</h1>

                    @endif
                    <p class="mb-0">{{$data->title}} </p>
                </div>
            </div>
            <p><span class="fw-bold">{{trans("employer::task.task_description")}}:</span> {{$data->description}}</p>
        </div>
        <div class="col-sm-4 mb-4 text-right">
            <h6 class="text-body text-uppercase f-12">{{trans('employer::task.final_task_price')}}</h6>
            <h1 class="display-4 font-weight-normal">
                {{ convertCurrency($data->total_cost, auth()->user()->current_currency) }}
                <span class="text-xs">{{auth()->user()->current_currency}}</span>
            </h1>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-md-4">
            <h6 class="mb-3">{{trans('employer::task.proof_details')}}</h6>
            @if($data->proof_request_ques == null)
                <p class="mb-2 text-danger">
                    <span class="fw-bold text-dark">{{trans('employer::task.question_as_worker2')}}:</span>
                    {{trans('employer::task.not_proof_request_ques')}}
                </p>
            @else
                <p class="mb-2 ">
                    <span class="fw-bold text-dark">{{trans('employer::task.question_as_worker2')}}:</span>
                    {{$data->proof_request_ques}}
                </p>
            @endif

            @if($data->proof_request_screenShot == null)
                <p class="mb-2 text-danger">
                    <span class="fw-bold text-dark">{{trans('employer::task.screenshot_as_worker')}}:</span>
                    {{trans('employer::task.not_proof_request_screenShot')}}
                </p>
            @else
                <p class="mb-2 ">
                    <span class="fw-bold text-dark">{{trans('employer::task.screenshot_as_worker')}}:</span>
                    {{$data->proof_request_screenShot}}
                </p>
            @endif


        </div>
        <div class="col-md-4">
            <h6 class="mb-3">{{trans('employer::task.task_details2')}}</h6>
            <p class="mb-2">{{trans('employer::task.task_number')}}: {{$data->task_number}}</p>

            <p class="mb-2">{{trans('employer::task.current_task_status')}} <span
                    class="badge badge-pill badge-success">{{trans('employer::task.'.$data->TaskStatuses()->latest()->first()->status()->first()->name)}}</span>
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
                                                 width="50%" height="50%"     alt="Generic placeholder image">
                                        </a>
                                    </div>
                                    <div class="mx-3">
                                        @if(is_array($result[$i]['cities']))
                                            @if($app_local == "ar")
                                                @for($j=0;$j<count($result[$i]['cities']);$j++)
                                                    <span
                                                        class="text-primary">{{\Modules\Region\Entities\City::withoutTrashed()->find($result[$i]['cities'][$j])->ar_name}}</span>
                                                    <span class="last-child">,</span>
                                                @endfor

                                            @else
                                                <span
                                                    class="text-primary">{{\Modules\Region\Entities\City::withoutTrashed()->find($result[$i]['cities'][$j])->name}}</span>
                                                <span class="last-child">,</span>
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
                                    @if($data->only_professional == "true")
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
                                    @if($data->special_access == "true")
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
                                    @if($data->daily_limit == null)
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
                                        @if($data->daily_limit != null)
                                            <span class="text-success">({{$data->daily_limit}})</span>
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::task.category')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">
                                            @if(app()->getLocale() == 'ar')
                                                {{$data->category->ar_title}}
                                            @else
                                                {{$data->category->title}}
                                            @endif

                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-start">
                                    <img class=""
                                         src="{{Storage::url($data->category->image)}}"
                                         alt="Status Icon" width="25">
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">  {{trans('worker::task.task_total_cost')}}</p>
                                        <h5 class="text-primary font-weight-bolder weather-line mb-0">
                                            {{ number_format(convertCurrency($data->task_cost, auth()->user()->current_currency),1) }}
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
                <div class="col-lg-6 col-md-6 col-12 my-1 ">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers mx-3">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold"> {{trans('worker::task.Task_number')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">
                                            {{$data->task_number}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-start">
                                    <i class="fa fa-hashtag text-primary text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 my-1 ">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers mx-3">
                                        <p class="text-sm mb-0 text-capitalize  font-weight-bold">{{trans('worker::task.taskStatus')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">
                                            @if($task_statuses->last()->status->name == "pending")
                                                <span
                                                    class="text-sm text-warning">{{trans('worker::task.'.$task_statuses->last()->status->name)}}</span>
                                                <span
                                                    class="text-xs text-warning">{{$task_statuses->last()->status->updated_at->diffForHumans()}}</span>
                                            @else
                                                <span
                                                    class="text-success">{{trans('worker::task.'.$task_statuses->last()->status->name)}}</span>
                                                <span
                                                    class="text-xs text-success">{{$task_statuses->last()->status->updated_at->diffForHumans()}}</span>

                                            @endif

                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-start">
                                    <i class="fa fa-wifi text-primary text-lg opacity-10" aria-hidden="true"></i>
                                    {{--                                    <img class="w-50 " style="border-radius: 4px"--}}
                                    {{--                                         src="{{asset('assets/img/default/task-'.$task_statuses->last()->status->name.'.gif')}}"--}}
                                    {{--                                         alt="Status Icon">--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-1">
                    <div class="card bg-white">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-12 my-auto">
                                    <div class="numbers">
                                        <p class=" text-center text-sm mb-0 text-capitalize font-weight-bold opacity-7">
                                            {{trans('worker::task.The remaining time to complete the task')}}
                                        </p>
                                        <h5 id="counter"
                                            class="text-primary text-center font-weight-bolder weather-line mb-0"></h5>
                                    </div>
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
                                        @for($i=0;$i<count($data->workflows);$i++)
                                            <h5 class="font-weight-bolder text-primary my-2">
                                                <i class="fa fa-circle-dot  opacity-10"
                                                   aria-hidden="true"></i> {{$data->workflows[$i]->work_flow}}
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
                                        @for($i=0;$i<count($data->actions);$i++)
                                            @if(app()->getLocale()=="ar")
                                                <h5 class="font-weight-bolder text-primary my-2">
                                                    <i class="fa fa-circle-dot  opacity-10"
                                                       aria-hidden="true"></i> {{$data->actions[$i]->categoryAction->ar_name}}
                                                </h5>
                                            @else

                                                <h5 class="font-weight-bolder text-primary my-2">
                                                    <i class="fa fa-circle-dot  opacity-10"
                                                       aria-hidden="true"></i> {{$data->actions[$i]->categoryAction->name}}
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

    <div class="row mt-4">
        <a href="{{route('worker.show.task.finish.the.job.form',[$data->id,$data->task_number])}}"
           class="btn bg-gradient-primary btn-lg w-100 text-white  mb-2">{{trans('worker::task.finish_task_job')}}</a>

        <a href="{{route('worker.tasks.in.active')}}"
           class="btn  btn btn-secondary btn-lg w-100 text-white   mb-2">{{trans('worker::task.back')}}</a>
    </div>

            </div>
        </div>
    </div>

    <script>
        <?php
        $task_end_date = \Carbon\Carbon::parse($data->task_end_date)->format('F d, Y H:i:s');
        $dateTime = strtotime($task_end_date);
        $getDateTime = date("F d, Y H:i:s", $dateTime);
        ?>
        var countDownDate = new Date("<?php echo "$getDateTime"; ?>").getTime();
        // Update the count down every 1 second
        var x = setInterval(function () {
            var now = new Date().getTime();
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Output the result in an element with id="counter"11
            document.getElementById("counter").innerHTML =
                days + "{{trans('worker::task.days_remaining')}}" + hours + "{{trans('worker::task.hours_remaining')}}" + minutes + "{{trans('worker::task.minutes_remaining')}}" + seconds + "{{trans('worker::task.seconds_remaining')}}";
            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                var now = new Date().getTime();
                // Find the distance between now an the count down date
                var distance = now - countDownDate;
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                // Output the result in an element with id="counter"11
                document.getElementById("counter").innerHTML =
                    "{{trans('worker::task.The time available to finish the task has expired since:')}}" + days + " {{trans('worker::task.days_remaining')}} " + hours + " {{trans('worker::task.hours_remaining')}} " + minutes + " {{trans('worker::task.minutes_remaining')}} " + seconds + " {{trans('worker::task.seconds_remaining')}} ";
            }
        }, 1000);
    </script>

@stop
