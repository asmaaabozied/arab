@extends('dashboard::layouts.worker.master')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-12 mt-lg-1 mt-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="numbers mx-3">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::worker.paypal_account')}}</p>
                                <h5 class="font-weight-bolder text-primary mb-0">
                                    <span class="text-primary">{{auth()->user()->paypal_account??trans('worker::worker.not_paypal_account_set')}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fab fa-paypal text-2rem text-primary opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::worker.pendingProfits')}}</p>
                               <h5 class="font-weight-bolder text-warning mb-0">
                                        {{ number_format(convertCurrency(array_sum($pending_profits), auth()->user()->current_currency),2) }}
                                        <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fa fa-credit-card text-2rem text-warning opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::worker.acceptedProfits')}}</p>
                               <h5 class="font-weight-bolder text-success mb-0">
                                        {{ number_format(convertCurrency(array_sum($accepted_profits), auth()->user()->current_currency),2) }}
                                        <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-start">
                            <i class="fa fa-credit-card text-2rem text-success opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::worker.walletBalance')}}</p>
                                <h5 class="font-weight-bolder text-purple mb-0">
                                        {{ number_format(convertCurrency(auth()->user()->wallet_balance, auth()->user()->current_currency),2) }}
                                        <span class="text-xxs">{{auth()->user()->current_currency}}</span>
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



    <div class="row bg-white mt-4">
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-list">
                    <thead class="thead-light">
                    <tr class="bg-table">
                        <th><span class="mx-2">#</span></th>
                        <th>{{trans('worker::worker.TaskDetails')}}</th>
                        <th>{{trans('worker::worker.profits_accepted_at')}}</th>
                        <th>{{trans('worker::worker.worker_task_price')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($data) and count($data) > 0)
                        <?php $count = 1?>
                        @foreach($data as $datum)
                            <tr>
                                <td class="text-center text-sm">{{$count++}} </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex justify-content-center ">
                                        <div>
                                            @if($datum->task->category->image != Null)
                                                <img src="{{Storage::url($datum->task->category->image)}}"
                                                     class="avatar avatar-sm " alt="category icon">
                                            @else
                                                <img
                                                    src="{{asset('assets/img/category/'.$datum->task->category->title.'.png')}}"
                                                    class="avatar avatar-sm " alt="category icon">
                                            @endif
                                        </div>
                                        <div class="d-flex flex-column justify-content-around">
                                            <h6 class="mb-0 text-sm">{{ Str::words($datum->task->title, 3,'...') }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$datum->task->task_number}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-sm text-center "><span class="badge badge-success">{{$datum->updated_at->diffForHumans()}}</span></td>
                                <td class="align-middle text-center text-sm">
                                    <span
                                        class="text-dark text-sm">
                                          {{ number_format(convertCurrency($datum->task->cost_per_worker, auth()->user()->current_currency),2) }}
                                        <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="4">
                            <div class="text-warning text-center">{{trans('worker::worker.You dont have any profits')}}</div>
                        </td>
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@stop
