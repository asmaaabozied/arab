@extends('dashboard::layouts.employer.master')
@section('content')
    <div class="row bg-white mt-4">
        <div class="card-body px-0 pb-0">
            <div class="text-left">
                <a href="{{route('employer.show.charge.wallet.form')}}"  class="btn bg-gradient-primary text-white w-auto m-4">{{trans('employer::employer.ChargeWalletBtn')}} </a>
            </div>
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-list">
                    <thead class="thead-light">
                    <tr class="bg-table">
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
                                <td class="text-center text-sm">{{$count++}} </td>
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark font-weight-bold  text-sm">{{trans('employer::employer.'.$transaction['amount_transaction'])}} </span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="badge {{$transaction['type_of_pay']}} text-xs">{{trans('employer::employer.'.$transaction['type_of_pay'])}}  </span>
                                    </td>
                                @if($transaction['type_of_pay'] == "Deposit")
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-success font-weight-bold  text-sm">+
                                      {{ convertCurrency($transaction['amount'], auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                    </td>
                                @else
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-danger font-weight-bold text-sm">-
                                        {{ convertCurrency($transaction['amount'], auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                    </td>
                                @endif
                                <td class="text-sm text-center ">
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
@stop
