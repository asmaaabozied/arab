@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h6 class="mb-0">{{trans('admin::workers.workersTable')}}</h6>
                        </div>
{{--                        <div class="">--}}
{{--                            <a href="#" type="submit" class="btn bg-gradient-primary w-auto m-4">{{trans('admin::workers.create_new_worker')}}</a>--}}
{{--                        </div>--}}
                    </div>

                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-list">
                            <thead class="thead-light">
                                <tr>
                                    <th> # </th>
                                    <th>{{trans('admin::workers.WorkerName')}}</th>
                                    <th>{{trans('admin::workers.countryAndCity')}}</th>
                                    <th>{{trans('admin::workers.status')}}</th>
                                    <th>{{trans('admin::workers.worker_level')}}</th>
                                    <th>{{trans('admin::workers.wallet_balance')}}</th>
                                    <th>{{trans('admin::workers.total_earns')}}</th>
                                    <th>{{trans('admin::workers.Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($workers) and $workers->count()>0)
                                <?php $count = 0 ?>
                                @foreach($workers as $worker)
                                    <?php $count ++ ?>
                            <tr>
                                <td class="align-middle text-center"> {{$count}} </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex px-2 py-1">
{{--                                        <div>--}}
{{--                                            @if($worker->avatar != Null)--}}
{{--                                                <img src="{{Storage::url($worker->avatar)}}" class="avatar avatar-sm me-3" alt="avatar">--}}
{{--                                            @else--}}
{{--                                                <img src="{{asset('assets/img/default/default-avatar.svg')}}" class="avatar avatar-sm me-3" alt="user1">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$worker->name}}</h6>
{{--                                            <p class="text-xs text-secondary mb-0">{{$worker->email}}</p>--}}
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    @if($worker->country !=null)
                                    <h6 class="mb-0 text-primary text-sm ">{{$worker->country->name}}</h6>
                                    @else
                                        <h6 class="mb-0 text-primary text-sm ">{{trans('worker::worker.country_not_set')}}</h6>
                                    @endif
{{--                                        @if($worker->city !=null)--}}
{{--                                            <h6 class="mb-0 text-sm ">{{$worker->city->name}}</h6>--}}
{{--                                        @else--}}
{{--                                            <h6 class="mb-0 text-primary text-sm ">{{trans('worker::worker.city_not_set')}}</h6>--}}
{{--                                        @endif--}}

                                </td>
                                <td class="align-middle text-center text-sm">
                                    @if($worker->suspend_days >0)
                                    <span class="badge badge-sm {{"worker_".$worker->status}} ">{{trans('admin::workers.'.$worker->status)??$worker->status}} {{$worker->updated_at->diffForHumans()}} {{trans('admin::workers.for days')}}  {{trans('admin::workers.'.$worker->suspend_days.'Day')}} </span>
                                    @else
                                        <span class="badge badge-sm {{"worker_".$worker->status}} ">{{trans('admin::workers.'.$worker->status)??$worker->status}} {{$worker->updated_at->diffForHumans()}}  </span>

                                    @endif
                                </td>
                                <td class="text-sm text-warning  {{"worker_level_".$worker->level->name}}">{{trans('admin::workers.'.$worker->level->name)??$worker->level->name}}</td>
                                <td class="text-sm">{{$worker->wallet_balance}} $</td>
                                <td class="text-sm">{{$worker->total_earns}} $</td>
                                <td class="text-sm">
                                    <a href="{{route('admin.show.worker.profile',$worker->id)}}" class="mx-1" data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-eye text-success"></i>
                                    </a>

                                    <a href="{{route('admin.show.worker.transactions',$worker->id)}}" class="mx-1" data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-wallet text-info"></i>
                                    </a>
                                    @if($worker->status == "enable")
{{--                                        <a href="{{route('admin.disabled.worker.status',$worker->id)}}" class="mx-1 text-danger"--}}
{{--                                           data-bs-toggle="tooltip"--}}
{{--                                           data-bs-original-title="Preview product">--}}
{{--                                            <i class="fas fa-circle text-danger"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="dropstart">--}}
                                            <a href="javascript:;" class="text-secondary" id="dropdownMarketingCard" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-circle text-danger" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3 reject-box-shadow" aria-labelledby="dropdownMarketingCard" style="">
                                                <li><a class="dropdown-item border-radius-md text-center" href="{{route('admin.disabled.worker.status',[$worker->id,7])}}">{{trans('admin::workers.suspendFor7Day')}}</a></li>
                                                <li><a class="dropdown-item border-radius-md text-center" href="{{route('admin.disabled.worker.status',[$worker->id,15])}}">{{trans('admin::workers.suspendFor15Day')}}</a></li>
                                                <li><a class="dropdown-item border-radius-md text-center" href="{{route('admin.disabled.worker.status',[$worker->id,30])}}">{{trans('admin::workers.suspendFor30Day')}}</a></li>
                                                <li><a class="dropdown-item border-radius-md text-center" href="{{route('admin.disabled.worker.status',[$worker->id,45])}}">{{trans('admin::workers.suspendFor45Day')}}</a></li>
                                                <li><a class="dropdown-item border-radius-md text-center" href="{{route('admin.disabled.worker.status',[$worker->id,60])}}">{{trans('admin::workers.suspendFor60Day')}}</a></li>
                                                <li><a class="dropdown-item border-radius-md text-center" href="{{route('admin.disabled.worker.status',[$worker->id,365])}}">{{trans('admin::workers.suspendFor365Day')}}</a></li>
{{--                                                <li><a class="dropdown-item border-radius-md text-center text-danger" href="javascript:;">{{trans('admin::workers.WorkerSuspend')}}</a></li>--}}
                                            </ul>
{{--                                        </div>--}}
                                    @elseif($worker->status == "disable")
                                        <a href="{{route('admin.enabled.worker.status',$worker->id)}}" class="mx-1 text-success"
                                           data-bs-toggle="tooltip"
                                           data-bs-original-title="Preview product">
                                            <i class="fas fa-check text-success"></i>
                                        </a>
                                    @else
                                    @endif
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
        </div>
    </div>

@stop

