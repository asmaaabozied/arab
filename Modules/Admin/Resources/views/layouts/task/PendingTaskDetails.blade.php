@extends('dashboard::layouts.admin.master')
@section('content')

    <div class="row mt-4">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">{{trans('employer::task.task_end_date')}}</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    {{trans('employer::task.after')}}  {{\Carbon\Carbon::parse($task->task_end_date)->diffForHumans()}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-calendar-grid-58 text-dark text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mt-4 mt-md-0">
            <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">{{trans('employer::task.cost_per_worker')}}</p>
                                <h5 class="text-white font-weight-bolder mb-0" id="wallet_balance">
                                    {{($task->cost_per_worker) }} <span>$</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-credit-card text-dark text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0">
            <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">{{trans('employer::task.count_of_worker')}}</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    {{$task->total_worker_limit}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-user-run text-dark text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">{{trans('employer::task.main_task_price')}}</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    {{$task->task_cost}} <span>$</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-dark text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mt-4 mt-md-0">
            <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">{{trans('employer::task.other_task_price')}}</p>
                                <h5 class="text-white font-weight-bolder mb-0" id="wallet_balance">
                                    {{$task->other_cost}} <span>$</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-dark text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0">
            <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">{{trans('employer::task.final_task_price')}}</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    {{$task->total_cost}} <span>$</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-dark text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-lg-12 col-sm-12 mt-4">
        <div class="col-lg-6 col-sm-12 mb-2 ">
            <div class="card">
                <div class="card-header p-3 pb-0">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div>
                                <img src="{{Storage::url($task->category->image)}}"
                                     class="avatar avatar-xl me-2"
                                     alt="avatar image">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-lg">{{trans("employer::task.task_category")}}</h6>
                                <p class="text-xl">{{$task->category->title}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="horizontal dark">
                <div class="card-body p-3 pt-1">
                    <h6>{{trans("employer::task.task_title")}}</h6>
                    <p class="text-sm"> {{$task->title}}</p>
                </div>
                <hr class="horizontal dark">
                <div class="card-body p-3 pt-1">
                    <h6>{{trans("employer::task.task_description")}}</h6>
                    <p class="text-sm">{{$task->description}}</p>
                </div>
                <hr class="horizontal dark">
                <div class="card-body pt-0">
                    <h6>{{trans('employer::task.category_actions')}}</h6>
                    @for($i=0;$i<count($task->actions);$i++)
                        <div class="d-flex align-items-center">
                            <div class="text-center mx-2 w-5">
                                <img src="{{asset('assets/img/default/action.png')}}" class="avatar-sm" alt="Actions">
                            </div>
                            <div class="my-auto ms-3">
                                <div class="h-100">
                                    <p class="text-sm mb-1">
                                        {{$task->actions[$i]->categoryAction->name}}
                                    </p>
                                </div>
                            </div>
                            <span
                                class="badge bg-gradient-success badge-sm my-auto ms-auto me-3">{{trans('employer::task.action_enable')}}</span>
                        </div>
                        <hr class="horizontal dark last-ch">
                    @endfor

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 ">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0">{{trans('employer::task.TaskRegion')}}</h6>
                    </div>
                </div>
                <div class="card-body p-3">
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
            <div class="card mt-3 bg-gradient-secondary">
                <div class="card-header bg-transparent pb-0">
                    <h6 class="text-white">{{trans('employer::task.TaskWorkFlow')}}</h6>
                </div>
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side" data-timeline-axis-style="dashed">
                        @for($i=0;$i<count($task->workflows);$i++)
                            <div class="timeline-block mb-3">
                            <span class="timeline-step bg-light">
                            <i class="ni ni-ui-04 text-success text-gradient"></i>
                            </span>
                                <div class="timeline-content">
                                    <h6 class="text-white text-sm font-weight-bold mb-0">{{trans('employer::task.steep_number: ')}}{{$i+1}}</h6>
                                    <p class="text-white text-sm mt-3 mb-2">
                                        {{$task->workflows[$i]->work_flow}}
                                    </p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4 mx-lg-4 mx-sm-0 col-lg-6 col-sm-12">
            <div class="card-body p-3">
                <div class="d-flex">
                    <div class="avatar mx-2 avatar-lg">
                        <img class="" alt="Image placeholder" src="{{asset('assets/img/default/asking.png')}}">
                    </div>
                    <div class="ms-2 my-auto">
                        <h6 class="mb-0">{{trans('employer::task.question_as_worker')}}</h6>
                    </div>
                </div>
                @if($task->proof_request_ques == null)
                    <p class="mt-3 text-danger"> {{trans('employer::task.not_proof_request_ques')}} </p>
                @else
                    <p class="mt-3"> {{$task->proof_request_ques}}</p>
                @endif

                <hr class="horizontal dark">
                <div class="d-flex">
                    <div class="avatar mx-2 avatar-lg">
                        <img alt="Image placeholder" src="{{asset('assets/img/default/screenshot-2.png')}}">
                    </div>
                    <div class="ms-2 my-auto">
                        <h6 class="mb-0">{{trans('employer::task.screenshot_as_worker')}}</h6>
                    </div>
                </div>
                @if($task->proof_request_screenShot == null)
                    <p class="mt-3 text-danger"> {{trans('employer::task.not_proof_request_screenShot')}} </p>
                @else
                    <p class="mt-3">{{$task->proof_request_screenShot }}</p>
                @endif

            </div>
        </div>
        <div class="card mt-4 mx-1 col-lg-5  ">
            <div class="card-header pb-3">
                <h5>{{trans('employer::task.Additional features')}}</h5>
            </div>
            <div class="card-body pt-0">
                <div class="d-flex align-items-center">
                    <div class="text-center mx-2 w-5">
                        <img src="{{asset('assets/img/default/onlyProfessional.png')}}" class="avatar-sm"
                             alt="professionalOnly">
                    </div>
                    <p class="my-auto ms-3">{{trans('employer::task.professionalOnly')}}</p>
                    @if($task->only_professional == "true")
                        <span
                            class="badge bg-gradient-success badge-sm my-auto ms-auto me-3">{{trans('employer::task.feather_enable')}}</span>
                    @else
                        <span
                            class="badge bg-gradient-danger badge-sm my-auto ms-auto me-3">{{trans('employer::task.feather_disable')}}</span>
                    @endif


                </div>
                <hr class="horizontal dark">
                <div class="d-flex align-items-center">
                    <div class="text-center mx-2 w-5">
                        <img src="{{asset('assets/img/default/taskFeatured.png')}}" class="avatar-sm"
                             alt="taskFeatured">
                    </div>
                    <p class="my-auto ms-3">{{trans('employer::task.pinTaskTop')}}</p>
                    @if($task->special_access == "true")
                        <span
                            class="badge bg-gradient-success badge-sm my-auto ms-auto me-3">{{trans('employer::task.feather_enable')}}</span>
                    @else
                        <span
                            class="badge bg-gradient-danger badge-sm my-auto ms-auto me-3">{{trans('employer::task.feather_disable')}}</span>
                    @endif

                </div>
                <hr class="horizontal dark">
                <div class="d-flex align-items-center">
                    <div class="text-center mx-2 w-5">
                        <img src="{{asset('assets/img/default/dailyLimit.png')}}" class="avatar-sm"
                             alt="worker_daily_limit">
                    </div>
                    @if($task->daily_limit == null)
                        <div class="my-auto ms-3">
                            <div class="h-100">
                                <p class="text-sm mb-1">
                                    {{trans('employer::task.worker_daily_limit')}}
                                </p>
                            </div>
                        </div>
                        <span
                            class="badge bg-gradient-danger badge-sm my-auto ms-auto me-3">{{trans('employer::task.feather_disable')}}</span>
                    @else
                        <div class="my-auto ms-3">
                            <div class="h-100">
                                <p class="text-sm mb-1">
                                    {{trans('employer::task.worker_daily_limit')}}
                                </p>
                                <p class="mb-0 text-xs">
                                    {{$task->daily_limit}}  {{trans('employer::task.worker_in_task')}}
                                </p>
                            </div>
                        </div>
                        <span
                            class="badge bg-gradient-success badge-sm my-auto ms-auto me-3">{{trans('employer::task.feather_enable')}}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="button-row ">
            <a href="{{route('admin.show.task.in.pending.status')}}"
               class="btn btn-secondary btn-lg w-100   mb-2">{{trans('employer::task.back')}}</a>
        </div>
    </div>
    <div class="row mt-1">
        <div class="button-row ">
            <a href="{{route('admin.accepted.pending.task',[$task->id,$task->task_number])}}"
               class="btn btn-success btn-lg w-100   mb-2">{{trans('admin::task.acceptedTask')}}</a>
        </div>
    </div>
    <div class="row mt-1">
        <div class="button-row ">
            <button id="rejectBtn"
                    class="btn bg-gradient-danger btn-lg w-100 mb-0">{{trans('admin::task.rejectedTask')}}</button>
        </div>
        <form class="d-none"  method="Get" id="rejectForm"  action="{{route('admin.reject.pending.task',[$task->id,$task->task_number])}}"
              enctype="multipart/form-data">
            @csrf
            <div class="col-12 mt-3  ">
                <label>{{trans('employer::task.task_reason_of_refuse')}}</label>
                <textarea data-value="" name="reasonOfReject" required
                          class="multisteps-form__textarea form-control" rows="3"
                          placeholder="{{trans('admin::task.pleas_insert_task_reason_of_refuse')}}"></textarea>
            </div>
            <div class="row mt-4">
                <div class="button-row">
                    <button type="submit"
                            class="btn bg-gradient-danger btn-lg w-100 mb-0">{{trans('employer::task.submit_reject')}}
                    </button>
                </div>
            </div>
        </form>

        <div class="button-row ">
            <button id="CancelReject"
                    class="btn bg-gradient-secondary btn-lg w-100 mb-0 d-none">{{trans('employer::task.CancelReject')}}
            </button>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).on('click', '#rejectBtn', function () {
            var rejectForm = document.getElementById('rejectForm');
            var rejectBtn = document.getElementById('rejectBtn');
            var CancelReject = document.getElementById('CancelReject');
            rejectForm.classList.remove('d-none');
            rejectBtn.classList.add('d-none');
            CancelReject.classList.remove('d-none');
        });

        $(document).on('click', '#CancelReject', function () {
            var rejectForm = document.getElementById('rejectForm');
            var rejectBtn = document.getElementById('rejectBtn');
            var CancelReject = document.getElementById('CancelReject');
            CancelReject.classList.add('d-none');
            rejectForm.classList.add('d-none');
            rejectForm.classList.add('d-none');
            rejectBtn.classList.remove('d-none');
        });

    </script>

@stop
