
@extends('employer::layouts.employer.app')

@section('title')
    {{trans('employer::employer.walletHistory')}}
@endsection

@section('content')

    <div class="col-lg-9 col-sm-12 ">
        <div class="row dashboard">


            <div class="card">



                <div class="row bg-white mt-4">
                    <div class="card-body px-0 pb-0">
                        <div class="text-left p-2">
                            <button class="btn  subAddTicket">  <a href="{{route('employer.show.switch.account.to.worker.with.transfer.wallet.balance.form')}}"  class="text-white">{{trans('employer::employer.TransferEmployerWalletBalanceToWorker')}}  </a>
                            </button>  </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="PrivilageRuler">
                                <thead class="thead-light">
                                <tr >
                                    <th><span class="mx-2">#</span></th>
                                    <th>{{trans('employer::employer.transactionsDetails')}}</th>
                                    <th>{{trans('employer::employer.TypeOfTransaction')}}</th>
                                    <th>{{trans('employer::employer.TransactionAmount')}}</th>
                                    <th>{{trans('employer::employer.TransactionAt')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($sortedTransactions) and count($sortedTransactions)>0)
                                    <?php $count = 1?>
                                    @foreach($sortedTransactions as $transaction)
                                        <tr>
                                            <td>{{$count++}} </td>
                                            <td>
                                    <span
                                        class="text-dark font-weight-bold  text-sm">{{trans('employer::employer.'.$transaction['amount_transaction'])}} </span>
                                            </td>
                                            <td>
                                    <span
                                        class="badge {{$transaction['type_of_pay']}} text-xs">{{trans('employer::employer.'.$transaction['type_of_pay'])}}  </span>
                                            </td>
                                            @if($transaction['type_of_pay'] == "Deposit")
                                                <td>
                                    <span
                                        class="text-success font-weight-bold  text-sm">+
                                      {{ convertCurrency($transaction['amount'], auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                                </td>
                                            @else
                                                <td>
                                    <span
                                        class="text-danger font-weight-bold text-sm">-
                                        {{ convertCurrency($transaction['amount'], auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                                </td>
                                            @endif
                                            <td>
                                    <span
                                        class="text-dark text-sm ">{{$transaction['payed_at']->diffForHumans()}}</span>

                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="5">
                                        <div
                                            class="text-warning text-center">{{trans('employer::employer.No financial transaction has been registered yet')}}</div>
                                        <div
                                            class="text-warning text-center">{{trans('employer::employer.No financial transaction has been registered yet2')}}</div>
                                    </td>
                                @endif
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>


                <div>

                </div>


            </div>
        </div>


    </div>




@stop
