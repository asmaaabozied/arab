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
                    @if($worker->google_id != null)
                        <img src="{{$worker->avatar}}"
                             class="w-100 border-radius-lg shadow-sm" alt="avatar">
                    @else
                        @if($worker->avatar != Null)
                            <img src="{{Storage::url($worker->avatar)}}" class="w-100 border-radius-lg shadow-sm"
                                 alt="avatar">
                        @else
                            <img src="{{asset('assets/img/default/default-avatar.svg')}}"
                                 class="w-100 border-radius-lg shadow-sm" alt="avatar">
                        @endif
                    @endif
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{$worker->name}} <span class="mb-0 font-weight-bold text-sm" style="color:#0099ff ">{{trans('admin::workers.Joined_at')}}: {{$worker->created_at->format('d-m-Y')}}</span>
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        {{trans('admin::workers.email')}}: <span class="mb-0 font-weight-bold text-sm"
                                                                 style="color:#0099ff ">{{$worker->email}}</span>
                        || {{trans('admin::workers.country')}}: <span class="mb-0 font-weight-bold text-sm"
                                                                      style="color:#0099ff ">
                          @if($worker->country !=null)
                                {{$worker->country->name}}
                            @else
                                {{trans('worker::worker.country_not_set')}}
                            @endif

                        </span>
                        || {{trans('admin::workers.city')}}: <span class="mb-0 font-weight-bold text-sm"
                                                                   style="color:#0099ff ">
                         @if($worker->city !=null)
                                {{$worker->city->name}}
                            @else
                                {{trans('worker::worker.city_not_set')}}
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::workers.wallet_balance')}}</p>
                                    <h5 class="font-weight-bolder text-primary mb-0">
                                        {{$worker->wallet_balance}} $
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::workers.total_earns')}}</p>
                                    <h5 class="font-weight-bolder text-success mb-0">
                                        {{$worker->total_earns}} $
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::workers.worker_level')}}</p>
                                    <h5 class="font-weight-bolder {{"worker_level_".$worker->level->name}} mb-0">
                                        {{trans('admin::workers.'.$worker->level->name)}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape {{"worker_level_".$worker->level->name."_bg"}} shadow text-center border-radius-md">
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::workers.worker_status')}}</p>
                                    <h5 class="font-weight-bolder  {{"text_worker_".$worker->status}} mb-0">
                                        {{trans('admin::workers.'.$worker->status)}}
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
                <div class="form-group col-sm-12 col-md-6 col-lg-3">
                    <label for="example-search-input"
                           class="form-control-label">{{trans('admin::workers.phone')}}</label>

                    @if($worker->phone !=null)
                        <input class="form-control" placeholder="{{trans('admin::employer.phone')}}" name="name"
                               type="text"
                               value="{{$worker->phone}}"
                               id="example-search-input" disabled>
                    @else
                        <input class="form-control" placeholder="{{trans('admin::employer.phone')}}" name="name"
                               type="text"
                               value=" {{trans('employer::employer.phone_not_set')}}"
                               id="example-search-input" disabled>
                    @endif
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-4">
                    <label for="example-url-input"
                           class="form-control-label">{{trans('admin::workers.address')}}</label>

                    <input class="form-control" type="text" placeholder="{{trans('admin::workers.address')}}"
                           name="address" value="{{$worker->address}}"
                           id="example-url-input" disabled>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-2">
                    <label for="example-url-input"
                           class="form-control-label">{{trans('admin::workers.zip_code')}}</label>

                    <input class="form-control" type="text" placeholder="{{trans('admin::workers.zip_code')}}"
                           name="zip_code" value="{{$worker->zip_code}}"
                           id="example-url-input" disabled>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-3">
                    <label for="example-search-input"
                           class="form-control-label">{{trans('worker::worker.paypal_account')}}</label>

                    <input class="form-control" placeholder="{{trans('worker::worker.paypal_account')}}"
                           name="paypal_account" type="text" value="{{$worker->paypal_account}}"
                           id="example-search-input" disabled>
                </div>

                <div class="form-group col-sm-12 col-md-6 col-lg-10">
                    <label for="example-url-input"
                           class="form-control-label">{{trans('admin::workers.description')}}</label>

                    <input class="form-control" type="text" placeholder="{{trans('admin::workers.description')}}"
                           name="description" value="{{$worker->description}}"
                           id="example-url-input" disabled>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-2">
                    <label for="example-url-input" class="form-control-label">{{trans('admin::workers.gender')}}</label>

                    <input class="form-control" type="text" placeholder="{{trans('admin::workers.gender')}}"
                           name="gender" value="{{trans('admin::workers.'.$worker->gender)}}"
                           id="example-url-input" disabled>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-xl-4 col-sm-6 mb-xl-3 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::workers.completed_proofs')}}</p>
                                    <h5 class="font-weight-bolder text-success mb-0">
                                        {{$accepted_proofs}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-3 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::workers.rejected_proofs')}}</p>
                                    <h5 class="font-weight-bolder text-danger mb-0">
                                        {{$rejected_proofs}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-3 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::workers.pending_proofs')}}</p>
                                    <h5 class="font-weight-bolder text-warning mb-0">
                                        {{$pending_proofs}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
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
                        <th>{{trans('admin::workers.taskDetails')}}</th>
                        <th>{{trans('admin::workers.isEmployerAcceptProof')}}</th>
                        <th>{{trans('admin::workers.isAdminAcceptProof')}}</th>
                        <th>{{trans('admin::workers.taskPerWorker')}}</th>
                        <th>{{trans('admin::workers.prof_send_at')}}</th>
                        <th>{{trans('admin::workers.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($proofs) and $proofs->count()>0)
                        <?php $count = 0 ?>
                        @foreach($proofs as $proof)
                            <?php $count++ ?>
                            <tr>
                                <td class="align-middle text-center"> {{$count}} </td>
                                <td class="text-center align-middle text-center">
                                    <div class="d-flex justify-content-center px-2 py-1">
                                        <div>
                                            @if($proof->task->category->image != Null)
                                                <img src="{{Storage::url($proof->task->category->image)}}"
                                                     class="avatar avatar-sm me-3" alt="category icon">
                                            @else
                                                <img
                                                    src="{{asset('assets/img/category/'.$proof->task->category->title.'.png')}}"
                                                    class="avatar avatar-sm me-3" alt="category icon">
                                            @endif
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$proof->task->task_number}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ Str::words($proof->task->title, 3,'...')}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span
                                        class="badge badge-sm {{"prof_".$proof->isEmployerAcceptProof}} ">{{trans('admin::workers.proof_'.$proof->isEmployerAcceptProof)}} {{$proof->updated_at->diffForHumans()}}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span
                                        class="badge badge-sm {{"prof_".$proof->isAdminAcceptProof}} ">{{trans('admin::workers.proof_'.$proof->isAdminAcceptProof)}} {{$proof->updated_at->diffForHumans()}}</span>
                                </td>
                                <td class="text-sm">{{$proof->task->cost_per_worker}} $</td>
                                <td class="text-sm">{{$proof->created_at->diffForHumans()}}</td>
                                <td class="text-sm">
                                    <a href="{{route('admin.show.worker.proof.details',[$proof->id])}}" class="mx-1"
                                       data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-eye text-info"></i>
                                        {{trans('admin::workers.showDetails')}}
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="8">
                            <div class="text-danger text-center">{{trans('admin::workers.NoDataFound')}}</div>
                        </td>
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>


@stop
