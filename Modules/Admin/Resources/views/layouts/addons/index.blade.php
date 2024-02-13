@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row">
        <div class="card card-plain mb-4">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column h-100">
                            <h4 class="font-weight-bolder mb-0">{{trans('admin::admin.CountOfUseGlimpse')}}</h4>
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
                                <p class="text-sm mb-0 text-primary text-capitalize font-weight-bold">{{trans('admin::admin.CountOfUseOnlyProfessional')}}</p>
                                <h5 class="font-weight-bolder text-dark mb-0">
                                    {{$count_of_use_only_professional}} {{trans('admin::admin.once')}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-secondary shadow text-center border-radius-md">
                                <i class="ni ni-tie-bow text-lg opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-primary text-capitalize font-weight-bold">{{trans('admin::admin.CountOfUseDailyLimit')}}</p>
                                <h5 class="font-weight-bolder text-dark mb-0">
                                  {{$count_of_use_daily_limit}} {{trans('admin::admin.once')}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-secondary shadow text-center border-radius-md">
                                <i class="ni ni-lock-circle-open text-lg opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-primary text-capitalize font-weight-bold">{{trans('admin::admin.CountOfUseSpecialAccess')}}</p>
                                <h5 class="font-weight-bolder text-dark mb-0">
                                    {{$count_of_special_access}} {{trans('admin::admin.once')}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-secondary shadow text-center border-radius-md">
                                <i class="ni ni-pin-3 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-flush" id="datatable-list">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                   #
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.AddonName')}}
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.addonFees')}}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.Actions')}}

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($data) && $data->count() !=0)
                                <?php $count = 1?>
                                @foreach($data as $datum)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>
                                            <div class="d-flex px-2 py-1 ">
                                                <div>
                                                    @if($datum->icon !=null)
                                                        <img src="{{Storage::url($datum->icon)}}"
                                                             class="avatar avatar-sm me-3 mx-2" alt="avatar">
                                                    @else
                                                        <img src="{{asset('assets/img/default/action.png')}}"
                                                             class="avatar avatar-sm me-3 mx-2" alt="user1">
                                                    @endif

                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$datum->title}}</h6>
                                                    <p class="text-xs text-primary mb-0">{{$datum->ar_title}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-info text-md font-weight-bold">{{$datum->fees}} $</span>
                                        </td>
                                        <td class="align-middle text-center p-1">
                                            <a
                                                href="{{route('admin.show.edit.addon.form',$datum->id)}}"
                                                class="mx-1  text-sm"
                                               data-bs-toggle="tooltip"
                                               data-bs-original-title="Edit Addon">
                                                <i class="fas fa-pencil-alt text-dark"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
