@extends('worker::layouts.worker.app')
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
                <button class="btn  subAddTicket"><a href="{{route('worker.show.my.withdraw.using.paypal.form')}}"  class="text-white w-auto m-4">{{trans('worker::worker.PayOutWalletBtn')}} </a>
                </button> </div>
            <div class="table-responsive PrivilageRuler p-3">
                <table class="table align-items-center table-flush" id="PrivilageRuler">
                    <thead class="thead-light">
                    <tr>
                        <th><span class="mx-2">#</span></th>
                        <th>{{trans('worker::worker.transactionsDetails')}}</th>
                        <th>{{trans('worker::worker.TypeOfTransaction')}}</th>
                        <th>{{trans('worker::worker.TransactionAmount')}}</th>
                        <th>{{trans('worker::worker.TransactionAt')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($sortedTransactions) and $sortedTransactions!=null)
                        <?php $count = 1?>
                        @foreach($sortedTransactions as $transaction)
                            <tr>
                                <td>{{$count++}} </td>
                                <td>
                                    <span
                                        class="text-dark font-weight-bold  text-sm">{{trans('worker::worker.'.$transaction['amount_transaction'])}} </span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="badge {{$transaction['type_of_pay']}} text-xs">{{trans('worker::worker.'.$transaction['type_of_pay'])}}  </span>
                                    </td>
                                @if($transaction['type_of_pay'] == "Deposit")
                                    <td>
                                    <span
                                        class="text-success font-weight-bold  text-sm">+
                                        {{ number_format(convertCurrency($transaction['amount'], auth()->user()->current_currency),2) }}
                                        <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                         </span>
                                    </td>
                                @else
                                    <td>
                                    <span
                                        class="text-danger font-weight-bold text-sm">-
                                        {{ number_format(convertCurrency($transaction['amount'], auth()->user()->current_currency),2) }}
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
                                class="text-warning text-center">{{trans('worker::worker.No financial transaction has been registered yet')}}</div>
                        </td>
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
