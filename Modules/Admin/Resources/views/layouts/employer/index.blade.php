@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h6 class="mb-0">{{trans('admin::employer.employersTable')}}</h6>
                        </div>
{{--                        <div class="">--}}
{{--                            <a href="#" type="submit" class="btn bg-gradient-primary w-auto m-4">{{trans('admin::employer.create_new_worker')}}</a>--}}
{{--                        </div>--}}
                    </div>

                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-list">
                            <thead class="thead-light">
                                <tr>
                                    <th> # </th>
                                    <th>{{trans('admin::employer.name')}}</th>
                                    <th>{{trans('admin::employer.countryAndCity')}}</th>
                                    <th>{{trans('admin::employer.status')}}</th>
                                    <th>{{trans('admin::employer.countOfTask')}}</th>
                                    <th>{{trans('admin::employer.wallet_balance')}}</th>
                                    <th>{{trans('admin::employer.total_spends')}}</th>
                                    <th>{{trans('admin::employer.Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($employers) and $employers->count()>0)
                                <?php $count = 0 ?>
                                @foreach($employers as $employer)
                                    <?php $count ++ ?>
                            <tr>
                                <td class="align-middle text-center"> {{$count}} </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex px-2 py-1">
{{--                                        <div>--}}
{{--                                            @if($employer->avatar != Null)--}}
{{--                                                <img src="{{Storage::url($employer->avatar)}}" class="avatar avatar-sm me-3" alt="avatar">--}}
{{--                                            @else--}}
{{--                                                <img src="{{asset('assets/img/default/default-avatar.svg')}}" class="avatar avatar-sm me-3" alt="user1">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$employer->name}}</h6>
{{--                                            <p class="text-xs text-secondary mb-0">{{$employer->email}}</p>--}}
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center">

                                    @if($employer->country !=null)
                                        <h6 class="mb-0 text-primary text-sm ">{{$employer->country->name}}</h6>
                                    @else
                                        <h6 class="mb-0 text-primary text-sm ">{{trans('employer::employer.country_not_set')}}</h6>
                                    @endif
{{--                                        @if($employer->city !=null)--}}
{{--                                            <h6 class="mb-0 text-sm ">{{$employer->city->name}}</h6>--}}
{{--                                        @else--}}
{{--                                            <h6 class="mb-0 text-primary text-sm ">{{trans('employer::employer.city_not_set')}}</h6>--}}
{{--                                        @endif--}}

                                </td>
                                <td class="align-middle text-center text-sm">
                                    @if($employer->suspend_days >0)
                                        <span class="badge badge-sm {{"worker_".$employer->status}} ">{{trans('admin::workers.'.$employer->status)??$employer->status}} {{$employer->updated_at->diffForHumans()}} {{trans('admin::workers.for days')}}  {{trans('admin::workers.'.$employer->suspend_days.'Day')}} </span>
                                    @else
                                        <span class="badge badge-sm {{"worker_".$employer->status}} ">{{trans('admin::workers.'.$employer->status)??$employer->status}} {{$employer->updated_at->diffForHumans()}}  </span>
                                    @endif
                                </td>
                                {{--
                                todo trans employer levels after set it

                                --}}
                                <td class="text-sm text-dark ">{{$employer->tasks()->count()}}</td>

                                <td class="text-sm">{{$employer->wallet_balance}} $</td>
                                <td class="text-sm">{{$employer->total_spends}} $</td>
                                <td class="text-sm">
                                    <a href="{{route('admin.show.employer.profile',$employer->id)}}" class="mx-1" data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-eye text-success"></i>
                                    </a>

                                    <a href="{{route('admin.show.employer.transaction',$employer->id)}}" class="mx-1" data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-wallet text-info"></i>
                                    </a>

                                    @if($employer->status == "enable")
                                        <a href="javascript:;" class="text-secondary" id="dropdownMarketingCard" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-circle text-danger" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3 reject-box-shadow" aria-labelledby="dropdownMarketingCard" style="">
                                            <li><a class="dropdown-item border-radius-md text-center" href="{{route('admin.disabled.employer.status',[$employer->id,7])}}">{{trans('admin::employer.suspendFor7Day')}}</a></li>
                                            <li><a class="dropdown-item border-radius-md text-center" href="{{route('admin.disabled.employer.status',[$employer->id,15])}}">{{trans('admin::employer.suspendFor15Day')}}</a></li>
                                            <li><a class="dropdown-item border-radius-md text-center" href="{{route('admin.disabled.employer.status',[$employer->id,30])}}">{{trans('admin::employer.suspendFor30Day')}}</a></li>
                                            <li><a class="dropdown-item border-radius-md text-center" href="{{route('admin.disabled.employer.status',[$employer->id,45])}}">{{trans('admin::employer.suspendFor45Day')}}</a></li>
                                            <li><a class="dropdown-item border-radius-md text-center" href="{{route('admin.disabled.employer.status',[$employer->id,60])}}">{{trans('admin::employer.suspendFor60Day')}}</a></li>
                                            <li><a class="dropdown-item border-radius-md text-center" href="{{route('admin.disabled.employer.status',[$employer->id,365])}}">{{trans('admin::employer.suspendFor365Day')}}</a></li>
                                        </ul>
                                    @elseif($employer->status == "disable")
                                        <a href="{{route('admin.enabled.employer.status',$employer->id)}}" class="mx-1 text-success"
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
                                    <div class="text-danger text-center">{{trans('admin::employer.NoDataFound')}}</div>
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

