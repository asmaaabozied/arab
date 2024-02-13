@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row mt-0">
        <div class="card card-plain mb-0">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column h-100">
                            <h4 class="font-weight-bolder mb-0">{{trans('admin::admin.TasksGlimpse')}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-4 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::admin.CountOfCompletedTasks')}}</p>
                                <h5 class="font-weight-bolder text-primary mb-0">
                                    {{count($completeTasks)}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-4 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::admin.CountOfActivatedTasks')}}</p>
                                <h5 class="font-weight-bolder text-success mb-0">
                                    {{count($activeTasks)}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                <i class="ni ni-sound-wave text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-4 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::admin.CountOfPendingTasks')}}</p>
                                <h5 class="font-weight-bolder text-warning mb-0">
                                    {{count($pendingTasks)}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                                <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-4 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::admin.CountOfCanceledTasks')}}</p>
                                <h5 class="font-weight-bolder text-danger mb-0">
                                    {{count($rejectedTasks)}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                                <i class="	fas fa-stop-circle text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-4 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::admin.CountOfUnPayedTasks')}}</p>
                                <h5 class="font-weight-bg-gradient-secondary mb-0">
                                    {{count($unPayedTasks)}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-secondary shadow text-center border-radius-md">

                                <i class="		fas fa-search-dollar text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-4 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::admin.CountOfNotPublishTasks')}}</p>
                                <h5 class="font-weight-bolder text-secondary mb-0">
                                    {{$count_NotPublished_tasks}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-secondary shadow text-center border-radius-md">
                                {{--                                <i class="ni ni-button-power text-lg opacity-10" aria-hidden="true"></i>--}}
                                <i class="fas fa-low-vision text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body px-0 pb-0">
        <div class="table-responsive">
            <table class="table table-flush" id="datatable-list">
                <thead class="thead-light">
                <tr>
                    <th>{{trans('admin::task.basicInformation')}}</th>
                    <th>{{trans('admin::task.employer_number')}}</th>
                    <th>{{trans('admin::task.total_worker_limit')}}</th>
                    <th>{{trans('admin::task.task_end_date')}}</th>
{{--                    <th>{{trans('admin::task.task_status')}}</th>--}}
                    <th>{{trans('admin::task.Actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($tasks) and $tasks->count()>0)
                    @foreach($tasks as $task)
                        <tr>
                            <td class="align-middle text-center">
                                <div class="d-flex justify-content-between px-2 py-1">
                                    <div>
                                        @if($task->category->image != Null)
                                            <img src="{{Storage::url($task->category->image)}}" class="avatar avatar-sm me-3" alt="category icon">
                                        @else
                                            <img src="{{asset('assets/img/category/'.$task->category->title.'.png')}}" class="avatar avatar-sm me-3" alt="category icon">
                                        @endif
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{$task->task_number}}</h6>
                                        <p class="text-xs text-secondary mb-0">{{ Str::words($task->title, 3,'...') }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="text-sm">{{$task->employer->employer_number}} </td>
                            <td class="text-sm text-secondary">   {{$task->total_worker_limit}}
                            <td class="text-sm ">{{$task->task_end_date}}</td>
{{--                            <td class="align-middle text-center text-sm">--}}
{{--                                <span class="badge badge-sm {{"task_".$task->task_status}} ">{{trans('admin::task.'.$task->task_status)??$task->task_status}} </span>--}}
{{--                                {{$task->TaskStatuses()->with('status')->latest()->first()->status->name}}--}}

{{--                            </td>--}}
                            <td class="text-sm">
                                <a href="{{route('admin.show.task.details',$task->id)}}" class="mx-1"
                                   data-bs-toggle="tooltip"
                                   data-bs-original-title="Preview product">
                                    <i class="fas fa-eye text-primary"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <td colspan="6">
                        <div class="text-danger text-center">{{trans('admin::task.NoDataFound')}}</div>
                    </td>
                @endif
                </tbody>

            </table>
        </div>
    </div>
@stop
