@extends('employer::layouts.employer.app')
@section('title')
    {{trans('employer::ticket.support section')}}
@endsection
@section('content')


    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12 addTicket">
                        <button class="btn  subAddTicket"> <a class="text-white" href="{{route('employer.show.create.ticket.form')}}">{{trans('employer::ticket.createNewTicket')}}</a></button>
                    </div>
                    <!-- Modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"> {{trans('employer::ticket.createNewTicket')}}  </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="row">
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label>الاسم</label>
                                            <div class="d-flex flex-row">

                                                <input type="text" class="form-control">
                                            </div>

                                        </div>

                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label>القسم </label>
                                            <div class="d-flex flex-row">

                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>اختار القسم  </option>
                                                    <option value="1">القسم الفني </option>

                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label>الوضعية الحالية </label>
                                            <div class="d-flex flex-row">

                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>اختار الحالة  </option>
                                                    <option value="1">قيد التنفيد </option>
                                                    <option value="2">مكتمل </option>
                                                    <option value="3">مرفوض </option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label>تاريخ الانشاء </label>
                                            <div class="d-flex flex-row">

                                                <input type="date" class="form-control">
                                            </div>

                                        </div>


                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                                    <button type="button" class="btn start " style="width:auto ;margin-top:0">حفظ  </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Model -->

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
                                    <th>
                                        #
                                    </th>
                                    <th >
                                        {{trans('employer::ticket.TicketDetails')}}
                                    </th>
                                    <th>
                                        {{trans('employer::ticket.sections')}}
                                    </th>
                                    <th>
                                        {{trans('employer::ticket.current Status')}}

                                    </th>
                                    <th>
                                        {{trans('employer::ticket.created_at')}}

                                    </th>

                                    <th>
                                        {{trans('employer::ticket.Actions')}}

                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($data) && $data->count() !=0)
                                    <?php $count = 1?>
                                    @foreach($data as $datum)

                                        <tr>
                                            <td>{{$count++}} </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$datum->ticket_number}}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ Str::words($datum->subject, 3,'...')}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                @if(app()->getLocale() == "ar")
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{$datum->support_section->ar_name}}</span>
                                                @else
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{$datum->support_section->en_name}}</span>
                                                @endif
                                            </td>
                                            <td>
                                            <span
                                                {{--      {{trans('employer::ticket.'.$datum->statuses()->with('name')->latest()->first()->name->name)}}                                          class="badge badge-sm bg-gradient-secondary  text-xs font-weight-bold">{{trans('employer::ticket.'.$datum->statuses[0]->name->name)}}</span>--}}
                                                class="badge badge-sm bg-gradient-{{$datum->statuses()->with('name')->latest()->first()->name->color}}  text-xs font-weight-bold"> {{$datum->statuses()->with('name')->latest()->first()->name->name ?? ''}}</span>
                                            </td>
                                            <td >
                                                <span class="text-secondary text-xs font-weight-bold">{{$datum->created_at->diffForHumans()}}</span>
                                            </td>
                                            <td>
                                                <a href="{{route('employer.show.ticket.details',[$datum->id])}}"
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















@stop
