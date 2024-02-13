@extends('dashboard::layouts.employer.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 border-0">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-flush" id="datatable-list">
                            <thead>
                            <tr class="bg-table">
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('employer::employer.MyDiscountCode')}}
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('employer::employer.TypeOfDiscountCode')}}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('employer::employer.discount_amount')}}

                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('employer::employer.usedWithTask')}}

                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('employer::employer.UsedAt')}}

                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('employer::employer.Actions')}}

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($data) && $data->count() !=0)
                                @foreach($data as $datum)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-primary text-xs font-weight-bold">{{$datum->discountCode->code}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{trans('employer::employer.'.$datum->discountCode->type)}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->discountCode->discount_amount}}%</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-xs font-weight-bold"><a class="text-primary " href="{{route('employer.show.discountCode.invoice',[$datum->task->id,$datum->discount_code_id])}}">{{$datum->task->title}}</a></span>
                                        </td>

                                        <td class="align-middle text-center">
                                             <span class="text-secondary text-xs font-weight-bold">{{$datum->created_at->diffForHumans()}}</span>
                                        </td>
                                        <td class="align-middle text-center p-1">
                                            <a href="{{route('employer.show.discountCode.invoice',[$datum->task->id,$datum->discount_code_id])}}"
                                               class="mx-1  text-sm"
                                               data-bs-toggle="tooltip"
                                               data-bs-original-title="DiscountCodeInvoice">
                                                <i class="fas fa-eye text-success"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
