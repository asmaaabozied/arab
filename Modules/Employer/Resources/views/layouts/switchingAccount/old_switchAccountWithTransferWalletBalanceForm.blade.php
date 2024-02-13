@extends('dashboard::layouts.employer.master')
@section('content')
    <div class="row mt-4">
        <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-lg mb-0 text-capitalize font-weight-bold">{{trans('employer::employer.walletBalanceEmployerAccount')}}</p>
                                <h5 class="font-weight-bolder text-lg text-purple mb-0" id="employer_wallet_balance">
                                    {{$my_balance_in_employer_wallet}}
                                    <span class="text-lg">USD</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fa fa-wallet2 opacity-10 text-purple" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-lg mb-0 text-capitalize font-weight-bold">{{trans('employer::employer.fees_per_transfer_wallet_balance')}}</p>
                                <h5 class="font-weight-bolder text-lg text-warning mb-0" >
                                    {{$fees_by_transfer_wallet_balance->fees_per_transfer_wallet_balance}}
                                    <span class="text-lg">%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fa fa-exchange-alt2 opacity-10 text-warning" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-lg mb-0 text-capitalize font-weight-bold">{{trans('employer::employer.walletBalanceWorkerAccount')}}</p>
                                <h5 class="font-weight-bolder text-lg text-primary mb-0" id="worker_wallet_balance">
                                    {{$my_balance_in_worker_wallet}}
                                    <span class="text-lg">USD</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fa fa-wallet2 opacity-10 text-primary" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-2">
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
        <form method="POST" action="{{route('employer.switch.account.to.worker.with.transfer.wallet.balance')}}"
              enctype="multipart/form-data">
            @csrf
            <div class="row mt-4">
                <div class="col-xl-6 col-sm-12 mb-xl-6 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <div class="numbers mx-3">
                                        <p class="text-lg mb-0 text-capitalize font-weight-bold">{{trans('employer::employer.amountYouWantTransferredToWorkerWallet')}}</p>
                                        <input class="multisteps-form__input form-control" step="0.1"
                                               value="0.00"
                                               type="number"
                                               min="0.0"
                                               max="{{$my_balance_in_employer_wallet}}"
                                               name="AmountTransferred"
                                               id="amount_input"
                                               placeholder="{{trans('employer::employer.AmountTransferred')}}"
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
                                        <p class="text-lg mb-0 text-capitalize font-weight-bold">{{trans('employer::employer.amountTransferredAfterFees')}}</p>
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
            <div class="row mt-4">
                <div class="button-row ">
                    <button type="submit"
                            class="btn btn-primary btn-lg w-100 text-white mb-2">{{trans('employer::employer.SwitchAccountAndTransferWalletBtn')}}</button>
                </div>

            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).on('input', '#amount_input', function () {
            var fees = {{$fees_by_transfer_wallet_balance->fees_per_transfer_wallet_balance}};
            var EmployerWalletBalance = {{$my_balance_in_employer_wallet}};
            var WorkerWalletBalance = {{$my_balance_in_worker_wallet}};
            var Amount = document.getElementById('amount_input').value;
            document.getElementById("employer_wallet_balance").innerHTML = Number((EmployerWalletBalance - Amount).toFixed(2)) + " USD";
            document.getElementById("worker_wallet_balance").innerHTML = Number((WorkerWalletBalance + (Amount - (Amount * fees / 100))).toFixed(2)) + " USD";
            document.getElementById("amount_transferred_after_fees").innerHTML = Number(Amount - (Amount * fees / 100)).toFixed(2) + " USD";
        });
    </script>
@stop
