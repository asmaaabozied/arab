@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-list">
                            <thead class="thead-light">
                                <tr>
                                    <th> # </th>
                                    <th>{{trans('admin::employer.name')}}</th>
{{--                                    <th>{{trans('admin::admin.employer_level')}}</th>--}}
                                    <th>{{trans('admin::admin.array_of_plus_Privileges')}}</th>
                                    <th>{{trans('admin::admin.array_of_minus_Privileges')}}</th>
                                    <th>{{trans('admin::admin.countOfTotalPrivileges')}}</th>
                                    <th>{{trans('admin::employer.Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($data) and $data->count()>0)
                                <?php $count = 0 ?>
                                @for($i=0;$i<count($data);$i++)
                            <tr>
                                <td class="text-center align-middle"> {{$i+1}} </td>
                                <td class="text-center align-middle ">
                                    {{$data[$i]->name}}
                                </td>
{{--                                <td class="text-center text-sm  {{"worker_level_".$data[$i]->level->name}}">{{trans('admin::workers.'.$data[$i]->level->name)??$data[$i]->level->name}}</td>--}}

                                <td class="text-center text-success text-sm">{{array_sum($array_of_plus[$i])}} </td>
                                <td class="text-center text-danger text-sm">{{array_sum($array_of_minus[$i])}} </td>
                                <td class="text-center text-primary text-md">{{array_sum($array_of_privileges[$i])}}</td>
                                <td class="text-center text-sm">
                                    <a href="{{route('admin.show.employer.privileges.history',$data[$i]->id)}}" class="mx-1" data-bs-toggle="tooltip"
                                       data-bs-original-title="Preview product">
                                        <i class="fas fa-eye text-success"></i>
                                    </a>

                                </td>
                            </tr>
                                @endfor
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

