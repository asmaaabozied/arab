@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="page-header min-height-300 border-radius-xl mt-4 "
         style="background-image:url({{asset('assets/img/curved-images/curved0.jpg')}}) ; background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>

    </div>
    <div class="card card-body shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    @if($employer->google_id == null)
                        @if($employer->avatar != Null)
                            <img src="{{Storage::url($employer->avatar)}}" class="w-100 border-radius-lg shadow-sm"
                                 alt="avatar">
                        @else
                            <img src="{{asset('assets/img/default/default-avatar.svg')}}"
                                 class="w-100 border-radius-lg shadow-sm" alt="avatar">
                        @endif
                    @else
                        <img src="{{$employer->avatar}}"
                             class="w-100 border-radius-lg shadow-sm" alt="avatar">
                    @endif
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{$employer->name}} <span class="mb-0 font-weight-bold text-sm" style="color:#0099ff ">{{trans('admin::employer.Joined_at')}}: {{$employer->created_at->format('d-m-Y')}}</span>
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        {{trans('admin::employer.email')}}: <span class="mb-0 font-weight-bold text-sm"
                                                                  style="color:#0099ff ">{{$employer->email}}</span>
                        || {{trans('admin::employer.country')}}: <span class="mb-0 font-weight-bold text-sm"
                                                                       style="color:#0099ff ">
                             @if($employer->country !=null)
                                {{$employer->country->name}}
                            @else
                                {{trans('employer::employer.country_not_set')}}
                            @endif

                        </span>
                        || {{trans('admin::employer.city')}}: <span class="mb-0 font-weight-bold text-sm"
                                                                    style="color:#0099ff ">


                                @if($employer->city !=null)
                                {{$employer->city->name}}
                            @else
                                {{trans('employer::employer.city_not_set')}}
                            @endif

                        </span>
                    </p>
                </div>
            </div>

        </div>


        <div class="row mt-4">
            <div class="col-xl-3 col-sm-6 mb-xl-3 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::employer.wallet_balance')}}</p>
                                    <h5 class="font-weight-bolder text-primary mb-0">
                                        {{$employer->wallet_balance}} $
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-3 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::employer.total_spends')}}</p>
                                    <h5 class="font-weight-bolder text-success mb-0">
                                        {{$employer->total_spends}} $
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-3 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::employer.employer_level')}}</p>
                                    <h5 class="font-weight-bolder  mb-0">
                                        {{$employer->level->name}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                    <i class="ni ni-chart-bar-32 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-3 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::employer.employer_status')}}</p>
                                    <h5 class="font-weight-bolder  {{"text_worker_".$employer->status}} mb-0">
                                        {{trans('admin::employer.'.$employer->status)}}
                                    </h5>

                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-ui-04 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row ">
            <div class="row">
                <div class="form-group col-sm-12 col-md-6 col-lg-4">
                    <label for="example-search-input"
                           class="form-control-label">{{trans('admin::employer.phone')}}</label>

                    @if($employer->phone !=null)
                        <input class="form-control" placeholder="{{trans('admin::employer.phone')}}" name="name"
                               type="text"
                               value="{{$employer->phone}}"
                               id="example-search-input" disabled>
                    @else
                        <input class="form-control" placeholder="{{trans('admin::employer.phone')}}" name="name"
                               type="text"
                               value=" {{trans('employer::employer.phone_not_set')}}"
                               id="example-search-input" disabled>
                    @endif
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label for="example-url-input"
                           class="form-control-label">{{trans('admin::employer.address')}}</label>

                    <input class="form-control" type="text" placeholder="{{trans('admin::employer.address')}}"
                           name="address" value="{{$employer->address}}"
                           id="example-url-input" disabled>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-2">
                    <label for="example-url-input"
                           class="form-control-label">{{trans('admin::employer.zip_code')}}</label>

                    <input class="form-control" type="text" placeholder="{{trans('admin::employer.zip_code')}}"
                           name="zip_code" value="{{$employer->zip_code}}"
                           id="example-url-input" disabled>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-10">
                    <label for="example-url-input"
                           class="form-control-label">{{trans('admin::employer.description')}}</label>

                    <input class="form-control" type="text" placeholder="{{trans('admin::employer.description')}}"
                           name="description" value="{{$employer->description}}"
                           id="example-url-input" disabled>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-2">
                    <label for="example-url-input"
                           class="form-control-label">{{trans('admin::employer.gender')}}</label>

                    <input class="form-control" type="text" placeholder="{{trans('admin::employer.gender')}}"
                           name="gender" value="{{trans('admin::employer.'.$employer->gender)}}"
                           id="example-url-input" disabled>
                </div>
            </div>
        </div>

        <div class="row mt-4">
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
                                    <h5 class="font-weight-bg-gradient-dark mb-0">
                                        {{count($unPayedTasks)}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">

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
                        <th> #</th>
                        <th>{{trans('admin::employer.taskDetails')}}</th>
                        {{--                        <th>{{trans('admin::employer.taskStatus')}}</th>--}}
                        <th>{{trans('admin::employer.taskContOfWorker')}}</th>
                        <th>{{trans('admin::employer.taskTotalCost')}}</th>
                        <th>{{trans('admin::employer.taskEndTime')}}</th>
                        <th>{{trans('admin::employer.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($tasks) and $tasks->count()>0)
                        <!--                        --><?php //$count = 0 ?>
                        @for($i=0;$i<count($tasks) ;$i++)
                            <!--                            --><?php //$count++ ?>
                            <tr>
                                <td class="align-middle text-center"> {{$i+1}} </td>
                                <td class="text-center align-middle text-center">
                                    <div class="d-flex justify-content-center px-2 py-1">
                                        <div>
                                            @if($tasks[$i]->category->image != Null)
                                                <img src="{{Storage::url($tasks[$i]->category->image)}}"
                                                     class="avatar avatar-sm me-3" alt="category icon">
                                            @else
                                                <img
                                                    src="{{asset('assets/img/category/'.$tasks[$i]->category->title.'.png')}}"
                                                    class="avatar avatar-sm me-3" alt="category icon">
                                            @endif
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$tasks[$i]->task_number}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ Str::words($tasks[$i]->title, 3,'...')}}</p>
                                        </div>
                                    </div>
                                </td>
                                {{--                                    @dd($tasks[$i]->TaskStatuses()->with('status')->latest()->first()->status->name)--}}
                                {{--                                    @dd($tasks[$i]->TaskStatuses()->latest()->first()->updated_at->diffForHumans())--}}
                                {{--                                <td class="align-middle text-center text-sm">--}}
                                {{--                                    <span--}}
                                {{--                                        class="badge badge-sm  ">{{$tasks[$i]->TaskStatuses()->with('status')->latest()->first()->status->name}} {{$tasks[$i]->TaskStatuses()->latest()->first()->updated_at->diffForHumans()}}</span>--}}
                                {{--                                    {{$tasks[$i]->TaskStatuses()->with('status')->latest()->first()->status->name}}--}}
                                {{--                                    {{$tasks[$i]->TaskStatuses()->with('status')->latest()->first()->status->name}}--}}
                                {{--                                </td>--}}

                                <td class="text-sm">{{$tasks[$i]->total_worker_limit}}</td>
                                <td class="text-sm">{{$tasks[$i]->total_cost}} $</td>
                                <td class="text-sm">{{$tasks[$i]->task_end_date}}</td>
                                <td class="text-sm">
                                    <a href="{{route('admin.show.employer.task.details',[$employer->id,$tasks[$i]->id])}}"
                                       class="mx-1"
                                       data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-eye text-info"></i>
                                        {{trans('admin::employer.showDetails')}}
                                    </a>
                                </td>
                            </tr>
                        @endfor
                    @else
                        <td colspan="8">
                            <div class="text-danger text-center">{{trans('admin::employer.NoDataFound')}}</div>
                        </td>
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>


@stop
