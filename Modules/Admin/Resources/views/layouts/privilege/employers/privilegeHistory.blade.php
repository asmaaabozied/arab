@extends('dashboard::layouts.admin.master')
@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-4 col-sm-12 mt-lg-1 mt-4">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                <i class="ni ni-diamond text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center text-secondary mb-0">{{trans('employer::employer.totalCountOfPrivileges')}}</h6>
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0 text-primary">{{array_sum($total)}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 mt-lg-1 mt-4">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                                <i class="ni ni-diamond text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center text-secondary mb-0">{{trans('employer::employer.CountOfPlusPrivileges')}}</h6>
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0 text-success">{{array_sum($plus)}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 mt-lg-1 mt-4">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                                                <i class="ni ni-diamond text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center text-secondary mb-0">{{trans('employer::employer.CountOfMinusPrivileges')}}</h6>
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0 text-danger">{{array_sum($minus)}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <div class="row bg-white mt-4">
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-list">
                    <thead class="thead-light">
                    <tr>
                        <th><span class="mx-2">#</span></th>
                        <th>{{trans('employer::employer.privilegeDetails')}}</th>
                        <th>{{trans('employer::employer.TypeOfPrivilege')}}</th>
                        <th>{{trans('employer::employer.countOfPrivilege')}}</th>
                        <th>{{trans('employer::employer.recordedAt')}}</th>
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
                                        class="text-secondary font-weight-bold   text-sm">{{trans('privilege::privilege.'.$datum->description)}} </span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span
                                        class="badge privilege-{{$datum->type}} text-xs">{{trans('employer::employer.'.$datum->type)}}  </span>
                                </td>
                                @if($datum->type == "plus")
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-success font-weight-bold  text-sm">+ {{$datum->count_of_privileges}}  </span>
                                    </td>
                                @else
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-danger font-weight-bold text-sm">- {{$datum->count_of_privileges}}  </span>
                                    </td>
                                @endif
                                <td class="text-sm text-center ">
                                    <span
                                        class="text-dark text-sm ">{{$datum->created_at->diffForHumans()}}</span>

                                </td>

                            </tr>
                        @endforeach
                    @else
                        <td colspan="5">
                            <div
                                class="text-warning text-center">{{trans('employer::employer.No Privileges Found')}}</div>

                        </td>
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@stop
