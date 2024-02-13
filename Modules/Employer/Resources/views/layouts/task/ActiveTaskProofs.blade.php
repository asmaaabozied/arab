@extends('employer::layouts.employer.app')

@section('title')
    {{trans('employer::task.tasks')}}
@endsection
@section('content')




    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
    <div class="row ">
        <div class="col-lg-6 col-md-6 col-12 my-1  ">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.task_number')}}</p>
                                <h5 class="font-weight-bolder text-primary mb-0">
                                    {{$task->task_number}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fa fa-hashtag text-primary text-lg opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.task_category')}}</p>
                                <h5 class="font-weight-bolder text-primary mb-0">
                                     @if(app()->getLocale() == "ar")
                                        {{$task->category->ar_title}}
                                    @else
                                        {{$task->category->title}}
                                    @endif
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fa fa-grip text-primary text-lg opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.CountOfProofsNeeded')}}</p>
                                <h5 class="font-weight-bolder text-warning mb-0">
                                     {{$task->total_worker_limit}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fa fa-floppy-disk text-warning text-lg opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.CountOfProofsSent')}}</p>
                                <h5 class="font-weight-bolder text-success mb-0">
                               {{$proofs->count()}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fa fa-floppy-disk text-success text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    @if($task->deferred()->exists() == true)
        <div class="row mt-2 p-3">
            <h5 class="mt-3 text-primary">{{trans('employer::task.TaskEndDateFlow')}}</h5>
            <div class="card mt-3 bg-white">
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side" data-timeline-axis-style="dashed">
                        @for($i=0;$i<count($task->deferred);$i++)
                            <div class="timeline-block mb-3">
                            <span class="timeline-step bg-light">
                            <i class="ni ni-calendar-grid-58 text-warning text-gradient"></i>
                            </span>
                                <div class="timeline-content max-w-unset">
                                    <h6 class=" text-sm font-weight-bold mb-0">{{trans('employer::task.deferred_number')}}
                                        ({{$i+1}}): <span
                                            class="text-lg">{{$task->deferred[$i]->duration_of_defer}} {{trans('employer::task.day')}}</span>
                                    </h6>
                                    <p class="text-warning font-weight-bold text-xs mt-1 mb-0">{{trans('employer::task.deferred_action_at')}}{{$task->deferred[$i]->created_at}}</p>
                                    <p class="text-secondary text-sm mt-3 mb-2">
                                        {{trans('employer::task.The task has been delayed due to')}}
                                        @if(\Illuminate\Support\Facades\Lang::has('privilege::privilege.'.$task->deferred[$i]->reason_of_defer))
                                            ({{trans('privilege::privilege.'.$task->deferred[$i]->reason_of_defer)}})
                                        @else
                                           ( {{$task->deferred[$i]->reason_of_defer}})
                                        @endif


                                        {{trans('employer::task.for_duration')}}
                                        {{$task->deferred[$i]->duration_of_defer}}
                                        {{trans('employer::task.day')}}
                                        {{trans('employer::task.And we increased the number of workers from: ')}}
                                        ({{$task->deferred[$i]->main_total_worker_limit}})
                                        {{trans('employer::task.to_workers')}}
                                        ({{$task->deferred[$i]->new_total_worker_limit}})
                                        {{trans('employer::task.workers')}}
                                        {{trans('employer::task.reason_of_increased_workers_number')}}
                                    </p>
                                    <p class="text-secondary text-sm mt-1 mb-2">
                                        {{trans('employer::task.data_after_duration')}}
                                        {{$task->deferred[$i]->main_end_date}}
                                    </p>
                                    <p class="text-secondary text-sm mt-1 mb-2">
                                        {{trans('employer::task.data_before_duration')}}
                                        {{$task->deferred[$i]->new_end_date}}
                                    </p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row bg-white">
        <div class="card-body px-0 pb-0">
            <div class="table-responsive PrivilageRuler p-3">
                <table class="table align-items-center table-flush" id="PrivilageRuler">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>{{trans('employer::task.worker_number')}}</th>
                        <th>{{trans('employer::task.proof_sent_at')}}</th>
                        <th>{{trans('employer::task.isEmployerAcceptProof')}}</th>
                        <th>{{trans('employer::task.isAdminAcceptProof')}}</th>
                        <th>{{trans('employer::task.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($proofs) and count($proofs) > 0)
                        <?php $count = 1?>
                        @foreach($proofs as $datum)
                            <tr>
                                <td>{{$count++}} </td>
                                <td><span class="text-dark">{{$datum->worker->worker_number}}</span></td>
                                <td><span
                                        class="badge  bg-gradient-info">{{$datum->created_at->diffForHumans()}}</span>
                                </td>
                                <td><span
                                        class="badge   {{'prof_'.$datum->isEmployerAcceptProof}} ">{{trans('employer::task.proof_status_'.$datum->isEmployerAcceptProof)}}</span>
                                </td>
                                <td><span
                                        class="badge   {{'prof_'.$datum->isAdminAcceptProof}} ">{{trans('employer::task.proof_status_'.$datum->isAdminAcceptProof)}}</span>
                                </td>
                                <td>
                                    <a href="{{route('employer.show.active.tasks.proof.details',[$task->id,$datum->id])}}"
                                       class="mx-1"
                                       data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-paperclip text-success"></i>
                                        <span class="text-success">{{trans('employer::task.showTaskProof')}}</span>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="6">
                            <div class="text-warning text-center">{{trans('employer::task.NoProofForThisTask')}}</div>
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
