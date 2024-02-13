@extends('employer::layouts.employer.app')

@section('title')
    {{trans('employer::employer.PrivilegesHistory')}}
@endsection

@section('content')


    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
                <div class="row">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 mt-5">
                            <div class="profits">
                                <div class="sub-profits registery">
                                    <img src="{{asset('frontend/assets/img/icon.png')}}" class="img-fluid">
                                    <h2> {{trans('employer::employer.totalCountOfPrivileges')}} </h2>
                                    <button class="btn USD ">{{array_sum($total)}}</button>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-6 mt-5">
                            <div class="profits">
                                <div class="sub-profits registery ">
                                    <img src="{{asset('frontend/assets/img/group.png')}}" class="img-fluid">
                                    <h2> {{trans('employer::employer.CountOfPlusPrivileges')}}</h2>
                                    <button class="btn USD ">{{array_sum($plus)}}</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-6 mt-5">
                            <div class="profits">
                                <div class="sub-profits registery">
                                    <img src="{{asset('frontend/assets/img/Group2.png')}}" class="img-fluid">
                                    <h2> {{trans('employer::employer.CountOfMinusPrivileges')}}</h2>
                                    <button class="btn USD ">{{array_sum($minus)}}</button>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="row mt-3">
                        <div class="d-flex flex-row justify-content-between Task-data">
                            <h4 class="Title mt-4 col-md-9 col-sm-9 mb-2">   {{trans('employer::employer.PrivilegesHistory')}}   </h4>
{{--                            <select class="form-select" aria-label="Default select example">--}}
{{--                                <option selected> الفرز حسب </option>--}}
{{--                                <option value="1">One</option>--}}
{{--                                <option value="2">Two</option>--}}
{{--                                <option value="3">Three</option>--}}
{{--                            </select>--}}
                        </div>
                        <div class="table-responsive PrivilageRuler p-3">
                            <table class="table align-items-center table-flush" id="PrivilageRuler">
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
                                            <td>{{$count++}} </td>
                                            <td>
                                    <span
                                        class="text-dark font-weight-bold   text-sm">{{trans('privilege::privilege.'.$datum->description)}} </span>
                                            </td>
                                            <td>
                                    <span
                                        class="badge privilege-{{$datum->type}} text-xs">{{trans('employer::employer.'.$datum->type)}}  </span>
                                            </td>
                                            @if($datum->type == "plus")
                                                <td>
                                    <span
                                        class="text-success font-weight-bold  text-sm">+ {{$datum->count_of_privileges}}  </span>
                                                </td>
                                            @else
                                                <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-danger font-weight-bold text-sm">- {{$datum->count_of_privileges}}  </span>
                                                </td>
                                            @endif
                                            <td>
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


            </div>

        </div>
    </div>


@stop
