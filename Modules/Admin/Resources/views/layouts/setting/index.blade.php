@extends('dashboard::layouts.admin.master')
@section('content')
    {{--    <link id="pagestyle" href="{{asset('assets/css/admin/assets/css/avatar-uploade.css')}}" rel="stylesheet"/>--}}

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <form class="p-2" action="{{route('admin.update.setting')}}" method="Post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-0 pt-0 pb-2">
                        @if($errors->has('min_withdraw_limit'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::admin.Error!')}}</strong> {{ $errors->first('min_withdraw_limit') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('fees_per_transfer_wallet_balance'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::admin.Error!')}}</strong> {{ $errors->first('fees_per_transfer_wallet_balance') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if($errors->has('fees_per_withdraw_wallet_using_paypal'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::admin.Error!')}}</strong> {{ $errors->first('fees_per_withdraw_wallet_using_paypal') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('fees_per_charge_wallet_using_paypal'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::admin.Error!')}}</strong> {{ $errors->first('fees_per_charge_wallet_using_paypal') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            @if($errors->has('days_added_to_task_end_date_when_reject_task_proof'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::admin.Error!')}}</strong> {{ $errors->first('days_added_to_task_end_date_when_reject_task_proof') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            @if($errors->has('exchange_rate_api_key'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::admin.Error!')}}</strong> {{ $errors->first('exchange_rate_api_key') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            @if($errors->has('pin_in_top_task_limit_count'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::admin.Error!')}}</strong> {{ $errors->first('pin_in_top_task_limit_count') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="row gx-4">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-search-input"
                                           class="form-control-label">{{trans('admin::admin.min_withdraw_limit')}}
                                       <span class="text-warning"> ({{trans('admin::admin.dollar')}})</span>
                                    </label>

                                    <input class="form-control"
                                           placeholder="{{trans('admin::admin.min_withdraw_limit')}}"
                                           value="{{$data->min_withdraw_limit}}" name="min_withdraw_limit" type="number"
                                           id="example-search-input" required>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">

                                        {{trans('admin::admin.fees_per_transfer_wallet_balance')}}
                                        <span class="text-warning"> ( {{trans('admin::admin.percentage_in_dollar')}})</span>

                                    </label>

                                    <input class="form-control"
                                           placeholder="{{trans('admin::admin.fees_per_transfer_wallet_balance')}}"
                                           type="number" name="fees_per_transfer_wallet_balance"
                                           value="{{$data->fees_per_transfer_wallet_balance}}" id="example-email-input"
                                           min="0.0" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">
                                        {{trans('admin::admin.fees_per_withdraw_wallet_using_paypal')}}
                                        <span class="text-warning"> ( {{trans('admin::admin.percentage_in_dollar')}})</span>
                                    </label>

                                    <input class="form-control"
                                           placeholder="{{trans('admin::admin.fees_per_withdraw_wallet_using_paypal')}}"
                                           type="number" name="fees_per_withdraw_wallet_using_paypal"
                                           value="{{$data->fees_per_withdraw_wallet_using_paypal}}" id="example-email-input"
                                           min="0.0" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">
                                        {{trans('admin::admin.fees_per_charge_wallet_using_paypal')}}
                                        <span class="text-warning"> ( {{trans('admin::admin.percentage_in_dollar')}})</span>
                                    </label>

                                    <input class="form-control"
                                           placeholder="{{trans('admin::admin.fees_per_charge_wallet_using_paypal')}}"
                                           type="number" name="fees_per_charge_wallet_using_paypal"
                                           value="{{$data->fees_per_charge_wallet_using_paypal}}" id="example-email-input"
                                           min="0.0" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">
                                        {{trans('admin::admin.days_added_to_task_end_date_when_reject_task_proof')}}
                                        <span class="text-warning"> ( {{trans('admin::admin.day')}})</span>
                                    </label>

                                    <input class="form-control"
                                           placeholder="{{trans('admin::admin.days_added_to_task_end_date_when_reject_task_proof')}}"
                                           type="number" name="days_added_to_task_end_date_when_reject_task_proof"
                                           value="{{$data->days_added_to_task_end_date_when_reject_task_proof}}" id="example-email-input"
                                           min="1" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">
                                        {{trans('admin::admin.exchange_rate_api_key')}}
                                        <span class="text-warning"> ( <a class="text-warning" target="_blank" href="https://www.exchangerate-api.com/#pricing">{{trans('admin::admin.api-key')}}</a>)</span>
                                    </label>

                                    <input class="form-control"
                                           placeholder="{{trans('admin::admin.exchange_rate_api_key')}}"
                                           type="text" name="exchange_rate_api_key"
                                           value="{{$data->exchange_rate_api_key}}" id="example-email-input"
                                           min="1" required>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">
                                        {{trans('admin::admin.pin_in_top_task_limit_count')}}
                                        <span class="text-warning"> ({{trans('admin::admin.pin_in_top_task_limit_count_des')}})</span>
                                    </label>

                                    <input class="form-control"
                                           placeholder="{{trans('admin::admin.pin_in_top_task_limit_count')}}"
                                           type="number" name="pin_in_top_task_limit_count"
                                           value="{{$data->pin_in_top_task_limit_count}}" id="example-email-input"
                                           min="1" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit"
                                class="btn bg-gradient-primary w-auto m-4 ">{{trans('admin::admin.update_settings')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
