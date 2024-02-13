@extends('employer::layouts.employer.app')

@section('title')
    {{trans('employer::employer.wallet_balance')}}
@endsection
@section('content')



    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
                <div class="row profit-padding">

                    <div class="col-md-3 col-sm-6 mt-5">
                        <div class="profits">
                            <div class="sub-profits sub-profits-details">
                                <img src="{{asset('frontend/assets/img/coins.png')}}" class="img-fluid">
                                <h2> {{ trans('employer::employer.CurrentlyEmployerWalletBalance') }}</h2>
                                <button class="btn USD "> {{$employer->current_currency}} <br>    {{ number_format(convertCurrency($employer->wallet_balance, $employer->current_currency),2) }}
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6 mt-5">
                        <div class="profits">
                            <div class="sub-profits sub-profits-details">
                                <img src="{{asset('frontend/assets/img/Card.png')}}" class="img-fluid">
                                <h2> {{ trans('employer::employer.accounttype') }}</h2>
                                <button class="btn btn-style ">{{$employer->status ?? ''}}</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6 mt-5">
                        <div class="profits">
                            <div class="sub-profits sub-profits-details">
                                <img src="{{asset('frontend/assets/img/Device.png')}}" class="img-fluid">
                                <h2>  {{trans('admin::employer.total_spends')}} </h2>
                                <button class="btn USD ">     {{$employer->current_currency}} <br> {{ number_format(convertCurrency($employer->total_spends, $employer->current_currency),2) }}</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6 mt-5">
                        <div class="profits">
                            <div class="sub-profits sub-profits-details">
                                <img src="{{asset('frontend/assets/img/Wallet.png')}}" class="img-fluid">
                                <h2>   {{trans('admin::employer.wallet_balance')}}  </h2>
                                <button class="btn USD">{{$employer->current_currency}} <br>{{$employer->wallet_balance ?? 0}} </button>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row text-center mt-4">
                    <h4 class="Title"> {{trans('employer::employer.alert')}} </h4>
                    <p>


                        {{trans('employer::employer.The minimum amount to withdraw profits is $10. Complete more tasks Or wait for your pending profits to be approved so that you can withdraw them to your PayPal account')}}



                    </p>

                </div>


                <div>

                </div>




            </div>
        </div>


    </div>

@endsection
