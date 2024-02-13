@extends('worker::layouts.worker.app')
@section('title')
    @lang('site.dashboard')
@endsection
@section('content')


    <div class="col-lg-9 mt-5 col-sm-12">
        <div class="profile-details p-5">
            <div class="d-flex flex-row">
                <img src="{{asset('frontend/assets/img/4043263_avatar_muslim_paranja_woman_icon.png')}}"
                     class="img-fluid small-img">
                <h5 class="profile-title ">{{trans('worker::worker.hello')}} : {{auth()->user()->name}}</h5>
            </div>
            <div>
                <div class="d-flex flex-row justify-content-between">
                    <h5 class="profile-title mt-3">    {{trans('worker::worker.CountOfActivatedTasks')}} </h5>
                    {{--                    <h5 class="profile-title mt-3">الجدول</h5>--}}
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 col-xs-12">
                        <div class="d-flex flex-row  justify-content-between sub-profile-details ">
                            <div class="sub1 "><h2>{{$finishTasks}}</h2></div>
                            <span class="mt-2">    {{trans('worker::worker.CountOfFinishTasks')}}  </span>


                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="d-flex flex-row  justify-content-between sub-profile-details ">
                            <div class="sub1 sub2 "><h2>{{$activeTasks}}</h2></div>
                            <span class="mt-2">   {{trans('worker::worker.CountOfAcceptedTasks')}}  </span>

                        </div>

                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-6 col-xs-12">
                        <div class="d-flex flex-row  justify-content-between sub-profile-details ">
                            <div class="sub1 bg-black"><h2>{{$rejectedTask}}</h2></div>
                            <span class="mt-2">
                                                                {{trans('worker::worker.CountOfRejectedTasks')}}

                            </span>


                        </div>

                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="d-flex flex-row  justify-content-between sub-profile-details ">
                            <div class="sub1 " style="background-color:#B62E2E ;"><h2>{{$activeTasks}}</h2>
                            </div>
                            <span class="mt-2">
                                                                  {{trans('worker::worker.CountOfActivatedTasks')}}

                            </span>

                        </div>

                    </div>
                </div>
            </div>
            <div>

            </div>
        </div>
    </div>


@endsection
