@extends('dashboard::layouts.admin.master')
@section('content')

    <div class="row ">
        <div class="card card-plain ">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column h-100">
                            <h4 class="font-weight-bolder mb-0">{{trans('employer::task.TasksProofGlimpse')}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.task_number')}}</p>
                                <h5 class="font-weight-bolder text-primary mb-0">
                                    {{$task->task_number}}
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
        <div class="col-xl-6 col-sm-6 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.task_category')}}</p>
                                <h5 class="font-weight-bolder text-success mb-0">
                                    {{$task->category->title}}
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
        <div class="col-xl-6 col-sm-6 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.CountOfProofsNeeded')}}</p>
                                <h5 class="font-weight-bolder text-secondary mb-0">
                                    {{$task->total_worker_limit}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-secondary shadow text-center border-radius-md">
                                <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::task.CountOfProofsSent')}}</p>
                                <h5 class="font-weight-bolder text-danger mb-0">
                                    {{$proofs->count()}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                                <i class="ni ni-button-power text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row bg-white">
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-list">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th class="text-xxs">{{trans('employer::task.worker_number')}}</th>
                        <th class="text-xxs">{{trans('employer::task.proof_sent_at')}}</th>
                        <th class="text-xxs">{{trans('employer::task.isEmployerAcceptProof')}}</th>
                        <th class="text-xxs">{{trans('employer::task.isAdminAcceptProof')}}</th>
                        <th class="text-xxs">{{trans('employer::task.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($proofs) and count($proofs) > 0)
                        <?php $count = 1?>
                        @foreach($proofs as $datum)
                            <tr>
                                <td class="text-center text-sm">{{$count++}} </td>
                                <td class="text-center text-sm "><span class="text-dark">{{$datum->worker->worker_number}}</span></td>
                                <td class="text-center text-sm "><span
                                        class="badge  bg-gradient-info">{{$datum->created_at->diffForHumans()}}</span>
                                </td>
                                <td class="text-center text-sm "><span
                                        class="badge   {{'prof_'.$datum->isEmployerAcceptProof}} ">{{trans('employer::task.proof_status_'.$datum->isEmployerAcceptProof)}}</span>
                                </td>
                                <td class="text-center text-sm "><span
                                        class="badge   {{'prof_'.$datum->isAdminAcceptProof}} ">{{trans('employer::task.proof_status_'.$datum->isAdminAcceptProof)}}</span>
                                </td>
                                <td class="text-center text-sm">
                                    <a href="{{route('admin.show.complete.tasks.proof.details',[$task->id,$datum->id])}}"
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
@stop
