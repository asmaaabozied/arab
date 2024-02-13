@extends('dashboard::layouts.employer.master')
@section('content')
    <div class="row bg-white">
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-list">
                    <thead class="thead-light">
                    <tr class="bg-table">
                        <th>#</th>
                        <th class="text-xxs">{{trans('employer::task.basicInformation')}}</th>
                        <th class="text-xxs">{{trans('employer::task.worker_completion')}}</th>
                        <th class="text-xxs">{{trans('employer::task.total_task_cost')}}</th>
                        <th class="text-xxs">{{trans('employer::task.task_status_and_enable_or_disable')}}</th>
                        <th class="text-xxs">{{trans('employer::task.is_hidden_or_showed')}}</th>
                        <th class="text-xxs">{{trans('employer::task.taskEndDate')}}</th>
                        <th class="text-xxs">{{trans('employer::task.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($activeTasks) and count($activeTasks) > 0)
                        <?php $count = 1?>
                        @foreach($activeTasks as $datum)
                            <tr>
                                <td class="text-center text-center text-sm">{{$count++}} </td>
                                <td class="text-center align-middle text-center">
                                    <div class="d-flex justify-content-center px-2 py-1">
                                        <div>
                                            @if($datum->category->image != Null)
                                                <img src="{{Storage::url($datum->category->image)}}" class="avatar avatar-sm me-3" alt="category icon">
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
                                <td class="text-center text-center text-xs  ">
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
                                <td class="text-center text-sm ">
                                    {{ convertCurrency($datum->total_cost, auth()->user()->current_currency) }}
                                    <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                </td>
                                <td class="text-center text-center text-xs  ">
                                    <span class="badge  bg-gradient-success">
                                        {{trans('employer::task.'.$datum->TaskStatuses()->with('status')->latest()->first()->status->name)}} {{$datum->TaskStatuses()->latest()->first()->created_at->diffForHumans()}}
                                    </span>
                                </td>
                                <td class="text-center text-sm">
                                    @if($datum->is_hidden == "false")
                                        <span class="text-sm text-success">{{trans('employer::task.task_is_showing_now')}}</span>
                                        <i class="ni ni-bell-55 text-xs text-success opacity-10 hasTooltip" aria-hidden="true">
                                            <span>{{trans('employer::task.task_is_showing_now_description')}}</span>
                                        </i>
                                    @else
                                        <span class="text-sm text-secondary">{{trans('employer::task.task_is_hiding_now')}}</span>
                                        <i class="ni ni-bell-55 text-xs text-secondary opacity-10 hasTooltip" aria-hidden="true">
                                            <span>{{trans('employer::task.task_is_hiding_now_description')}}</span>
                                        </i>
                                    @endif
                                </td>
                                @if($datum->deferred()->exists() == true)
                                <td class="text-center text-sm ">
                                    {{$datum->task_end_date}}
                                    <p class="text-xs text-warning mb-0">{{trans('employer::task.taskIsDeferred: ')}} {{$datum->deferred()->count()}} {{trans('employer::task.once')}}</p>
                                </td>

                                @else
                                    <td class="text-center text-sm ">{{$datum->task_end_date}} </td>
                                @endif
                                <td class="text-center text-sm">


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
@stop
