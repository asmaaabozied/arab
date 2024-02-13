@extends('dashboard::layouts.admin.master')
@section('content')

    <div class="row">

        @if($errors->has('task_plus_date_id'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('task_plus_date_id') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif    @if($errors->has('new_end_date'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('new_end_date') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif    @if($errors->has('new_total_worker_limit'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('new_total_worker_limit') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif    @if($errors->has('reason_of_task_defer'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('reason_of_task_defer') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="row bg-white">
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-list">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th class="text-xxs">{{trans('employer::task.basicInformation')}}</th>
                        <th class="text-xxs">{{trans('employer::task.worker_completion')}}</th>
                        <th class="text-xxs">{{trans('employer::task.total_task_cost')}}</th>
                        <th class="text-xxs">{{trans('employer::task.status_of_task')}}</th>
                        <th class="text-xxs">{{trans('employer::task.task_end_date')}}</th>
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
                                                <img src="{{Storage::url($datum->category->image)}}"
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
                                <td class="text-center text-center text-xs  ">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="progress-percentage">
                                                <span class="text-sm font-weight-bold">{{round((($datum->approved_workers * 100) / $datum->total_worker_limit),'2')}}%</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-success" role="progressbar"
                                                 aria-valuenow="{{$datum->approved_workers}}" aria-valuemin="0"
                                                 aria-valuemax="{{$datum->total_worker_limit}}"
                                                 style="width: {{($datum->approved_workers * 100) / $datum->total_worker_limit}}%;"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center text-sm ">{{$datum->total_cost}} $</td>
                                <td class="text-center text-center text-xs  "><span
                                        class="badge  bg-gradient-success">{{trans('employer::task.'.$datum->TaskStatuses()->with('status')->latest()->first()->status->name)}} {{$datum->TaskStatuses()->latest()->first()->created_at->diffForHumans()}}</span>
                                </td>
                                <td class="text-center text-sm ">{{$datum->task_end_date}} </td>

                                <td class="text-center text-sm">
                                    <a href="{{route('admin.show.active.tasks.details',[$datum->id,$datum->task_number])}}"
                                       class="mx-1"
                                       data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-eye text-primary"></i>
                                        <span class="text-primary">{{trans('employer::task.showDetails')}}</span>
                                    </a>
                                    <a href="{{route('admin.show.active.tasks.proofs',[$datum->id,$datum->task_number])}}"
                                       class="mx-1"
                                       data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-award text-success"></i>
                                        <span class="text-success">{{trans('employer::task.taskProof')}}</span>
                                    </a>
                                 <a href="javascript:;"
                                       class="mx-1"
                                        onclick="ShowPlusTimeSwal('{{ $datum->id }}')"
                                       data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fa fa-calendar-plus-o text-secondary"></i>
                                        <span class="text-secondary">{{trans('admin::task.plus_task_end_date_time')}}</span>
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
    <div class="swal-overlay swal-overlay--show-modal d-none" id="PlusTaskEndDateTimeSwal" tabindex="-1">
        <div class="swal-modal" role="dialog" aria-modal="true">
            <div class="swal-icon swal-icon--info"></div>
            <div class="swal-title text-secondary">{{trans('admin::task.PlusTaskEndDateTimeTitle')}}</div>
            <div class="swal-text text-warning text-center" >
                {{trans('admin::task.PlusTaskEndDateTimeTitleText')}}
            </div>

            <form id="plus-task-time-form" action="" method="POST" class="">
                @csrf
                <div class="row m-1">
                    <input type="number" id="task_plus_date_id" name="task_plus_date_id"  value="" class="d-none" required>
                    <div class="form-group col-12 ">
                        <label for="example-url-input"
                               class="form-control-label">{{trans('admin::task.new_task_end_date')}}</label>

                        <input class="form-control" type="date" placeholder="{{trans('admin::task.new_task_end_date')}}"
                               name="new_end_date" value=""
                               min="{{date('Y-m-d')}}"
                               id="new_end_date" required >
                    </div>
                    <div class="form-group col-12 ">
                        <label for="example-url-input"
                               class="form-control-label">{{trans('admin::task.new_total_worker_limit')}}</label>
                        <input class="form-control" type="number" placeholder="{{trans('admin::task.new_total_worker_limit')}}"
                               name="new_total_worker_limit" value=""
                               min=""
                               id="new_total_worker_limit" required>
                    </div>

                    <div class="form-group col-12 ">
                        <label for="example-url-input"
                               class="form-control-label">{{trans('admin::task.reason_of_task_defer')}}</label>
                        <input class="form-control" type="text" placeholder="{{trans('admin::task.reason_of_task_defer')}}"
                               name="reason_of_task_defer" value="{{trans('admin::task.main_reason_for_deferred')}}"
                               id="reason_of_task_defer" required >
                    </div>

                </div>

            </form>


            <div class="swal-footer">
                <div class="swal-button-container d-flex justify-content-between">
                    <a  onclick="event.preventDefault(); document.getElementById('plus-task-time-form').submit();" class="btn bg-gradient-success w-auto m-4">{{trans('admin::task.SubmitPlusTimeBtn')}}</a>
                    <button class="btn bg-gradient-secondary w-auto m-4" onclick="hidePlusTimeSwal()">{{trans('employer::employer.cancelBtn')}}</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        function ShowPlusTimeSwal(task_id) {
            $(document).ready(function () {
                $.ajax({
                    url: "{{route('admin.get.active.tasks.details.using.ajax')}}",
                    type: "POST",
                    data: {
                        task_id: task_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        document.getElementById('PlusTaskEndDateTimeSwal').classList.remove('d-none');
                        document.getElementById('new_end_date').value = response.task_end_date;
                        document.getElementById('new_total_worker_limit').value =response.total_worker_limit;
                        document.getElementById('task_plus_date_id').value = response.id;
                        document.getElementById('plus-task-time-form').action ="{{ route('admin.deferred.active.tasks',"/") }}"+ "/"  +response.id;

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

            });


        }
        function hidePlusTimeSwal(){
            document.getElementById('PlusTaskEndDateTimeSwal').classList.add('d-none');
        }
    </script>

@stop
