@extends('employer::layouts.employer.app')
@section('title')
    {{trans('employer::ticket.support section')}}
@endsection
@section('content')
    <link href="{{asset('assets/css/panel/image-view-box.css')}}" rel="stylesheet">
    <style>
        .border-t-r-r{
            border-top-right-radius: 0px!important;
        }
        .border-b-l-r{
            border-bottom-left-radius: 0!important;
        }
    </style>



    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card mb-4 bg-white border-0">
                <div class="card-header p-3 pb-0 bg-white border-0">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div>
                            <h6>{{trans('employer::ticket.TicketDetails')}}</h6>
                            <p class="text-lg my-1">
                                {{trans('employer::ticket.Ticket no.')}} <b>{{$data->ticket_number}}</b>
                            </p>
                            <p class="text-lg my-1">
                                {{trans('employer::ticket.TicketCreatedAt')}} <b>{{$data->created_at}}</b>
                            </p>
                            <p class="text-lg my-1">
                                @if(app()->getLocale() == "ar")
                                    {{trans('employer::ticket.TicketSupportSection')}}
                                    <b>{{$data->support_section->ar_name}}</b>
                                @else
                                    {{trans('employer::ticket.TicketSupportSection')}}
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
                            <h6 class="mb-2 ">{{trans('employer::ticket.TicketSubject')}}</h6>
                            <div
                                class="card card-body border card-plain b-radius-20 d-flex align-items-center  flex-row p-2 font-elmessiry">
                                {{$data->subject}}
                            </div>

                        </div>
                        <div class="col-12 my-1">
                            <h6 class="mb-2">{{trans('employer::ticket.TicketDescription')}}</h6>
                            <div
                                class="card card-body border card-plain b-radius-20  d-flex align-items-center flex-row font-elmessiry">
                                {{$data->description}}
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mt-4">
                            <h6 class="mb-3 text-center text-md fw-bold">{{trans('employer::ticket.TicketStatuses')}}</h6>
                            <div class="timeline timeline-one-side">
                                {{--                                    @dd($data->statuses)--}}
                                @foreach($data->statuses as $status)
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                        <i class="ni ni-{{$status->name->icon}} text-{{$status->name->color}}"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">{{trans('employer::ticket.'.$status->name->name)}}</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{$status->created_at}}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>


                        <div class="col-lg-8 col-md-6 col-12 mt-4">
                            <h6 class="mb-3 text-center text-md fw-bold">{{trans('employer::ticket.TicketAttachedFiles')}}</h6>
                            <div id="carouselExampleIndicators" class="carousel slide m-2"
                                 data-bs-ride="carousel">
                                <div
                                    class="carousel-inner bg-gradient-secondary  b-radius-20 ">
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
                    <h6 class="mb-3 text-center text-sm">{{trans('employer::ticket.TicketAnswers')}}</h6>

                    <div
                        class="card card-body border card-plain b-radius-20  d-flex align-items-center  flex-row p-2 font-elmessiry">
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
                                            <div class="card border-t-r-r b-radius-15  bg-gradient-secondary text-white">
                                                <div class="card-body py-2 px-3">
                                                    <p class="mb-1">
                                                        {{$messages[$i]->admin_answer}}
                                                    </p>
                                                    <div class="d-flex align-items-center text-sm opacity-6">
                                                        <small>{{\Carbon\Carbon::parse($messages[$i]->admin_answered_at)->format('D, g:i A')}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($messages[$i]->admin_attached_file !=null)
                                        <div class="row justify-content-start mb-4">
                                            <div class="col-5">
                                                <div class="card border-t-r-r b-radius-15 text-white  bg-gradient-secondary">
                                                    <div class="card-body p-2">
                                                        <div class="col-12 p-0">
                                                            <img
                                                                src="{{Storage::url($messages[$i]->admin_attached_file)}}"
                                                                alt="Rounded image"
                                                                class="img-fluid mb-2 b-radius-20">

                                                        </div>
                                                        <div class="d-flex align-items-center text-sm opacity-6">
                                                            <small>{{\Carbon\Carbon::parse($messages[$i]->admin_answered_at)->format('D, g:i A')}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($messages[$i]->employer_answer !=null)
                                        <div class="row justify-content-end text-right mb-4">
                                            <div class="col-auto">
                                                <div class="card bg-gray-200 border-b-l-r b-radius-15">
                                                    <div class="card-body py-2 px-3">
                                                        <p class="mb-1">
                                                            {{$messages[$i]->employer_answer}}
                                                        </p>
                                                        <div
                                                            class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                            <i class="ni ni-check-bold text-sm me-1"></i>
                                                            <small>{{\Carbon\Carbon::parse($messages[$i]->employer_answered_at)->format('D, g:i A')}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($messages[$i]->employer_attached_file !=null)
                                        <div class="row justify-content-end mb-4">
                                            <div class="col-5">
                                                <div class="card bg-gray-200 border-b-l-r b-radius-15">
                                                    <div class="card-body p-2">
                                                        <div class="col-12 p-0">

                                                            <img
                                                                src="{{Storage::url($messages[$i]->employer_attached_file)}}"
                                                                alt="Rounded image"
                                                                class="img-fluid mb-2 b-radius-20 ">
                                                        </div>
                                                        <div class="d-flex align-items-center text-sm opacity-6">
                                                            <i class="ni ni-check-bold text-sm me-1"></i>
                                                            <small>{{\Carbon\Carbon::parse($messages[$i]->employer_answered_at)->format('D, g:i A')}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            @else
                                <div id="no-message-found"
                                     class="col-12 text-warning text-center font-elmessiry"> {{trans('employer::ticket.No Messages Found')}}</div>
                            @endif
                            <div id="imag-bg" class="row justify-content-end mb-4 preview d-none">
                                <div class="col-5">
                                    <div class="card bg-gray-200 ">
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
                                        <div class="card bg-gray-200">
                                            <div class="card-body py-2 px-3">
                                                <p id="ans-display-box" class="mb-1 ">
                                                    {{--                                        text typed well be inner here--}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>



                    </div>
                </div>
                @if($data->statuses()->with('name')->latest()->first()->name->name == "AdminAnswered")
                    <div class="card-footer d-block">
                        <form
                            method="POST"
                            action="{{route('employer.send.answer',$data->id)}}"
                            enctype="multipart/form-data"
                            class="align-items-center">
                            @csrf
                            <div class="d-flex">
                                <div class="input-group">
                                    <input id="ans-input-box" type="text" class="form-control"
                                           placeholder="{{trans('employer::ticket.Type Answer Here')}}"
                                           aria-label="Employer Answer" name="employer_answer" onfocus="focused(this)"
                                           onfocusout="defocused(this)" required>
                                </div>
                                <input type="file" id="file-ip-1" name="employer_attached_file"
                                       accept="image/jpeg, image/jpg, image/png"
                                       class="btn btn-dark"
                                       onchange="showPreview(event);" hidden>
                                <label id="insert-img" class=" btn bg-gradient-primary mb-0 mx-2"
                                       for="file-ip-1"><i class="ni ni-image text-white"></i>
                                </label>

                                <label class="btn bg-gradient-danger d-none mb-0 mx-2" id="remove"
                                       onclick="removeImage()"><i class="ni ni-fat-remove"></i>
                                </label>

                                <button type="submit" class=" btn bg-gradient-primary mb-0 mx-2">
                                    <i class="ni ni-send text-white"></i>
                                </button>

                            </div>
                        </form>
                    </div>
                @endif


            </div>
            <div class="button-row ">
                <a href="{{route('employer.show.my.tickets')}}"
                   class="btn btn-primary btn-lg w-100 text-white  mb-2">{{trans('employer::task.back')}}</a>
            </div>
        </div>
    </div>
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
@stop
