@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-flush" id="datatable-list">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    #
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::ticket.TicketDetails')}}
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::ticket.EmployerDetails')}}
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::ticket.sections')}}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::ticket.current Status')}}

                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::ticket.created_at')}}

                                </th>

                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{trans('admin::ticket.Actions')}}

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($data) && $data->count() !=0)
                                <?php $count = 1?>
                                @foreach($data as $datum)

                                    <tr>
                                        <td class="text-center text-center text-sm">{{$count++}} </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$datum->ticket_number}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ Str::words($datum->subject, 3,'...')}}</p>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><a class="text-info" href="{{route('admin.show.employer.profile',$datum->employer->id)}}">{{$datum->employer->employer_number}}</a></h6>
                                                <p class="text-xs text-secondary mb-0"><a href="{{route('admin.show.employer.profile',$datum->employer->id)}}"> {{$datum->employer->name}}</a></p>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if(app()->getLocale() == "ar")
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$datum->support_section->ar_name}}</span>
                                            @else
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$datum->support_section->en_name}}</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="badge badge-sm bg-gradient-{{$datum->statuses()->with('name')->latest()->first()->name->color}}  text-xs font-weight-bold">{{trans('admin::ticket.'.$datum->statuses()->with('name')->latest()->first()->name->name)}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$datum->created_at->diffForHumans()}}</span>
                                        </td>
                                        <td class="align-middle text-center p-1">
                                            <a href="{{route('admin.show.employer.ticket.details',[$datum->id])}}"
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
