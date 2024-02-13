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
                            {{--                            <select class="form-select" aria-label="Default select example">--}}
                            {{--                                <option selected> الفرز حسب </option>--}}
                            {{--                                <option value="1">One</option>--}}
                            {{--                                <option value="2">Two</option>--}}
                            {{--                                <option value="3">Three</option>--}}
                            {{--                            </select>--}}
                        </div>
                        <div class="table-responsive PrivilageRuler p-3">
                            <table class="table align-items-center table-flush" id="PrivilageRuler">
                                <thead class="thead-light">
                                <tr>
                                    <th><span class="mx-2">#</span></th>


                                    <th>{{trans('employer::task.basicInformation')}}</th>
{{--                                    <th>{{trans('employer::task.task_created_at')}}</th>--}}
                                    <th>{{trans('employer::task.total_worker_limit')}}</th>
                                    <th>{{trans('employer::task.total_task_cost')}}</th>
                                    <th>{{trans('employer::task.status_of_task')}}</th>
                                    <th>{{trans('employer::task.Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>


                                @if(isset($pendingTasks) and count($pendingTasks) > 0)
                                    <?php $count = 1?>
                                    @foreach($pendingTasks as $datum)
                                        <tr>
                                            <td>{{$count++}} </td>
                                            <td>
                                                <div class="d-flex justify-content-center px-2 py-1">
                                                    <div>
                                                        @if($datum->category->image != Null)
                                                            <img src="{{Storage::url($datum->category->image)}}" width="50%" height="50%"
                                                                 class="avatar avatar-sm me-3" alt="category icon">
                                                        @else
                                                            <img
                                                                src="{{asset('assets/img/category/'.$datum->category->title.'.png')}}"
                                                                class="avatar avatar-sm me-3" alt="category icon">
                                                        @endif
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$datum->task_number}}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ Str::words($datum->title, 3,'...')}}</p>
                                                    </div>
                                                </div>
                                            </td>
{{--                                            <td><span--}}
{{--                                                    class="badge  bg-gradient-info">{{$datum->created_at->diffForHumans()}}</span>--}}
{{--                                            </td>--}}
                                            <td>  {{$datum->total_worker_limit}} </td>
                                            <td>
                                                {{ convertCurrency($datum->total_cost, auth()->user()->current_currency) }}
                                                <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                            </td>
                                            <td><span
                                                    class="badge  bg-gradient-warning">{{trans('employer::task.'.$datum->TaskStatuses()->with('status')->latest()->first()->status->name)}} {{$datum->TaskStatuses()->latest()->first()->created_at->diffForHumans()}}</span>
                                            </td>
                                            <td>
                                                <a href="{{route('employer.show.pending.tasks.details',[$datum->id,$datum->task_number])}}"
                                                   class="mx-1"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-original-title="Preview product">
                                                    <i class="fas fa-eye text-primary"></i>
                                                    <span
                                                        class="text-primary">{{trans('employer::task.showDetails')}}</span>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="6">
                                        <div
                                            class="text-warning text-center">{{trans('employer::task.NoPendingTasks')}}</div>
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
