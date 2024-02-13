@extends('dashboard::layouts.admin.master')
@section('content')
    <link href="{{asset('assets/css/admin/assets/css/image-view-box.css')}}" rel="stylesheet">
    <style>
        .border-t-r-r{
            border-top-right-radius: 0px!important;
        }
        .border-b-l-r{
            border-bottom-left-radius: 0!important;
        }
        .border-b-r-r{
            border-bottom-right-radius: 0!important;
        }
        .border-t-l-r{
            border-top-left-radius: 0!important;
        }
    </style>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card mb-4">
                <div class="card-header p-3 pb-0">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div>
                            <h6>{{trans('admin::ticket.TicketDetails')}}</h6>
                            <p class="text-sm my-1">
                                {{trans('admin::ticket.Ticket no.')}} <b>{{$data->ticket_number}}</b>
                            </p>
                            <p class="text-sm my-1">
                                {{trans('admin::ticket.TicketCreatedAt')}} <b>{{$data->created_at}}</b>
                            </p>
                            <p class="text-sm my-1">
                                @if(app()->getLocale() == "ar")
                                    {{trans('admin::ticket.TicketSupportSection')}}
                                    <b>{{$data->support_section->ar_name}}</b>
                                @else
                                    {{trans('admin::ticket.TicketSupportSection')}}
                                    <b>{{$data->support_section->en_name}}</b>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pt-0">
                    <hr class="horizontal dark  mt-4 mb-4">
                    <div class="row">
                        <div class="col-12 my-1">
                            <h6 class="mb-2 ">{{trans('admin::ticket.TicketSubject')}}</h6>
                            <div
                                class="card card-body border card-plain border-radius-lg d-flex align-items-center  flex-row p-2 font-elmessiry">
                                {{$data->subject}}
                            </div>

                        </div>
                        <div class="col-12 my-1">
                            <h6 class="mb-2">{{trans('admin::ticket.TicketDescription')}}</h6>
                            <div
                                class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row font-elmessiry">
                                {{$data->description}}
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <h6 class="mb-3 text-center text-sm">{{trans('admin::ticket.TicketStatuses')}}</h6>
                            <div class="timeline timeline-one-side">
                                {{--                                    @dd($data->statuses)--}}
                                @foreach($new_status_data->statuses as $status)
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                        <i class="ni ni-{{$status->name->icon}} text-{{$status->name->color}}"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">{{trans('admin::ticket.'.$status->name->name)}}</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{$status->created_at}}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>


                        <div class="col-lg-8 col-md-6 col-12">
                            <h6 class="mb-3 text-center">{{trans('admin::ticket.TicketAttachedFiles')}}</h6>
                            <div id="carouselExampleIndicators" class="carousel slide m-2"
                                 data-bs-ride="carousel">
                                <div
                                    class="carousel-inner bg-gradient-secondary  border-radius-2xl">
                                    <div class="carousel-item active">
                                        @if($data->attached_files != Null)
                                            <img id="proofScreenshot"
                                                 alt="Task Proof Screenshot"
                                                 src="{{Storage::url($data->attached_files)}}"
                                                 class="d-block w-100 p-2"
                                                 style="border-radius: 30px">
                                        @else
                                            <img id="proofScreenshot" alt="Default Screenshot"
                                                 src="{{asset('assets/img/default/attached.png')}}"
                                                 class="d-block w-100 p-2"
                                                 style="border-radius: 30px">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="horizontal dark mt-4 mb-4">
                <div class="card-body p-3 pt-1">
                    <h6 class="mb-3 text-center text-sm">{{trans('admin::ticket.TicketAnswers')}}</h6>

                    <div
                        class="card card-body border card-plain border-radius-lg d-flex align-items-center  flex-row p-2 font-elmessiry">
                        <div class="card-body overflow-auto overflow-x-hidden">
                            @if(isset($messages) and count($messages)>0)
                                @for($i=0;$i<count($messages);$i++)
                                    <div class="row ">
                                        <div class="col-md-12 text-center">
                                            <span
                                                class="badge text-dark">{{$messages[$i]->created_at->format('D, Y-m-d')}}</span>
                                        </div>
                                    </div>
                                    <div class="row justify-content-start mb-4">
                                        <div class="col-auto">
                                            <div class="card border-b-r-r  bg-gradient-secondary text-white">
                                                <div class="card-body py-2 px-3">
                                                    <p class="mb-1">
                                                        {{$messages[$i]->admin_answer}}
                                                    </p>
                                                    <div class="d-flex align-items-center text-sm opacity-6">
                                                        <i class="ni ni-check-bold text-sm me-1"></i>
                                                        <small>{{\Carbon\Carbon::parse($messages[$i]->admin_answered_at)->format('D, g:i A')}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($messages[$i]->admin_attached_file !=null)
                                        <div class="row justify-content-start mb-4">
                                            <div class="col-5">
                                                <div class="card border-b-r-r text-white  bg-gradient-secondary">
                                                    <div class="card-body p-2">
                                                        <div class="col-12 p-0">
                                                            <img
                                                                src="{{Storage::url($messages[$i]->admin_attached_file)}}"
                                                                alt="Rounded image"
                                                                class="img-fluid mb-2 border-radius-lg">

                                                        </div>
                                                        <div class="d-flex align-items-center text-sm opacity-6">
                                                            <i class="ni ni-check-bold text-sm me-1"></i>
                                                            <small>{{\Carbon\Carbon::parse($messages[$i]->admin_answered_at)->format('D, g:i A')}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($messages[$i]->worker_answer !=null)
                                        <div class="row justify-content-end text-right mb-4">
                                            <div class="col-auto">
                                                <div class="card bg-gray-200 border-t-l-r">
                                                    <div class="card-body py-2 px-3">
                                                        <p class="mb-1">
                                                            {{$messages[$i]->worker_answer}}
                                                        </p>
                                                        <div
                                                            class="d-flex align-items-center justify-content-end text-sm opacity-6">
{{--                                                            <i class="ni ni-check-bold text-sm me-1"></i>--}}
                                                            <small>{{\Carbon\Carbon::parse($messages[$i]->worker_answered_at)->format('D, g:i A')}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($messages[$i]->worker_attached_file !=null)
                                        <div class="row justify-content-end mb-4">
                                            <div class="col-5">
                                                <div class="card bg-gray-200 border-t-l-r ">
                                                    <div class="card-body p-2">
                                                        <div class="col-12 p-0">

                                                            <img
                                                                src="{{Storage::url($messages[$i]->worker_attached_file)}}"
                                                                alt="Rounded image"
                                                                class="img-fluid mb-2 border-radius-lg">
                                                        </div>
                                                        <div class="d-flex align-items-center text-sm opacity-6">
{{--                                                            <i class="ni ni-check-bold text-sm me-1"></i>--}}
                                                            <small>{{\Carbon\Carbon::parse($messages[$i]->worker_answered_at)->format('D, g:i A')}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            @else
                                <div id="no-message-found"
                                     class="col-12 text-warning text-center font-elmessiry"> {{trans('admin::ticket.No Messages Found')}}</div>
                            @endif
                            <div id="imag-bg" class="row justify-content-end mb-4 preview d-none">
                                <div class="col-5">
                                    <div class="card bg-light ">
                                        <div class="card-body p-2">
                                            <div class="col-12 p-0">
                                                <img id="file-ip-1-preview"
                                                     style="width: inherit!important; border-radius: 8px!important;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div id="ans-text-bg" class="row justify-content-end text-right mb-4  d-none">
                                    <div class="col-auto">
                                        <div class="card bg-light">
                                            <div class="card-body py-2 px-3">
                                                <p id="ans-display-box" class="mb-1 ">
                                                    {{-- text typed well be inner here--}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                @if($data->statuses()->with('name')->latest()->first()->name->name != "Done")
                    <div class="card-footer d-block">
                        <form
                            method="POST"
                            action="{{route('admin.send.answer.to.worker.ticket',$data->id)}}"
                            enctype="multipart/form-data"
                            class="align-items-center">
                            @csrf
                            <div class="d-flex">
                                <div class="input-group">
                                    <input id="ans-input-box" type="text" class="form-control"
                                           placeholder="{{trans('admin::ticket.Type Answer Here')}}"
                                           aria-label="Employer Answer" name="admin_answer" onfocus="focused(this)"
                                           onfocusout="defocused(this)" required>
                                </div>
                                <input type="file" id="file-ip-1" name="admin_attached_file"
                                       accept="image/jpeg, image/jpg, image/png"
                                       class="btn btn-dark"
                                       onchange="showPreview(event);" hidden>
                                <label id="insert-img" class=" btn bg-gradient-primary mb-0 mx-2"
                                       for="file-ip-1"><i class="ni ni-image"></i>
                                </label>

                                <label class="btn bg-gradient-danger d-none mb-0 mx-2" id="remove"
                                       onclick="removeImage()"><i class="ni ni-fat-remove"></i>
                                </label>

                                <button type="submit" class=" btn bg-gradient-primary mb-0 mx-2">
                                    <i class="ni ni-send"></i>
                                </button>

                            </div>
                        </form>
                    </div>
                @endif


            </div>
            @if($data->statuses()->with('name')->latest()->first()->name->name != "Done")
            <div class="button-row ">
                <button  onclick="ShowSwal()"
                   class="btn btn-success btn-lg w-100   mb-2">{{trans('admin::ticket.DoneTicket')}}</button>
            </div>
            @endif
            <div class="button-row ">
                <a href="{{route('admin.show.worker.tickets')}}"
                   class="btn btn-secondary btn-lg w-100   mb-2">{{trans('admin::ticket.back')}}</a>
            </div>
        </div>
    </div>


    <div class="swal-overlay swal-overlay--show-modal d-none" id="CustomSwal" tabindex="-1">
        <div class="swal-modal" role="dialog" aria-modal="true">
            <div class="swal-icon swal-icon--info"></div>
            <div class="swal-title">{{trans('admin::ticket.DoneTicketSwalTitle')}}</div>
            <div class="swal-text text-center" >
                {{trans('admin::ticket.DoneTicketSwalDes')}}
            </div>
            <div class="swal-footer">
                <div class="swal-button-container d-flex justify-content-between">
                    <a  onclick="event.preventDefault(); document.getElementById('switch-account-form').submit();" class="btn bg-gradient-success w-auto m-4">{{trans('admin::ticket.DoneTicket')}}</a>
                    <button class="btn bg-gradient-dark w-auto m-4" onclick="hideSwal()">{{trans('admin::ticket.cancelBtn')}}</button>
                </div>
                <form id="switch-account-form" action="{{ route('admin.done.worker.ticket',$data->id) }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="row">
        <div id="screenShotModel" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="screenShotImage">
            <div id="caption"></div>
        </div>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById("screenShotModel");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("proofScreenshot");
        var modalImg = document.getElementById("screenShotImage");
        var captionText = document.getElementById("caption");
        img.onclick = function () {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
    </script>


    <script type="text/javascript">
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
                document.getElementById("remove").classList.remove('d-none');
                document.getElementById("remove").classList.add('d-block');
                document.getElementById("insert-img").classList.add('d-none');
                document.getElementById("imag-bg").classList.remove('d-none');
                document.getElementById("no-message-found").classList.add('d-none');

            }
        }

        function removeImage() {
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = "";
            document.getElementById("remove").classList.remove('d-block');
            document.getElementById("remove").classList.add('d-none');
            document.getElementById("insert-img").classList.remove('d-none');
            document.getElementById("no-message-found").classList.remove('d-none');
            document.getElementById("imag-bg").classList.add('d-none');
        }

        var inputBox = document.getElementById("ans-input-box");
        inputBox.onkeyup = function () {
            document.getElementById("ans-text-bg").classList.remove('d-none');
            document.getElementById("ans-display-box").innerHTML = inputBox.value;
        }


    </script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        function ShowSwal() {
            document.getElementById('CustomSwal').classList.remove('d-none')
        }
        function hideSwal(){
            document.getElementById('CustomSwal').classList.add('d-none');
            $("input[type=checkbox]").prop("checked", false);
        }
    </script>
@stop
