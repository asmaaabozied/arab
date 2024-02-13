@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card mb-4">
                    <div class="text-left">
                        <a href="{{route('admin.show.create.new.currency.form')}}" type="submit"
                           class="btn bg-gradient-primary w-auto m-4">{{trans('admin::admin.AddNewCurrency')}}</a>
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
                                        {{trans('admin::admin.CurrencyEnArName')}}
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{trans('admin::admin.CurrencyRate')}}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{trans('admin::admin.CurrencyISDefault')}}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{trans('admin::admin.CurrencyUpdatedAt')}}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{trans('admin::admin.Actions')}}

                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($data) && $data->count() !=0)
                                    <?php $count = 1?>
                                    @foreach($data as $datum)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>
                                                <div class="d-flex px-2 py-1 ">
                                                    <div>
                                                        @if($datum->icon !=null)
                                                            <img src="{{Storage::url($datum->icon)}}"
                                                                 class="avatar avatar-sm me-3 mx-2" alt="avatar">
                                                        @else
                                                            <img src="{{asset('assets/img/currency/d-currency.png')}}"
                                                                 class="avatar avatar-sm me-3 mx-2" alt="user1">
                                                        @endif

                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$datum->en_name}}</h6>
                                                        <p class="text-xs text-primary mb-0">{{$datum->ar_name}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-md font-weight-bold">{{$datum->rate}} </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if($datum->is_default == "true")
                                                    <span
                                                        class="text-success text-md font-weight-bold">{{trans('admin::admin.yes_is_default')}}</span>
                                                @else
                                                    <span
                                                        class="text-warning text-md font-weight-bold">{{trans('admin::admin.no_is_not_default')}}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-dark text-md ">{{$datum->updated_at->diffForHumans()}} </span>
                                            </td>
                                            <td class="align-middle text-center p-1">
                                                <a
                                                    href="{{route('admin.show.update.currency.form',$datum->id)}}"
                                                    class="mx-1  text-sm"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-original-title="Edit Addon">
                                                    <i class="fas fa-pencil-alt text-info"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-start">
                        <form action="{{route('admin.update.all.currency.rate')}}" method="get"   enctype="multipart/form-data">
                            @csrf
                            <button  type="submit"
                               class="btn bg-gradient-success w-auto m-4">{{trans('admin::admin.UpdateAllCurrencyRate')}}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
