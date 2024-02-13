@extends('employer::layouts.employer.app')

@section('title')
    {{trans('employer::employer.switchingAccountHistory')}}
@endsection
@section('content')


    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">

            @if($errors->has('AmountTransferred'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('AmountTransferred') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{Session::get('error')}}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="row">

                    <form method="POST"
                          action="{{route('employer.switch.account.to.worker.with.transfer.wallet.balance')}}"
                          enctype="multipart/form-data" class="row">
                        @csrf
                        <div class="col-md-12 col-sm-12 info-form row  ">
                            <div class=" mb-4 col-md-6 col-sm-12">
                                <div class="d-flex flex-row">
                                    <div class="col-md-2 mb-3">

                                        <img src="{{asset('frontend/assets/img/Ellipse8.png')}}" class="img-fluid ">
                                    </div>
                                    <h4 class="Title text-center m-auto">      {{ trans('employer::employer.fromAccount') }}  </h4>
                                </div>
                                <div class="mb-3">

                                    <input type="email" class="form-control text-center readonly-input"
                                           value="{{auth()->user()->email ?? ''}}" readonly>
                                </div>


                            </div>
                            <div class=" mb-4 col-md-6 col-sm-12">
                                <div class="d-flex flex-row">
                                    <div class="col-md-2 mb-3">

                                        <img src="{{asset('frontend/assets/img/Ellipse 9.png')}}" class="img-fluid ">
                                    </div>
                                    <h4 class="Title text-center m-auto">{{ trans('employer::employer.toAccount') }}    </h4>
                                </div>
                                <div class="mb-3">

                                    <input type="email" class="form-control text-center readonly-input readonly-input2 "
                                           value="{{auth()->user()->email ?? ''}}" readonly>
                                </div>


                            </div>
                        </div>


                        <div class="mb-3 col-md-6 col-sm-12">
                            <label class="form-label walletlabel">{{trans('employer::employer.AmountTransferred')}}  </label>
                            <input  class="form-control"
                                   type="number"
                                   min="0.0"
                                   max="{{$my_balance_in_employer_wallet}}"
                                   name="AmountTransferred"
                                   id="amount_input"
                                   placeholder="{{trans('employer::employer.AmountTransferred')}}"
                            >
                        </div>
                        <div class="mb-3 col-md-6 col-sm-12">
{{--                            <label class="form-label walletlabel"> تأكيد النقل </label>--}}
{{--                            <select class="form-select" aria-label="Default select example">--}}
{{--                                <option selected></option>--}}
{{--                                <option value="1">One</option>--}}
{{--                                <option value="2">Two</option>--}}
{{--                                <option value="3">Three</option>--}}
{{--                            </select>--}}
                        </div>
                        <div class="mb-3 col-md-6 col-sm-12">
                            <label class="form-label walletlabel">@lang('site.Date de changement de compte') </label>
                            <label>{{\Carbon\Carbon::now()}}</label>
                        </div>
                </div>


                <div class="row mt-4">
                    <div class="button-row ">
                        <button type="submit"
                                class="subAddTicket btn-lg w-100 text-white mb-2">{{trans('employer::employer.SwitchAccountAndTransferWalletBtn')}}</button>
                    </div>

                </div>
                <div>

                </div>
                </form>

            </div>


            <div>

            </div>


        </div>
    </div>


@endsection
