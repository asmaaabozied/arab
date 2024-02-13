@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="text-left">
                    <a href="{{route('admin.create.new.discountCode')}}" type="submit"
                       class="btn bg-gradient-primary w-auto m-4">{{trans('admin::admin.Create new DiscountCode')}}</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-flush" id="datatable-list">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.DiscountCode')}}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.max_uses')}}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.count_of_uses')}}

                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.discount_amount')}}

                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.starts_at')}}

                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::admin.expires_at')}}

                                </th>
{{--                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">--}}
{{--                                    {{trans('admin::admin.created_at')}}--}}

{{--                                </th>--}}
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
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$datum->code}}</h6>
                                                    <p class="text-xs text-primary mb-0">{{$datum->type}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->max_uses}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->count_of_uses}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->discount_amount}}%</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->starts_at}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->expires_at}}</span>
                                        </td>
{{--                                        <td class="align-middle text-center">--}}
{{--                                            <span--}}
{{--                                                class="text-secondary text-xs font-weight-bold">{{$datum->created_at->diffForHumans()}}</span>--}}
{{--                                        </td>--}}
                                        <td class="align-middle text-center p-1">
                                            <a href="{{route('admin.show.edit.discountCode.form',$datum->id)}}" class="mx-1  text-sm"
                                               data-bs-toggle="tooltip"
                                               data-bs-original-title="Edit Country">
                                                <i class="fas fa-pencil-alt text-dark"></i>
                                            </a>
{{--                                            <a href="{{route('admin.show.cities.of.country',$datum->id)}}" class="mx-1 text-sm"--}}
{{--                                               data-bs-toggle="tooltip"--}}
{{--                                               data-bs-original-title="Country Cities">--}}
{{--                                                <i class="fas fa-eye text-success"></i>--}}
{{--                                            </a>--}}
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
