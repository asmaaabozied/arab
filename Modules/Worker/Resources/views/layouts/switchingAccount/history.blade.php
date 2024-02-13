@extends('worker::layouts.worker.app')
@section('title')
    {{trans('employer::employer.switchingAccountHistory')}}
@endsection
@section('content')


    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            @if (isset($data) and $data != null)
                                <div class="text-right subAddTicket p-2">
                                    <a href="{{route('worker.show.switch.account.to.employer.with.transfer.wallet.balance.form')}}" class="text-white p-4"
                                       class="btn btn-primary text-white w-auto m-4">{{trans('worker::worker.AccountSwitchingWithTransferWalletBalanceBtn')}} </a>
                                </div>
                            @endif
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive PrivilageRuler p-3">
                                    <table class="table align-items-center table-flush" id="PrivilageRuler">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                {{trans('worker::worker.fromAccount')}}
                                            </th>
                                            <th>
                                                {{trans('worker::worker.toAccount')}}
                                            </th>
                                            <th>
                                                {{trans('worker::worker.isTransferWalletBalance')}}

                                            </th>
                                            <th>
                                                {{trans('worker::worker.amountTransferred')}}

                                            </th>
                                            <th>
                                                {{trans('worker::worker.AccountSwitchingAt')}}

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
                                                    <td>
                                            <span
                                                class="text-xs font-weight-bold">{{$count++}}</span>
                                                    </td>
                                                    <td>
                                            <span
                                                class="{{"account_".$datum->from}} text-xs fw-bold">{{trans('worker::worker.account_'.$datum->from)}}</span>
                                                    </td>
                                                    <td>
                                            <span
                                                class="{{"account_".$datum->to}} text-xs fw-bold">{{trans('worker::worker.account_'.$datum->to)}}</span>
                                                    </td>
                                                    @if($datum->isTransferWalletBalance == "false")
                                                        <td>
                                            <span
                                                class=" text-xs font-weight-bold">{{trans('worker::worker.TransferWalletBalance==false')}}</span>
                                                        </td>
                                                    @else
                                                        <td>
                                            <span
                                                class="text-success text-xs font-weight-bold">{{trans('worker::worker.TransferWalletBalance==true')}}</span>
                                                        </td>
                                                    @endif
                                                    @if($datum->transferred_amount == 0)
                                                        <td>                                                <span
                                                                class="text-xs font-weight-bold">
                                                   {{ number_format(convertCurrency($datum->transferred_amount, auth()->user()->current_currency),2) }}
                                                 <span class="text-xxs">{{auth()->user()->current_currency}}</span>

                                                </span>
                                                        </td>
                                                    @else
                                                        <td>                                                <span
                                                                class="text-xs text-success font-weight-bold">
                                                         {{ number_format(convertCurrency($datum->transferred_amount, auth()->user()->current_currency),2) }}
                                                 <span class="text-xxs">{{auth()->user()->current_currency}}</span>

                                                </span>
                                                        </td>
                                                    @endif
                                                    <td>
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->created_at}}</span>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        @else
                                            <td colspan="6" class="align-middle text-center">
                                    <span class="text-md text-warning font-weight-bold">
                                           {{trans('worker::worker.AccountSwitchingNotFoundNote')}}
                                    </span>
                                            </td>
                                        @endif
                                        </tbody>
                                    </table>
                                    {{--                        {{ $data->links() }}--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
