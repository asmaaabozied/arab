@extends('employer::layouts.employer.app')

@section('title')
    {{trans('employer::task.tasks')}}
@endsection
@section('content')




    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">



                <div class="row">
                    <div class="row mt-3">
                        <div class="d-flex flex-row justify-content-between Task-data">

                        </div>
                        <div class="table-responsive PrivilageRuler p-3">
                            <table class="table align-items-center table-flush" id="PrivilageRuler">
                                <thead class="thead-light">
                                <tr>
                                    <th><span class="mx-2">#</span></th>


                                    <th>{{trans('employer::task.basicInformation')}}</th>
                                    <th>{{trans('employer::task.worker_completion')}}</th>
                                    <th>{{trans('employer::task.total_task_cost')}}</th>
{{--                                    <th>{{trans('employer::task.task_status_and_enable_or_disable')}}</th>--}}
{{--                                    <th>{{trans('employer::task.is_hidden_or_showed')}}</th>--}}
                                    <th>{{trans('employer::task.taskEndDate')}}</th>
                                    <th>{{trans('employer::task.Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>


                                @if(isset($activeTasks) and count($activeTasks) > 0)
                                    <?php $count = 1?>
                                    @foreach($activeTasks as $datum)
                                        <tr>
                                            <td>{{$count++}} </td>
                                            <td>
                                                <div class="d-flex justify-content-center px-2 py-1">
                                                    <div>
                                                        @if($datum->category->image != Null)
                                                            <img   width="50%" height="50%" src="{{Storage::url($datum->category->image)}}" class="avatar avatar-sm me-3" alt="category icon">
                                                        @else
                                                            <img src="{{asset('assets/img/category/'.$datum->category->title.'.png')}}" class="avatar avatar-sm me-3" alt="category icon">
                                                        @endif
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$datum->task_number}}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ Str::words($datum->title, 3,'...')}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="progress-wrapper">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-sm font-weight-bold">{{round((($datum->approved_workers * 100) / $datum->total_worker_limit),'2')}}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="{{$datum->approved_workers}}" aria-valuemin="0" aria-valuemax="{{$datum->total_worker_limit}}" style="width: {{($datum->approved_workers * 100) / $datum->total_worker_limit}}%;"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ convertCurrency($datum->total_cost, auth()->user()->current_currency) }}
                                                <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                            </td>
{{--                                            <td>--}}
{{--                                    <span class="badge  bg-gradient-success">--}}
{{--                                        {{trans('employer::task.'.$datum->TaskStatuses()->with('status')->latest()->first()->status->name)}} {{$datum->TaskStatuses()->latest()->first()->created_at->diffForHumans()}}--}}
{{--                                    </span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                @if($datum->is_hidden == "false")--}}
{{--                                                    <span class="text-sm text-success">{{trans('employer::task.task_is_showing_now')}}</span>--}}
{{--                                                    <i class="ni ni-bell-55 text-xs text-success opacity-10 hasTooltip" aria-hidden="true">--}}
{{--                                                        <span>{{trans('employer::task.task_is_showing_now_description')}}</span>--}}
{{--                                                    </i>--}}
{{--                                                @else--}}
{{--                                                    <span class="text-sm text-secondary">{{trans('employer::task.task_is_hiding_now')}}</span>--}}
{{--                                                    <i class="ni ni-bell-55 text-xs text-secondary opacity-10 hasTooltip" aria-hidden="true">--}}
{{--                                                        <span>{{trans('employer::task.task_is_hiding_now_description')}}</span>--}}
{{--                                                    </i>--}}
{{--                                                @endif--}}
{{--                                            </td>--}}
                                            @if($datum->deferred()->exists() == true)
                                                <td>
                                                    {{$datum->task_end_date}}
                                                    <p class="text-xs text-warning mb-0">{{trans('employer::task.taskIsDeferred: ')}} {{$datum->deferred()->count()}} {{trans('employer::task.once')}}</p>
                                                </td>

                                            @else
                                                <td>{{$datum->task_end_date}} </td>
                                            @endif
                                            <td>


                                                <a href="{{route('employer.show.or.hide.active.task',[$datum->id,$datum->task_number])}}" class="mx-1"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-original-title="Preview product">
                                                    @if($datum->is_hidden == "false")
                                                        <i class="fas fa-eye-slash text-gray"></i>
                                                        <span class="text-gray">{{trans('employer::task.hideTaskForWorkers')}}</span>
                                                    @else
                                                        <i class="fas fa-eye text-purple"></i>
                                                        <span class="text-purple">{{trans('employer::task.showTaskForWorkers')}}</span>
                                                    @endif
                                                </a>

                                                <a href="{{route('employer.show.active.tasks.details',[$datum->id,$datum->task_number])}}" class="mx-1"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-original-title="Preview product">
                                                    <i class="fas fa-tasks text-primary"></i>
                                                    <span class="text-primary">{{trans('employer::task.showDetails')}}</span>
                                                </a>
                                                <a href="{{route('employer.show.active.tasks.proofs',[$datum->id,$datum->task_number])}}" class="mx-1"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-original-title="Preview product">
                                                    {{--                                        <i class="fas fa-tasks text-success"></i>--}}
                                                    {{--                                        <i class="fas fa-paperclip text-success"></i>--}}
                                                    <i class="fas fa-award text-success"></i>
                                                    <span class="text-success">{{trans('employer::task.taskProof')}}</span>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="6">
                                        <div class="text-warning text-center">{{trans('employer::task.NoActiveTasks')}}</div>
                                    </td>
                                @endif

                                </tbody>


                            </table>
                        </div>


                    </div>
                </div>


            </div>

        </div>
    </div>







@stop
