
@extends('employer::layouts.employer.app')

@section('title')
    {{trans('employer::employer.RuleOfPrivileges')}}
@endsection
@section('content')

    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
                <div class="row">
                    <div class="table-responsive PrivilageRuler p-3">
                        <table class="table align-items-center table-flush" id="PrivilageRuler">
                            <thead class="thead-light">
                            <tr>
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
                                        <td>{{$count++}} </td>
<td>
                                    <span
                                        class="text-dark font-weight-bold   text-sm">{{trans('privilege::privilege.'.$datum->title)}} </span>
                                        </td>
                                        <td>
                                    <span
                                        class="badge privilege-{{$datum->type}} text-xs">{{trans('employer::employer.'.$datum->type)}}  </span>
                                        </td>
                                        @if($datum->type == "plus")
                                            <td>                                    <span
                                        class="text-success font-weight-bold  text-sm">+ {{$datum->privileges}} </span>
                                            </td>
                                        @else
                                            <td>
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


        </div>

    </div>


@stop
