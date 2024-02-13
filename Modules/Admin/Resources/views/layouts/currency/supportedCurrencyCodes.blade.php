@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card mb-4">
                    <div class="text-left">
                        <a href="{{route('admin.update.supported.currency.codes')}}" type="submit"
                           class="btn bg-gradient-success w-auto m-4">{{trans('admin::admin.UpdateSupportedCurrenciesCodes')}}</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-flush" id="datatable-list">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        #
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{trans('admin::admin.CurrencyCode')}}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{trans('admin::admin.CurrencyEnFullName')}}
                                    </th>
{{--                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">--}}
{{--                                        {{trans('admin::admin.CurrencyCreatedAt')}}--}}
{{--                                    </th>--}}
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{trans('admin::admin.CurrencyCodeUpdatedAt')}}
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($data) && $data->count() !=0)
                                    <?php $count = 1?>
                                    @foreach($data as $datum)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-md font-weight-bold">{{$datum->currency_code}} </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-primary text-md font-weight-bold">{{$datum->currency_name}} </span>
                                            </td>

{{--                                            <td class="align-middle text-center">--}}
{{--                                                <span--}}
{{--                                                    class="text-dark text-md ">{{$datum->created_at->diffForHumans()}} </span>--}}
{{--                                            </td>--}}
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-dark text-md ">{{$datum->updated_at->diffForHumans()}} </span>
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
    </div>
@stop
