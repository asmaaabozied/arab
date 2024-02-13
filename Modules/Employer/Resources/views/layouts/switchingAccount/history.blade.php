

@extends('employer::layouts.employer.app')
@section('title')
    {{trans('employer::employer.PrivilegesHistory')}}
@endsection

@section('content')


    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
                <div class="row">
                    @if (isset($data) and $data != null)
                        <div class="text-right subAddTicket p-2">
                            <a href="{{route('employer.show.switch.account.to.worker.with.transfer.wallet.balance.form')}}"  class="text-white p-4">{{trans('employer::employer.AccountSwitchingWithTransferWalletBalanceBtn')}} </a>
                        </div>
                    @endif
                <div>
                </div>

                <div class="row mt-3">
                    <div class="d-flex flex-row justify-content-between Task-data">
                        <h4 class="Title mt-4 col-md-9 col-sm-9 mb-2">

                            {{trans('employer::employer.switchingAccountHistory')}}

                        </h4>

                    </div>
                    <div class="table-responsive PrivilageRuler p-3">
                        <table class="table align-items-center table-flush" id="PrivilageRuler">
                            <thead class="thead-light">
                            <tr>
                                <th>  # </th>
                                <th>{{trans('employer::employer.fromAccount')}}</th>
                                <th>  {{trans('employer::employer.toAccount')}} </th>
                                <th>  {{trans('employer::employer.isTransferWalletBalance')}} </th>
                                <th>   {{trans('employer::employer.amountTransferred')}}
                                </th>

                                <th>   {{trans('employer::employer.AccountSwitchingAt')}}
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
                                                class="{{"account_".$datum->from}} text-xs fw-bold">{{trans('employer::employer.account_'.$datum->from)}}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="{{"account_".$datum->to}} text-xs">{{trans('employer::employer.account_'.$datum->to)}}</span>
                                        </td>
                                        @if($datum->isTransferWalletBalance == "false")
                                            <td>
                                            <span
                                                class=" text-xs font-weight-bold">{{trans('employer::employer.TransferWalletBalance==false')}}</span>
                                            </td>
                                        @else
                                            <td>
                                            <span
                                                class="text-success text-xs font-weight-bold">{{trans('employer::employer.TransferWalletBalance==true')}}</span>
                                            </td>
                                        @endif
                                        @if($datum->transferred_amount == 0)
                                            <td>
                                                <span
                                                    class="text-xs font-weight-bold">
                                                  {{ convertCurrency($datum->transferred_amount, auth()->user()->current_currency) }}
                                             <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                                </span>
                                            </td>
                                        @else
                                            <td>                                                <span class="text-xs text-success font-weight-bold">

                                                    {{ convertCurrency($datum->transferred_amount, auth()->user()->current_currency) }}
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
