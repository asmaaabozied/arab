@extends('worker::layouts.worker.app')
@section('title')
    {{trans('employer::ticket.support section')}}
@endsection
@section('content')


    <div class="col-lg-9 col-sm-12 ">



    <div class="row dashboard">
        <div class="card">
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 addTicket">

                    <button class="btn  subAddTicket">  <a href="{{route('worker.show.create.ticket.form')}}"  class="text-white w-auto m-4">{{trans('worker::ticket.createNewTicket')}}</a>
                    </button></div>

                <div class="col-lg-12 col-sm-12 contactus">
                    <div class=" ">
                        <div class=" col-md-12 col-sm-12 col-lg-12">
                            <div class="">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <h4 class="Title mb-3 mt-3"> كيف يمككني مساعدتك اليوم ؟   </h4>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <form class="col-md-12 col-sm-12 col-lg-12 searchform  ">
                                                <input type="search" placeholder=" &#xe8b6; ابحث عن الموضوع او السؤال " class="form-control">
                                            </form>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="articalTitle">مقالات شائعة </h5>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                <ul class="artical-public">
                                                    <li> 1. اضافة خدمة متميزة </li>
                                                    <li> 1. نموذج  خدمة التصميم  </li>
                                                </ul>

                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                <ul class="artical-public">
                                                    <li> 1. إنشاء حساب </li>
                                                    <li> 1. إدارة الطلب كبائع
                                                    </li>
                                                </ul>

                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                <ul class="artical-public">
                                                    <li> 1. سحب الأرباح </li>
                                                    <li> 1.   إضافة نماذج أعمال
                                                    </li>
                                                </ul>

                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                <ul class="artical-public">
                                                    <li> 1.   نموذخ خدمة تصميم </li>
                                                    <li> 1.   نموذخ خدمة تصميم   </li>
                                                </ul>

                                            </div>
                                        </div>


                                    </div>

                                </div>

                            </div>





                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="table-responsive PrivilageRuler p-3">
                        <table class="table align-items-center table-flush" id="PrivilageRuler">
                            <thead class="thead-light">
                            <tr>

                                <th >
                                   #
                                </th>
                                <th>
                                    {{trans('worker::ticket.TicketDetails')}}
                                </th>
                                <th>
                                    {{trans('worker::ticket.sections')}}
                                </th>
                                <th>
                                    {{trans('worker::ticket.current Status')}}

                                </th>
                                <th>
                                    {{trans('worker::ticket.created_at')}}

                                </th>

                                <th>
                                    {{trans('worker::ticket.Actions')}}

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
                                                class="badge badge-sm bg-gradient-{{$datum->statuses()->with('name')->latest()->first()->name->color}}  text-xs font-weight-bold">{{trans('worker::ticket.'.$datum->statuses()->with('name')->latest()->first()->name->name)}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                             <span class="text-secondary text-xs font-weight-bold">{{$datum->created_at->diffForHumans()}}</span>
                                        </td>
                                        <td class="align-middle text-center p-1">
                                            <a href="{{route('worker.show.ticket.details',[$datum->id])}}"
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
    </div>
    </div>


@stop
