@extends('dashboard::layouts.employer.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 border-0">
                 @if (isset($data) and $data != null)
                <div class="text-left">
                    <a href="{{route('employer.show.switch.account.to.worker.with.transfer.wallet.balance.form')}}"  class="btn bg-gradient-primary text-white  w-auto m-4">{{trans('employer::employer.AccountSwitchingWithTransferWalletBalanceBtn')}} </a>
                </div>
                @endif
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-flush" id="datatable-list">
                            <thead>
                            <tr class="bg-table">
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                   #
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('employer::employer.fromAccount')}}
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('employer::employer.toAccount')}}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('employer::employer.isTransferWalletBalance')}}

                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('employer::employer.amountTransferred')}}

                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('employer::employer.AccountSwitchingAt')}}

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($data) and $data !=null)
                                <?php
                                $count = 1;
                                ?>
                                @foreach($data as $datum)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-xs font-weight-bold">{{$count++}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="{{"account_".$datum->from}} text-xs fw-bold">{{trans('employer::employer.account_'.$datum->from)}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="{{"account_".$datum->to}} text-xs">{{trans('employer::employer.account_'.$datum->to)}}</span>
                                        </td>
                                        @if($datum->isTransferWalletBalance == "false")
                                            <td class="align-middle text-center">
                                            <span
                                                class=" text-xs font-weight-bold">{{trans('employer::employer.TransferWalletBalance==false')}}</span>
                                            </td>
                                        @else
                                            <td class="align-middle text-center">
                                            <span
                                                class="text-success text-xs font-weight-bold">{{trans('employer::employer.TransferWalletBalance==true')}}</span>
                                            </td>
                                        @endif
                                        @if($datum->transferred_amount == 0)
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-xs font-weight-bold">
                                                  {{ convertCurrency($datum->transferred_amount, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                                </span>
                                            </td>
                                        @else
                                            <td class="align-middle text-center">
                                                <span class="text-xs text-success font-weight-bold">

                                                    {{ convertCurrency($datum->transferred_amount, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>

                                                </span>
                                            </td>
                                        @endif
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->created_at}}</span>
                                        </td>
                                    </tr>
                                @endforeach

                            @else
                                <td colspan="6" class="align-middle text-center">
                                    <span class="text-md text-warning font-weight-bold">
                                         {{trans('employer::employer.AccountSwitchingNotFoundNote')}}
                                    </span>
                                </td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
