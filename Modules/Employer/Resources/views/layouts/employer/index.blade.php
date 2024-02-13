@extends('employer::layouts.employer.app')
@section('title')
    {{trans('site.dashboard')}}
@endsection
@section('content')


    <div class="col-lg-9 mt-5 col-sm-12">
        <div class="profile-details p-5">
            <div class="d-flex flex-row">
                <img src="{{asset('frontend/assets/img/4043263_avatar_muslim_paranja_woman_icon.png')}}"
                     class="img-fluid small-img">
                <h5 class="profile-title ">{{trans('employer::employer.hello')}} : {{auth()->user()->name}}</h5>
            </div>
            <div>
                <div class="d-flex flex-row justify-content-between">
                    <h5 class="profile-title mt-3">  {{trans('employer::employer.TasksGlimpse')}}  </h5>
                    {{--                    <h5 class="profile-title mt-3">الجدول</h5>--}}
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 col-xs-12">
                        <div class="d-flex flex-row  justify-content-between sub-profile-details ">
                            <div class="sub1 "><h2>{{ count($completeTasks) }}</h2></div>
                            <span class="mt-2"> {{ trans('employer::employer.taskInComplete') }}  </span>


                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="d-flex flex-row  justify-content-between sub-profile-details ">
                            <div class="sub1 sub2 "><h2>{{ count($activeTasks) }}</h2></div>
                            <span class="mt-2"> {{ trans('employer::employer.taskInActive') }}  </span>


                        </div>

                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-6 col-xs-12">
                        <div class="d-flex flex-row  justify-content-between sub-profile-details ">
                            <div class="sub1 bg-black"><h2>{{ count($pendingTasks)}}</h2></div>
                            <span class="mt-2">
                                                                {{ trans('employer::employer.taskInPendingToAcceptAdmin') }}

                            </span>

                        </div>

                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="d-flex flex-row  justify-content-between sub-profile-details ">
                            <div class="sub1 " style="background-color:#B62E2E ;"><h2>{{count($rejectedTasks)}}</h2>
                            </div>
                            <span class="mt-2">
                                {{ trans('employer::employer.taskInCanceled') }}

                            </span>

                        </div>

                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 col-xs-12">
                        <div class="d-flex flex-row  justify-content-between sub-profile-details ">
                            <div class="sub1 bg-" style="background-color:#0099FF "><h2>{{count($unPayedTasks)}}</h2>
                            </div>
                            <span class="mt-2">
                                                            {{ trans('employer::employer.NotPayedTasks') }}

                            </span>

                        </div>

                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="d-flex flex-row  justify-content-between sub-profile-details ">
                            <div class="sub1 " style="background-color:#666666;"><h2>{{$count_NotPublished_tasks}}</h2></div>
                            <span class="mt-2">
                                                            {{ trans('employer::employer.NotPublishedTasks') }}

                            </span>

                        </div>

                    </div>
                </div>
            </div>
            <div>
                <h5 class="profile-title mt-3"> {{trans('employer::employer.snapshot_costs_paid_tasks')}} </h5>
                <div class="row mt-4">
                    <div class="col-md-6 col-xs-12">
                        <div class="d-flex flex-row  justify-content-between sub-profile-details p-0 ">
                            <div class="sub1 paid-number bg-black"><h2 style="font-size:12px">
                                    {{ convertCurrency($total_task_cost, auth()->user()->current_currency) }}

                                    <br>
                                    {{ auth()->user()->current_currency }}

                                </h2></div>
                            <span class="mt-2">  {{ trans('employer::employer.MainCosts') }}  </span>

                        </div>

                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="d-flex flex-row  justify-content-between sub-profile-details p-0 ">
                            <div class="sub1 paid-number" style="background:#EF626C"><h2 style="font-size:12px">    {{ convertCurrency($total_other_cost, auth()->user()->current_currency) }}
                                    <br>
                                    {{ auth()->user()->current_currency }}
                                </h2></div>
                            <span class="mt-2">  {{ trans('employer::employer.AdditionalCosts') }}   </span>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
