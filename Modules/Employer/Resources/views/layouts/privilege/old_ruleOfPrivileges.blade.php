@extends('dashboard::layouts.employer.master')
@section('content')
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
                                        class="text-dark font-weight-bold   text-sm">{{trans('privilege::privilege.'.$datum->title)}} </span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span
                                        class="badge privilege-{{$datum->type}} text-xs">{{trans('employer::employer.'.$datum->type)}}  </span>
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
