@extends('dashboard::layouts.admin.master')
@section('content')

    <div class="row ">
        <div class="col-xl-3 col-sm-6 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::workers.wallet_balance')}}</p>
                                <h5 class="font-weight-bolder text-primary mb-0">
                                    {{$my_worker_account->wallet_balance}} $
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::workers.total_earns')}}</p>
                                <h5 class="font-weight-bolder text-success mb-0">
                                    {{$my_worker_account->total_earns}} $
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::workers.worker_level')}}</p>
                                <h5 class="font-weight-bolder {{"worker_level_".$my_worker_account->level->name}} mb-0">
                                    {{trans('admin::workers.'.$my_worker_account->level->name)}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div
                                class="icon icon-shape {{"worker_level_".$my_worker_account->level->name."_bg"}} shadow text-center border-radius-md">
                                <i class="ni ni-chart-bar-32 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-3 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('admin::workers.worker_status')}}</p>
                                <h5 class="font-weight-bolder  {{"text_worker_".$my_worker_account->status}} mb-0">
                                    {{trans('admin::workers.'.$my_worker_account->status)}}
                                </h5>

                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div
                                class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-ui-04 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row bg-white mt-2">
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-list">
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
                                <td class="text-center text-sm">{{$count++}} </td>
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark font-weight-bold  text-sm">{{trans('worker::worker.'.$transaction['amount_transaction'])}} </span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="badge {{$transaction['type_of_pay']}} text-xs">{{trans('worker::worker.'.$transaction['type_of_pay'])}}  </span>
                                    </td>
                                @if($transaction['type_of_pay'] == "Deposit")
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-success font-weight-bold  text-sm">+ {{$transaction['amount']}} $  </span>
                                    </td>
                                @else
                                    <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-danger font-weight-bold text-sm">- {{$transaction['amount']}} $  </span>
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
                                class="text-warning text-center">{{trans('worker::worker.No financial transaction has been registered yet')}}</div>
                        </td>
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@stop
