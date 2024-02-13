@extends('dashboard::layouts.admin.master')
@section('content')

    <div class="row bg-white mt-4">
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-list">
                    <thead class="thead-light">
                    <tr>
                        <th><span class="mx-2">#</span></th>
                        <th>{{trans('admin::admin.privilegeDetails')}}</th>
                        <th>{{trans('admin::admin.TypeOfPrivilege')}}</th>
                        <th>{{trans('admin::admin.ForOfPrivilege')}}</th>
                        <th>{{trans('admin::admin.countOfPrivilege')}}</th>
                        <th>{{trans('admin::admin.created_at')}}</th>
                        <th>{{trans('admin::admin.countOfUse')}}</th>
                        <th>{{trans('admin::admin.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($data) and count($data)>0)
                        <?php $count = 1?>
                        @foreach($data as $datum)
                            <tr>
                                <td class="text-center text-sm">{{$count++}} </td>
                                <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-secondary font-weight-bold   text-sm">{{trans('privilege::privilege.'.$datum->title)}} </span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span
                                        class="badge privilege-{{$datum->type}} text-xs">{{trans('admin::admin.'.$datum->type)}}  </span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    @if($datum->for == "employer")
                                    <span
                                        class="text-primary font-weight-bold">{{trans('admin::admin.employer')}}  </span>
                                    @elseif($datum->for == "worker")
                                        <span
                                            class="text-primary font-weight-bold">{{trans('admin::admin.worker')}}  </span>
                                    @else
                                        <span
                                            class="text-primary font-weight-bold">{{trans('admin::admin.WorkerAndEmployer')}}  </span>
                                    @endif
                                </td>
                                @if($datum->type == "plus")
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-success font-weight-bold  text-sm">+ {{$datum->privileges}} </span>
                                    </td>
                                @else
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-danger font-weight-bold text-sm">- {{$datum->privileges}} </span>
                                    </td>
                                @endif
                                <td class="text-sm text-center ">
                                    <span
                                        class="text-dark text-sm ">{{$datum->created_at->diffForHumans()}}</span>
                                </td>

                                <td class="text-sm text-center ">
                                    @if($datum->for == "employer")
                                        <span
                                            class="text-primary font-weight-bold">{{\Modules\Privilege\Entities\EmployerPrivilege::withoutTrashed()->where('description',$datum->title)->count()}}  </span>
                                    @elseif($datum->for == "worker")
                                        <span
                                            class="text-primary font-weight-bold">{{\Modules\Privilege\Entities\WorkerPrivilege::withoutTrashed()->where('description',$datum->title)->count()}}  </span>
                                    @else
                                        <span
                                            class="text-primary font-weight-bold">
                                        {{\Modules\Privilege\Entities\EmployerPrivilege::withoutTrashed()->where('description',$datum->title)->count() + \Modules\Privilege\Entities\WorkerPrivilege::withoutTrashed()->where('description',$datum->title)->count()}}
                                        </span>
                                    @endif
                                </td>
                                <td class="align-middle text-center p-1">
                                    <a href="{{route('admin.show.edit.privilege.form',$datum->id)}}" class="mx-1  text-sm"
                                       data-bs-toggle="tooltip"
                                       data-bs-original-title="Edit Country">
                                        <i class="fas fa-pencil-alt text-dark"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="8">
                            <div
                                class="text-warning text-center">{{trans('admin::admin.No Privileges Found')}}</div>

                        </td>
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@stop
