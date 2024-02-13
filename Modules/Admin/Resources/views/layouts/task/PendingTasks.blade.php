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
                        <th class="text-xxs">{{trans('employer::task.task_created_at')}}</th>
                        <th class="text-xxs">{{trans('employer::task.total_worker_limit')}}</th>
                        <th class="text-xxs">{{trans('employer::task.total_task_cost')}}</th>
                        <th class="text-xxs">{{trans('employer::task.status_of_task')}}</th>
                        <th class="text-xxs">{{trans('employer::task.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($pendingTasks) and count($pendingTasks) > 0)
                        <?php $count = 1?>
                        @foreach($pendingTasks as $datum)
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
                                <td class="text-center text-center text-xs  "><span class="badge  bg-gradient-info">{{$datum->created_at->diffForHumans()}}</span> </td>
                                <td class="text-center text-sm text-secondary">  {{$datum->total_worker_limit}} </td>
                                <td class="text-center text-sm ">{{$datum->total_cost}} $</td>
                                <td class="text-center text-center text-xs  "><span class="badge  bg-gradient-warning">{{trans('employer::task.'.$datum->TaskStatuses()->with('status')->latest()->first()->status->name)}} {{$datum->TaskStatuses()->latest()->first()->created_at->diffForHumans()}}</span> </td>
                                <td class="text-center text-sm">
                                    <a href="{{route('admin.show.pending.tasks.details',[$datum->id,$datum->task_number])}}" class="mx-1"
                                       data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-eye text-primary"></i>
                                        <span class="text-primary">{{trans('employer::task.showDetails')}}</span>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="6">
                            <div class="text-warning text-center">{{trans('employer::task.NoPendingTasks')}}</div>
                        </td>
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@stop
