@extends('employer::layouts.employer.app')

@section('title')
    {{trans('employer::task.tasks')}}
@endsection
@section('content')





    <style>
        .last-ch:last-child {
            display: none;
        }
        .decuration {
            text-decoration-color: white;
            text-decoration-line: line-through;
            text-decoration-thickness: 2px;
        }
    </style>

    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
    @if($errors->has('new_minimum_cost_per_worker'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('new_minimum_cost_per_worker') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    <div class="row justify-content-between ">
        <div class="col-sm-8 mb-4 ">
            <div class="d-flex flex-wrap mb-4 align-items-center">
                <span class="avtar avtar-icon avtar-square avtar-l">
                    @php $image=$task->category->image; @endphp
                    <img src="{{Storage::url($image)}}"

                         onerror="this.src='{{asset('frontend/assets/img/317746_facebook_social media_social_icon.png')}}'"
                         alt="images" width="100" height="100"
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
            <p class="mb-2 fw-bold">{{trans('employer::task.task_number')}}: <span class="fw-normal">{{$task->task_number}}</span></p>
            <p class="mb-2 fw-bold">{{trans('employer::task.current_task_status')}} <span
                    class=" badge badge-pill badge-secondary">{{trans('employer::task.NotPublishedYet')}}</span>
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
                                            {{trans('employer::task.after')}}  {{\Carbon\Carbon::parse($task->task_end_date)->diffForHumans()}}
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
                <div class="col-lg-6 col-md-6 col-12 my-1 ">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers mx-3">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.total_worker_limit')}}</p>
                                        <h5 class="font-weight-bolder text-primary mb-0">
                                            {{$task->total_worker_limit}}
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

                 <div class="col-lg-6 col-md-6 col-12 my-1  ">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">{{trans('employer::task.WalletBalance')}}</p>
                                        <h5 class=" text-primary font-weight-bolder mb-0" id="wallet_balance">
                                            {{(auth()->user()->wallet_balance) - ($task->total_cost)}} <span>USD</span>
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


    <form method="POST" class="position-relative" action="{{route('employer.submit.and.save.task',[$task->id,$task->task_number])}}"
          enctype="multipart/form-data">
        @csrf
        <div class="row mt-4">
            <div class="col-lg-6 col-sm-6 ">
                <div class="card bg-gradient-white">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <div class="numbers mb-2">
                                    <p class="text-sm mb-0 text-capitalize  font-weight-bold">{{trans('employer::task.task_per_worker')}}
                                        <i
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="bottom"
                                            title="{{trans('employer::task.task_per_worker_warning')}}"

                                            class="ni ni-bell-55 text-sm text-info opacity-10" aria-hidden="true"></i>
                                    </p>
                                </div>
                                <input class="multisteps-form__input form-control" step="0.01"
                                       value="{{$task->cost_per_worker}}" type="number"
                                       min="{{$task->cost_per_worker}}"
                                       name="new_minimum_cost_per_worker"
                                       id="minimum_cost_per_worker"
                                       placeholder="{{trans('employer::task.minimum_cost_per_worker')}}"
                                       >
                            </div>
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-gradient-white mt-2" id="discountCard">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <div class="numbers mb-2">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.discountCode')}}</p>
                                </div>
                                <div class="mt-2 d-lg-flex justify-content-between">
                                    <div class="col-12 col-md-7">
                                        <input class="multisteps-form__input form-control"
                                               type="text"
                                               id="discount_code"
                                               placeholder="{{trans('employer::task.If you have a discount code, please enter it here')}}"
                                               >
                                    </div>
                                    <div class="col-12 col-md-4 mt-2 mt-md-0">
                                        <a class=" btn bg-gradient-primary mb-0 " id="check_discount_code" type="button"
                                           title="{{trans('employer::task.checkDiscountCode')}}"><span
                                                class="text-xs">{{trans('employer::task.checkDiscountCode')}}</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-tag text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-sm-6 mt-4 mt-lg-0">
                <div class="card bg-gradient-white">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="numbers">
                                    <div class="d-flex align-items-center">
                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.main_task_price')}}
                                        </h6>
                                        <span class="badge bg-gradient-info text-white badge-lg my-auto ms-auto me-3 text-lg col-auto col-lg-3 col-md-3" id="OldMainCostsBadge">{{$task->task_cost}} <span>USD</span></span>
                                        <span class="badge bg-gradient-success badge-lg my-auto ms-auto me-3 text-lg d-none  col-auto col-lg-3 col-md-3" id="NewMainCostsBadge">0 <span>USD</span></span>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="d-flex align-items-center">
                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.other_task_price')}}
                                        </h6>
                                        <span class="badge bg-gradient-info text-white badge-lg my-auto ms-auto me-3  text-lg col-auto col-lg-3 col-md-3" id="OldAdditionalCostsBadge">{{$task->other_cost}} <span>USD</span></span>
                                        <span class="badge bg-gradient-success badge-lg my-auto ms-auto me-3  text-lg d-none col-auto col-lg-3 col-md-3" id="NewAdditionalCostsBadge">0 <span>USD</span></span>
                                    </div>
                                    <hr class="horizontal dark ">
                                    <div class="d-flex align-items-center">
                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.final_task_price')}}
                                        </h6>
                                        <span class="badge bg-gradient-info text-white badge-lg my-auto ms-auto me-3 text-lg col-auto col-lg-3 col-md-3" id="OldTotalCostsBadge">{{$task->total_cost}} <span>USD</span></span>
                                        <span class="badge bg-gradient-success badge-lg my-auto ms-auto me-3 text-lg d-none col-auto col-lg-3 col-md-3" id="NewTotalCostsBadge">0 <span>USD</span></span>
                                    </div>

                                        {{--here is discount code ditails--}}
                                    <hr class="horizontal light d-none" id="discountCodeHr" >
                                    <div class="d-flex align-items-center d-none" id="discountCodeRow">
                                        <h6 class="font-weight-bolder mb-0">
                                            {{trans('employer::task.final_task_price_after_discount')}}
                                        </h6>
                                        <span class="badge bg-gradient-primary badge-lg my-auto ms-auto me-3 text-lg" id="newTaskCostAfterDiscount"> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="button-row d-flex mt-4">
                <a class="btn btn-primary bg-gradient-light mb-0 " href="javascript:history.back()" type="button"
                   title="{{trans('employer::task.EditeTaskButton')}}">{{trans('employer::task.EditeTaskButton')}}</a>

                <button class="btn btn-success  bg-gradient-success ms-auto  mb-0 " type="submit"
                        title="{{trans('employer::task.CreateTaskButton')}}">{{trans('employer::task.CreateTaskButton')}}</button>
            </div>

        </div>

        <div class="row my-2">
            <div class="position-absolute text-start w-25" style="left: 0; bottom: -10px">
                <div class="toast fade p-2 mt-2 bg-gradient-info " role="alert" aria-live="assertive" id="DiscountCodeNotifications" aria-atomic="true">
                    <div class="toast-header bg-transparent border-0 justify-content-between">
                        <i class="ni ni-bell-55 text-white me-2"></i>
                        <span class=" text-white font-weight-bold" id="NotificationTitle"></span>
                        <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close" aria-hidden="true"></i>
                    </div>
                    <hr class="horizontal light m-0">
                    <div class="toast-body text-center text-white" id="NotificationMessage">

                    </div>
                </div>
            </div>

        </div>
    </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).on('input', '#minimum_cost_per_worker', function () {
            var CountOfWorker = {{$task->total_worker_limit}};
            var OtherTaskCost = {{$task->other_cost}};
            var Wallet = {{(auth()->user()->wallet_balance)}} ;

            var CostPerWorker =  document.getElementById('minimum_cost_per_worker').value;
            document.getElementById("OldMainCostsBadge").innerHTML = Number((CountOfWorker * CostPerWorker).toFixed(2)) +" USD";
            document.getElementById("OldTotalCostsBadge").innerHTML =  Number((OtherTaskCost + (CountOfWorker * CostPerWorker)).toFixed(2)) +" USD";
            document.getElementById("wallet_balance").innerHTML = Number(((Wallet - (OtherTaskCost + (CountOfWorker * CostPerWorker)))).toFixed(2)) + " USD";
        });

        $(document).on('click', '#check_discount_code', function () {
            var DiscountCode = document.getElementById("discount_code").value;
            var card = document.getElementById("discountCard");
            var notif = document.getElementById("DiscountCodeNotifications");
            var notifTilte = document.getElementById("NotificationTitle");
            var NotifMessage = document.getElementById("NotificationMessage");

            var discountCodeHr = document.getElementById("discountCodeHr");
            var discountCodeRow = document.getElementById("discountCodeRow")
            var newTaskCostAfterDiscount = document.getElementById("newTaskCostAfterDiscount");


            var OldMainCostsBadge = document.getElementById("OldMainCostsBadge");
            var NewMainCostsBadge = document.getElementById("NewMainCostsBadge");

            var OldAdditionalCostsBadge = document.getElementById("OldAdditionalCostsBadge");
            var NewAdditionalCostsBadge = document.getElementById("NewAdditionalCostsBadge");

            var OldTotalCostsBadge = document.getElementById("OldTotalCostsBadge");
            var NewTotalCostsBadge = document.getElementById("NewTotalCostsBadge");

            $.ajax({
                url: "{{route('employer.check.trust.discount.code',$task->id)}}",
                type: "POST",
                data: {
                    disCod: DiscountCode,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',

                success: function (result) {
                    notif.classList.remove('hide')
                    notif.classList.add('show')
                    setTimeout(function() {
                        notif.classList.remove('show');
                        notif.classList.add('hide');
                    }, 10000)
                    setTimeout(function() {
                        card.removeAttribute('class');
                        card.classList.add('bg-gradient-white');
                        card.classList.add('card');
                        card.classList.add('mt-2');
                    }, 10000)
                    if (result.check_code == "Success") {
                        //change badge color
                        card.removeAttribute('class');
                        card.classList.add('card');
                        card.classList.add('bg-gradient-success');
                        card.classList.add('mt-2');

                        //show notification
                        notif.removeAttribute('class');
                        notif.classList.add('show');
                        notif.classList.add('toast');
                        notif.classList.add('bg-gradient-success');
                        notif.classList.add('fade');
                        notif.classList.add('p-2');
                        notif.classList.add('mt-2');
                        notifTilte.innerHTML = result.check_code;
                        NotifMessage.innerHTML = result.message;

                    //    show discount code Row

                        discountCodeHr.classList.remove('d-none')
                        discountCodeRow.classList.remove('d-none')

                    }
                    if (result.check_code == "Error") {
                        //change badge color
                        card.removeAttribute('class');
                        card.classList.add('card');
                        card.classList.add('bg-gradient-danger');
                        card.classList.add('mt-2');

                        //show notification
                        notif.removeAttribute('class');
                        notif.classList.add('show');
                        notif.classList.add('toast');
                        notif.classList.add('bg-gradient-danger');
                        notif.classList.add('fade');
                        notif.classList.add('p-2');
                        notif.classList.add('mt-2');
                        notifTilte.innerHTML = result.check_code;
                        NotifMessage.innerHTML = result.message;
                    }
                    if (result.check_code == "Warning") {
                        //change badge color
                        card.removeAttribute('class');
                        card.classList.add('card');
                        card.classList.add('bg-gradient-warning');
                        card.classList.add('mt-2');

                        //show notification
                        notif.removeAttribute('class');
                        notif.classList.add('show');
                        notif.classList.add('toast');
                        notif.classList.add('bg-gradient-warning');
                        notif.classList.add('fade');
                        notif.classList.add('p-2');
                        notif.classList.add('mt-2');
                        notifTilte.innerHTML = result.check_code;
                        NotifMessage.innerHTML = result.message;
                    }

                //    check discount code type
                    if(result.code_type == "MainCosts"){
                        NewMainCostsBadge.classList.remove('d-none');
                        OldMainCostsBadge.classList.add('decuration');
                        var Wallet = {{(auth()->user()->wallet_balance)}} ;
                        var discountAmount = result.amount;
                        var CountOfWorker = {{$task->total_worker_limit}};
                        var CostPerWorker =  document.getElementById('minimum_cost_per_worker').value;
                        var AddintionalCost =  {{$task->other_cost}};
                        var MainCostval = CostPerWorker * CountOfWorker;
                        NewMainCostsBadge.innerHTML = Number(( MainCostval - (MainCostval * discountAmount / 100)).toFixed(2)) +" USD";
                        newTaskCostAfterDiscount.innerHTML = Number(((MainCostval - (MainCostval * discountAmount / 100)) +  AddintionalCost).toFixed(2))+" USD";
                        document.getElementById("wallet_balance").innerHTML = Number((Wallet - ((MainCostval - (MainCostval * discountAmount / 100)) +  AddintionalCost)).toFixed(2)) +" USD";




                        $(document).on('input', '#minimum_cost_per_worker', function () {
                            var CountOfWorker = {{$task->total_worker_limit}};
                            var AddintionalCost = {{$task->other_cost}};
                            var Wallet = {{(auth()->user()->wallet_balance)}} ;
                            var CostPerWorker =  document.getElementById('minimum_cost_per_worker').value;
                            var changedMainCostVal = (CostPerWorker * CountOfWorker);
                            NewMainCostsBadge.innerHTML = Number((changedMainCostVal - (changedMainCostVal * discountAmount / 100)).toFixed(2))+" USD";
                            newTaskCostAfterDiscount.innerHTML = Number(((changedMainCostVal - (changedMainCostVal * discountAmount / 100)) +  AddintionalCost).toFixed(2))+" USD";
                            document.getElementById("wallet_balance").innerHTML = Number((Wallet - ((changedMainCostVal - (changedMainCostVal * discountAmount / 100)) +  AddintionalCost)).toFixed(2)) + " USD";



                        });


                    }
                    if(result.code_type == "AdditionalCosts"){
                        NewAdditionalCostsBadge.classList.remove('d-none');
                        OldAdditionalCostsBadge.classList.add('decuration');
                        var Wallet = {{(auth()->user()->wallet_balance)}} ;
                        var discountAmount = result.amount;
                        var CountOfWorker = {{$task->total_worker_limit}};
                        var CostPerWorker =  document.getElementById('minimum_cost_per_worker').value;
                        var MainCostval = CostPerWorker * CountOfWorker;
                        var AddintionalCost = {{$task->other_cost}};

                        NewAdditionalCostsBadge.innerHTML = Number((AddintionalCost - (AddintionalCost * discountAmount / 100)).toFixed(2))+" USD";
                        newTaskCostAfterDiscount.innerHTML = Number((AddintionalCost - (AddintionalCost * discountAmount / 100) +  MainCostval).toFixed(2))+" USD";
                        document.getElementById("wallet_balance").innerHTML = Number((Wallet - ((AddintionalCost - (AddintionalCost * discountAmount / 100) +  MainCostval))).toFixed(2)) + " USD";
                        $(document).on('input', '#minimum_cost_per_worker', function () {
                            var Wallet = {{(auth()->user()->wallet_balance)}} ;
                            var CountOfWorker = {{$task->total_worker_limit}};
                            var CostPerWorker =  document.getElementById('minimum_cost_per_worker').value;
                            var MainCostval = CostPerWorker * CountOfWorker;
                            var AddintionalCost = {{$task->other_cost}};
                            newTaskCostAfterDiscount.innerHTML = Number((AddintionalCost - (AddintionalCost * discountAmount / 100) +  MainCostval).toFixed(2))+" USD";
                            document.getElementById("wallet_balance").innerHTML = Number((Wallet - (AddintionalCost - (AddintionalCost * discountAmount / 100) +  MainCostval)).toFixed(2)) +" USD";
                        });
                    }
                    if(result.code_type == "TotalCosts"){
                        NewTotalCostsBadge.classList.remove('d-none');
                        OldTotalCostsBadge.classList.add('decuration');
                        var Wallet = {{(auth()->user()->wallet_balance)}} ;
                        var discountAmount = result.amount;
                        var CountOfWorker = {{$task->total_worker_limit}};
                        var CostPerWorker =  document.getElementById('minimum_cost_per_worker').value;
                        var MainCostval = CostPerWorker * CountOfWorker;
                        var AddintionalCost = {{$task->other_cost}};

                        NewTotalCostsBadge.innerHTML = Number(((MainCostval + AddintionalCost) - ((MainCostval + AddintionalCost) * discountAmount/100)).toFixed(2))+" USD";
                        newTaskCostAfterDiscount.innerHTML = Number(((MainCostval + AddintionalCost) - ((MainCostval + AddintionalCost) * discountAmount/100)).toFixed(2))+" USD";
                        document.getElementById("wallet_balance").innerHTML = Number(( Wallet - ((MainCostval + AddintionalCost) - ((MainCostval + AddintionalCost) * discountAmount/100))).toFixed(2))+" USD";

                        $(document).on('input', '#minimum_cost_per_worker', function () {
                            var discountAmount = result.amount;
                            var CountOfWorker = {{$task->total_worker_limit}};
                            var CostPerWorker =  document.getElementById('minimum_cost_per_worker').value;
                            var MainCostval = CostPerWorker * CountOfWorker;
                            var AddintionalCost = {{$task->other_cost}};

                            NewTotalCostsBadge.innerHTML = Number(((MainCostval + AddintionalCost) - ((MainCostval + AddintionalCost) * discountAmount/100)).toFixed(2))+" USD";
                            newTaskCostAfterDiscount.innerHTML = Number(((MainCostval + AddintionalCost) - ((MainCostval + AddintionalCost) * discountAmount/100)).toFixed(2))+" USD";
                            document.getElementById("wallet_balance").innerHTML = Number((Wallet - ((MainCostval + AddintionalCost) - ((MainCostval + AddintionalCost) * discountAmount / 100))).toFixed(2)) + " USD";
                        });
                    }
                }
            })
        });
    </script>
@stop
