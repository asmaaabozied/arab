@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="text-left">
                    <a href="{{route('admin.create.new.country')}}" type="submit"
                       class="btn bg-gradient-primary w-auto m-4">{{trans('admin::admin.Create new country')}}</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-flush" id="datatable-list">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.countryName')}}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.count_of_cities')}}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.count_of_tasks')}}

                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.count_of_employers')}}

                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.count_of_workers')}}

                                </th>

                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.Actions')}}

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($data) && $data->count() !=0)
                                @foreach($data as $datum)
                                    <tr>

                                        <td>
                                            <div class="d-flex px-2 py-1 ">
                                                <div>
                                                    @if(isset($datum->flag))
                                                        <img src="{{Storage::url($datum->flag)}}"
                                                             class="avatar avatar-sm me-3 mx-2" alt="avatar">
                                                    @else
                                                        <img src="{{asset('assets/img/flag/flag.svg')}}"
                                                             class="avatar avatar-sm me-3 mx-2" alt="user1">
                                                    @endif

                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$datum->name}}</h6>
                                                    <p class="text-xs text-primary mb-0">{{$datum->ar_name}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->cities_count}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->tasks_count}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->employers_count}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->workers_count}}</span>
                                        </td>

                                        <td class="align-middle text-center p-1">
                                            <a href="{{route('admin.show.edit.country.form',$datum->id)}}" class="mx-1  text-sm"
                                               data-bs-toggle="tooltip"
                                               data-bs-original-title="Edit Country">
                                                <i class="fas fa-pencil-alt text-dark"></i>
                                            </a>
                                            <a href="{{route('admin.show.cities.of.country',$datum->id)}}" class="mx-1 text-sm"
                                               data-bs-toggle="tooltip"
                                               data-bs-original-title="Country Cities">
                                                <i class="fas fa-eye text-success"></i>
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
