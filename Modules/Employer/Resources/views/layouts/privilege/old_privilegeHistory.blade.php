@extends('dashboard::layouts.employer.master')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-12 mt-lg-1 mt-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::employer.totalCountOfPrivileges')}}</p>
                                <h5 class="font-weight-bolder text-primary mb-0">
                                    <span class="text-primary">{{array_sum($total)}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="ni ni-diamond text-2rem text-primary opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mt-lg-1 mt-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::employer.CountOfPlusPrivileges')}}</p>
                                <h5 class="font-weight-bolder text-primary mb-0">
                                    <span class="text-success">{{array_sum($plus)}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="ni ni-diamond text-2rem text-success opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mt-lg-1 mt-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('employer::employer.CountOfMinusPrivileges')}}</p>
                                <h5 class="font-weight-bolder text-primary mb-0">
                                    <a class="text-danger"> {{array_sum($minus)}}</a>

                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="ni ni-diamond text-2rem text-danger opacity-10" aria-hidden="true"></i>
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
                    <tr class="bg-table">
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
                                        class="text-dark font-weight-bold   text-sm">{{trans('privilege::privilege.'.$datum->description)}} </span>
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
