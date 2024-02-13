@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row bg-white">
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-list">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th class="text-xxs">{{trans('employer::task.basicInformation')}}</th>
                        <th class="text-xxs">{{trans('employer::task.total_task_cost')}}</th>
                        <th class="text-xxs">{{trans('employer::task.cost_per_worker')}}</th>
                        <th class="text-xxs">{{trans('employer::task.total_worker_limit')}}</th>
                        <th class="text-xxs">{{trans('employer::task.status_of_task')}}</th>
                        <th class="text-xxs">{{trans('employer::task.task_end_date')}}</th>
                        <th class="text-xxs">{{trans('employer::task.Actions')}}</th>
                    </tr>
                    </thead>
                    </thead>
                    <tbody>

                    @if(isset($completeTasks) and count($completeTasks) > 0)
                        <?php $count = 1?>
                        @foreach($completeTasks as $datum)
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

                                <td class="text-center text-sm ">{{$datum->total_cost}} $</td>
                                <td class="text-center text-sm ">{{$datum->cost_per_worker}} $</td>
                                <td class="text-center text-sm ">{{$datum->total_worker_limit}}</td>
                                <td class="text-center text-center text-xs  "><span class="badge  bg-gradient-success">{{trans('employer::task.'.$datum->TaskStatuses()->with('status')->latest()->first()->status->name)}} {{$datum->TaskStatuses()->latest()->first()->created_at->diffForHumans()}}</span> </td>
                                <td class="text-center text-sm ">{{$datum->task_end_date}} </td>

                                <td class="text-center text-sm">
                                    <a href="{{route('admin.show.complete.tasks.details',[$datum->id,$datum->task_number])}}" class="mx-1"
                                       data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-eye text-primary"></i>
                                        <span class="text-primary">{{trans('employer::task.showDetails')}}</span>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="8">
                            <div class="text-warning text-center">{{trans('employer::task.NoCompleteTasks')}}</div>
                        </td>
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@stop
