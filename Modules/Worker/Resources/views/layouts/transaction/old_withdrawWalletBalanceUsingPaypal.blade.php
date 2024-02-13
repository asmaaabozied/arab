@extends('dashboard::layouts.worker.master')
@section('content')

    <div class="row">
        <div class="col-lg-3 col-sm-12 mt-lg-1 mt-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::worker.CurrentlyWorkerWalletBalance')}}</p>
                              <h5 class="font-weight-bolder text-primary mb-0" id="worker_wallet_balance">
                                        {{$worker->wallet_balance}}
                                  <span>USD</span>
                              </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fa fa-wallet text-2rem text-primary opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12 mt-lg-1 mt-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">

                                    {{trans('worker::worker.paypal_account')}} ({{trans('worker::worker.paypal_fees') .$fees_per_withdraw_wallet_using_paypal}}%)

                                </p>


                                <h5 class="font-weight-bolder text-primary mb-0" >
                                    {{$worker->paypal_account??trans('worker::worker.not_paypal_account_set')}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fab fa-paypal  text-2rem text-primary opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12 mt-lg-1 mt-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::worker.min_withdraw_limit')}}</p>
                                <h5 class="font-weight-bolder text-warning mb-0" >
                                    {{$min_withdraw}}
                                    <span>USD</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="ni ni-sound-wave text-2rem text-warning opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12 mt-lg-1 mt-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::worker.WorkerWalletBalanceAfterWithdraw')}}</p>
                                <h5 class="font-weight-bolder text-purple mb-0" id="wallet_balance_after_withdraw">
                                    {{$worker->wallet_balance}}
                                    <span>USD</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fa fa-wallet text-2rem text-purple opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row mt-2">
        @if($errors->has('amount'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-text"><strong>{{trans('worker::worker.Error!')}}</strong> {{ $errors->first('amount') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text"><strong>{{trans('worker::worker.Error!')}}</strong> {{Session::get('error')}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close">

                </button>
            </div>
        @endif

            @if($worker->wallet_balance >= $min_withdraw)
                <div class="alert alert-warning text-center text-lg alert-dismissible fade show mt-4" role="alert">
                    <span class="alert-text text-dark"><strong>{{trans('worker::worker.Attention!')}}</strong> {{trans('worker::worker.withdraw_to_paypal_attention')}} </span>
                </div>
                <form method="POST" action="{{route('worker.withdraw.profits.using.paypal')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card bg-gradient-white">
                                <div class="card-body p-3">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-xl-6 col-sm-12 mb-xl-6 mb-4">
                                            <div class="card">
                                                <div class="card-body p-3">
                                                    <div class="row align-items-center">
                                                        <div class="col-8">
                                                            <div class="numbers mx-3">
                                                                <p class="text-lg mb-0 text-capitalize ">{{trans('worker::worker.amountYouWithdraw')}}</p>
                                                                <input class="multisteps-form__input form-control" step="0.5"
                                                                       value="0"
                                                                       type="number"
                                                                       min="0"
                                                                       max="{{$worker->wallet_balance}}"
                                                                       name="amount"
                                                                       id="amount_input"
                                                                       placeholder="{{trans('worker::worker.amountYouWantWithdraw')}}"
                                                                       onfocus="focused(this)"
                                                                       onfocusout="defocused(this)">
                                                            </div>
                                                        </div>
                                                        <div class="col-3 text-start">
                                                            <i class="fa fa-credit-card-alt2 opacity-10 text-success" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-12 mb-xl-6 mb-4">
                                            <div class="card">
                                                <div class="card-body p-3">
                                                    <div class="row align-items-center">
                                                        <div class="col-8">
                                                            <div class="numbers mx-3">
                                                                <p class="text-lg mb-0 text-capitalize font-weight-bold">{{trans('worker::worker.amountTransferredAfterPayPalTax')}} ({{$fees_per_withdraw_wallet_using_paypal}}%)</p>
                                                                <h5 class="font-weight-bolder text-lg text-success mt-3 mb-0"    id="amount_transferred_after_fees" >
                                                                    00.00
                                                                    <span class="text-lg">USD</span>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 text-start">
                                                            <i class="fa fa-credit-card-alt2 opacity-10 text-success" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="button-row ">
                            <button type="submit"
                                    class="btn btn-primary text-white btn-lg w-100   mb-2">{{trans('worker::worker.WithdrawBalanceBtn')}}</button>
                        </div>
                    </div>
                </form>
            @else

                <div class="alert alert-info text-center text-lg alert-dismissible fade show mt-4" role="alert">
                    <span class="alert-text text-dark"><strong>{{trans('worker::worker.Attention!')}}</strong> {{trans('worker::worker.min_withdraw_limit_attention')}} </span>
                </div>
            @endif

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).on('input', '#amount_input', function () {
            var fees = {{$fees_per_withdraw_wallet_using_paypal}};
            var WorkerWalletBalance = {{$worker->wallet_balance}};
            var Amount = document.getElementById('amount_input').value;
            var RemainingAmount =  (Number(WorkerWalletBalance) - Number(Amount));
            document.getElementById("wallet_balance_after_withdraw").innerHTML =RemainingAmount + " USD";
            document.getElementById("amount_transferred_after_fees").innerHTML = Number(Amount - (Amount * fees / 100)).toFixed(2) + " USD";

        });
    </script>
@stop
