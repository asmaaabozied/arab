@extends('worker::layouts.worker.app')
@section('title')
    {{trans('employer::task.tasks')}}
@endsection
@section('content')

    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
    <div class="row bg-white">
        <div class="card-body px-0 pb-0">
            <div class="table-responsive PrivilageRuler p-3">
                <table class="table align-items-center table-flush" id="PrivilageRuler">
                    <thead class="thead-light">
                    <tr>
                        <th><span class="mx-2">#</span></th>
                        <th>{{trans('worker::task.basicInformation')}}</th>
                        <th>{{trans('worker::task.date_of_apply')}}</th>
                        <th>{{trans('worker::task.task_end_date')}}</th>
                        <th>{{trans('worker::task.worker_task_price')}}</th>
{{--                        <th>{{trans('worker::task.workers_completion')}}</th>--}}
                        <th>{{trans('worker::task.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($data) and count($data) > 0)
                        <?php $count = 1?>
                        @foreach($data as $datum)
                            <tr>
                                <td class="text-center text-sm">{{$count++}} </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex justify-content-center ">
                                        <div>
                                            @if($datum->task->category->image != Null)
                                                <img src="{{Storage::url($datum->task->category->image)}}"
                                                     width="40%" height="40%"       class="avatar avatar-sm " alt="category icon">
                                            @else
                                                <img
                                                    src="{{asset('assets/img/category/'.$datum->task->category->title.'.png')}}"
                                                    class="avatar avatar-sm " alt="category icon">
                                            @endif
                                        </div>
                                        <div class="d-flex flex-column justify-content-around">
                                            <h6 class="mb-0 text-sm">{{ Str::words($datum->task->title, 3,'...') }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$datum->task->task_number}}</p>
                                        </div>
                                    </div>
                                </td>


                                <td class="text-sm text-center ">{{$datum->created_at}}</td>
                                <td class="text-sm text-center ">{{$datum->task->task_end_date}}</td>
                                <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                        {{ number_format(convertCurrency($datum->task->cost_per_worker, auth()->user()->current_currency),1) }}
                                    <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                </td>
                                <td class="text-sm text-center">
                                    <a href="{{route('worker.show.task.in.active.details',[$datum->task->id,$datum->task->task_number])}}" class="mx-1"
                                       data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-eye text-primary  text-lg"></i>
                                            {{trans('worker::task.showDetails')}}
                                    </a>
                                    <a href="{{route('worker.show.task.finish.the.job.form',[$datum->task->id,$datum->task->task_number])}}" class="mx-1"
                                       data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="far fa-check-circle text-success  text-lg"></i>
                                            {{trans('worker::task.finishedTask')}}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="6">
                            <div class="text-warning text-center">{{trans('worker::task.You dont have  active  task ')}}</div>
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
